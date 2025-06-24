<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
use App\Models\Peminjam;
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
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'fasilitas' => 'required|exists:fasilitas_kampus,id_fasilitas',
        ]);

        // Cek apakah fasilitas sudah dipinjam di tanggal yang sama
        $isUsed = Peminjam::where('date', $request->date)
            ->where('fasilitas_id', $request->fasilitas)
            ->whereNull('returned_at') // Jika belum dikembalikan
            ->exists();

        if ($isUsed) {
            return redirect()->back()->with('error', 'Fasilitas ini sedang dipakai pada tanggal tersebut.');
        }

        $mahasiswa = Auth::guard('mahasiswa')->user();

        // Simpan data peminjaman
        Peminjam::create([
            'date' => $request->date,
            'fasilitas_id' => $request->fasilitas,
            'mahasiswa_id' => $mahasiswa->id_mahasiswa,
        ]);

        return redirect('/peminjam/mahasiswa')->with('success', 'Peminjaman berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'alat' => 'required|exists:alat,id_alat',
        ]);

        $data = [
            'date' => $request->date,
            'alat_id' => $request->alat,
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
