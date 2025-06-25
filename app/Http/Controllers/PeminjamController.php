<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Fasilitas;
use Carbon\Carbon;

class PeminjamController extends Controller
{
    public function index()
    {
        $title = 'peminjam';
        $peminjam = Peminjam::latest()->get();
        $barang = Barang::all();
        $fasilitas = Fasilitas::all();

        return view('peminjam.view', compact('peminjam', 'barang', 'fasilitas', 'title'));
    }

    public function create()
    {
        $barang = Barang::all();
        $fasilitas = Fasilitas::all();
        return view('peminjam.create', compact('barang', 'fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'tipe' => 'required|in:fasilitas,barang',
            'tanggal' => 'required|date',
            'tenggat_hari' => 'required|integer|min:1|max:30',
            'jumlah' => 'required|integer|min:1',
        ]);

        $tanggalPeminjaman = Carbon::parse($request->tanggal);
        $tanggalTenggat = $tanggalPeminjaman->copy()->addDays($request->tenggat_hari);

        $peminjam = new Peminjam();
        $peminjam->tanggal_peminjaman = $tanggalPeminjaman;
        $peminjam->tanggal_tenggat = $tanggalTenggat;
        $peminjam->jumlah = $request->jumlah;
        $peminjam->status_pengajuan = 'menunggu';
        $peminjam->status_peminjaman = 'belum';

        if ($request->tipe === 'fasilitas') {
            $request->validate([
                'fasilitas' => 'required|exists:fasilitas_kampus,id_fasilitas',
            ]);
            $peminjam->fasilitas_id = $request->fasilitas;
        } elseif ($request->tipe === 'barang') {
            $request->validate([
                'barang' => 'required|exists:barang,id_barang',
            ]);
            $peminjam->barang_id = $request->barang;

            // Kurangi stok barang (opsional)
            $barang = Barang::findOrFail($request->barang);
            if ($barang->stok < $request->jumlah) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
            }
            $barang->stok -= $request->jumlah;
            $barang->save();
        }

        $peminjam->save();

        return redirect()->back()->with('success', 'Peminjaman berhasil ditambahkan.');
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

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas_kampus,id_fasilitas',
            'tanggal' => 'required|date',
            'tenggat_hari' => 'required|integer|min:1|max:30',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Hitung tanggal tenggat
        $tanggalPeminjaman = Carbon::parse($request->tanggal);
        $tanggalTenggat = $tanggalPeminjaman->copy()->addDays($request->tenggat_hari);

        // Cari data peminjaman
        $peminjam = Peminjam::findOrFail($id);

        // Update data
        $peminjam->fasilitas_id = $request->fasilitas_id;
        $peminjam->tanggal_peminjaman = $tanggalPeminjaman;
        $peminjam->tanggal_tenggat = $tanggalTenggat;
        $peminjam->jumlah = $request->jumlah;

        $peminjam->save();

        return redirect()->back()->with('success', 'Peminjaman fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Peminjam::where('id_peminjam', $id)->delete();
        return redirect('/pinjam')->with('success', 'Data Peminjam Berhasil Dihapus');
    }
}
