<?php

namespace App\Http\Controllers;
use App\Models\Fasilitas;
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
        $title = 'Peminjam';
        $peminjam = Peminjam::all();
        $fasilitas = Fasilitas::all();
        return view('peminjam.view', compact('peminjam', 'fasilitas', 'title'));
    }

    public function konfirmasi($id)
    {
        DB::table('peminjam')
            ->where('id_peminjam', $id)
            ->update([
                'returned_at' => now(), // <== ini WAJIB ditambahkan
                'status_pengajuan' => 'selesai',
            ]);

        return back()->with('success', 'Peminjaman berhasil dikonfirmasi sebagai sudah ajukan.');
    }

    public function destroy($id)
    {
        Peminjam::where('id_peminjam', $id)->delete();
        return redirect('/pinjam')->with('success', 'Data Peminjam Berhasil Dihapus');
    }
}
