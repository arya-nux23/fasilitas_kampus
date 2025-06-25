<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
use App\Models\Peminjam;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MhspinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Mahasiswa|Peminjam';
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $peminjam = Peminjam::where('mahasiswa_id', $mahasiswa->id_mahasiswa)->get();
        $fasilitas = Fasilitas::all();
        return view('peminjam_mhs.view', compact('fasilitas', 'peminjam', 'title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas_kampus,id_fasilitas',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_tenggat' => 'required|date|after_or_equal:tanggal_peminjaman',
            'note' => 'nullable|string',
        ]);

        // ✅ Cek apakah pengguna login dan punya id_mahasiswa
        $user = Auth::guard('mahasiswa')->user();

        if (!$user || !$user->id_mahasiswa) {
            return redirect()->back()->with('error', 'Akun ini belum terhubung ke data mahasiswa.');
        }

        $peminjam = new Peminjam();
        $peminjam->fasilitas_id = $request->fasilitas_id;
        $peminjam->tanggal_peminjaman = $request->tanggal_peminjaman;
        $peminjam->tanggal_tenggat = $request->tanggal_tenggat;
        $peminjam->note = $request->note;
        $peminjam->status_pengajuan = 'diajukan';
        $peminjam->status_peminjaman = 'menunggu';
        $peminjam->mahasiswa_id = $user->id_mahasiswa;

        $peminjam->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil ditambahkan');
    }



    // Opsional: method update kondisi peminjaman (misalnya dikembalikan atau barang rusak/hilang)
    public function updateStatus(Request $request, $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $request->validate([
            'status_peminjaman' => 'required',
            'kondisi_fasilitas' => 'nullable|string',
            'returned_at' => 'nullable|date',
        ]);

        $peminjam->status_peminjaman = $request->status_peminjaman;
        $peminjam->kondisi_fasilitas = $request->kondisi_fasilitas;
        $peminjam->returned_at = $request->returned_at ? Carbon::parse($request->returned_at) : now();

        // Cek apakah perlu diberi catatan sanksi
        if ($peminjam->kondisi_fasilitas === 'rusak' || $peminjam->kondisi_fasilitas === 'hilang') {
            $peminjam->catatan_sanksi = 'Barang rusak atau hilang';
        }

        if ($peminjam->returned_at > $peminjam->tanggal_tenggat) {
            $peminjam->catatan_sanksi = 'Pengembalian terlambat';
        }

        $peminjam->save();

        return redirect()->back()->with('success', 'Status peminjaman diperbarui.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'fasilitas' => 'required|exists:fasilitas_kampus,id_fasilitas',
        ]);

        $data = [
            'date' => $request->date,
            'fasilitas_id' => $request->fasilitas,
        ];
        Peminjam::where('id_peminjam', $id)->update($data);

        return redirect('/peminjam/mahasiswa')->with('success', 'Data Berhasil Di Ubah');
    }

    public function pengajuan(Request $request, $id)
    {
        // Simpan catatan pengajuan di kolom `note`
        DB::table('peminjam')
            ->where('id_peminjam', $id)
            ->update([
                'note' => $request->note,
                'status_pengajuan' => 'pending',
            ]);

        return redirect('/peminjam/mahasiswa')->with('success', 'Pengajuan berhasil dikirim.');
    }
}
