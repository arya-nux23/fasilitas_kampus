<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangpinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Mahasiswa|Peminjam';
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $peminjam = Peminjam::with('barang') // pastikan relasi barang dimuat
            ->where('mahasiswa_id', $mahasiswa->id_mahasiswa)
            ->get();
        $barang = Barang::all();
        return view('peminjam_barang.view', compact('barang', 'peminjam', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'barang' => 'required|exists:barang,id_barang',
            'jumlah' => 'required|integer|min:1',
            'tanggal_tenggat' => 'nullable|date',
            'catatan_sanksi' => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($request->barang);

        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi. Sisa stok: ' . $barang->stok);
        }

        $mahasiswa = Auth::guard('mahasiswa')->user();

        $fasilitasId = DB::table('fasilitas_kampus')->value('id_fasilitas'); // ambil satu yang tersedia

        Peminjam::create([
            'tanggal_peminjaman' => $request->date,
            'tanggal_tenggat' => $request->tanggal_tenggat,
            'catatan_sanksi' => $request->catatan_sanksi,
            'barang_id' => $request->barang,
            'mahasiswa_id' => $mahasiswa->id_mahasiswa,
            'fasilitas_id' => $fasilitasId,
        ]);


        // Kurangi stok barang
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect('/peminjam/barang')->with('success', 'Peminjaman berhasil ditambahkan');
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'barang' => 'required|exists:barang,id_barang',
        ]);

        $peminjam = Peminjam::findOrFail($id);

        // Jika barang diganti, atur ulang stok
        if ($peminjam->barang_id != $request->barang) {
            // Kembalikan stok lama
            $barangLama = Barang::findOrFail($peminjam->barang_id);
            $barangLama->stok += 1;
            $barangLama->save();

            // Kurangi stok baru
            $barangBaru = Barang::findOrFail($request->barang);
            if ($barangBaru->stok < 1) {
                return redirect()->back()->with('error', 'Stok barang baru habis.');
            }
            $barangBaru->stok -= 1;
            $barangBaru->save();
        }

        $peminjam->update([
            'date' => $request->date,
            'barang_id' => $request->barang,
        ]);

        return redirect('/peminjam/barang')->with('success', 'Data Berhasil Diubah');
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

        return redirect('/peminjam/barang')->with('success', 'Pengajuan berhasil dikirim.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
