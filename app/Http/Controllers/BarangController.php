<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Fasilitas';
        $barang = Barang::with('peminjamanTerakhir')->get();

        return view('barang.barang', compact('barang', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah | Barang';
        return view('barang.tambah', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'desk'   => 'required|string',
            'stok'   => 'nullable|integer|min:0',
            'foto'   => 'required|image|mimes:jpeg,png,jpg|max:4048',
        ]);

        $fotoPath = $request->file('foto')->store('upload/foto', 'public');

        Barang::create([
            'nama_barang'      => $request->nama,
            'lokasi'           => $request->tempat,
            'deskripsi'        => $request->desk,
            'foto'             => $fotoPath,
            'stok'             => $request->stok ?? 0,
            'status_pengajuan' => 'diajukan',
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data['title'] = 'Edit|Barang';
        $data['barang'] = Barang::where('id_barang', $id)->first();
        return view('barang.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'desk' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            'stok' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id);

        // Ganti foto jika ada file baru diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto && Storage::disk('public')->exists($barang->foto)) {
                Storage::disk('public')->delete($barang->foto);
            }

            // Simpan foto baru
            $fotoBarang = $request->file('foto')->store('upload/foto', 'public');
            $barang->foto = $fotoBarang;
        }

        // Update field lain
        $barang->nama_barang = $request->nama;
        $barang->lokasi = $request->tempat;
        $barang->deskripsi = $request->desk;
        $barang->stok = $request->stok;
        $barang->save();

        return redirect('/barang')->with('success', 'Data barang berhasil diperbarui');
    }


    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $storagePath = public_path('storage/');

        // Hapus foto di file storage/public jika ada
        if ($barang->foto && file_exists($storagePath . $barang->foto)) {
            unlink($storagePath . $barang->foto);
        }

        $barang->delete();
        return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
    }
}
