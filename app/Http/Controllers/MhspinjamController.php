<?php

namespace App\Http\Controllers;
use App\Models\Alat;
use App\Models\Mahasiswa;
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
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $peminjam = Peminjam::where('mahasiswa_id', $mahasiswa->id_mahasiswa)->get();
        $alat = Alat::all();
        return view('peminjam_mhs.view', compact('alat', 'peminjam'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'date' => 'required|date',
            'alat' => 'required|exists:alat,id_alat',
        ]);

        $mahasiswa = Auth::guard('mahasiswa')->user();

        // Simpan data peminjaman
        Peminjam::create([
            'date' => $request->date,
            'alat_id' => $request->alat,
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

        return redirect('/peminjam/mahasiswa')->with('success', 'Pengajuan pengembalian berhasil dikirim.');
    }

    
}
