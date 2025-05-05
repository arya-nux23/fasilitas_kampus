<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjam;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjam = Peminjam::all();
        $alat = Alat::all();
        return view('peminjam.view', compact('peminjam', 'alat'));
    }

    public function konfirmasi($id)
    {
        DB::table('peminjam')
            ->where('id_peminjam', $id)
            ->update([
                'returned_at' => now(), // <== ini WAJIB ditambahkan
                'status_pengajuan' => 'selesai',
            ]);

        return back()->with('success', 'Peminjaman berhasil dikonfirmasi sebagai sudah kembali.');
    }

    public function destroy($id)
    {
        Peminjam::where('id_peminjam', $id)->delete();
        return redirect('/pinjam')->with('success', 'Data Peminjam Berhasil Dihapus');
    }
}
