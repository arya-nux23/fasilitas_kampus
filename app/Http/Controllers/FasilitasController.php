<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data fasilitas beserta peminjaman terakhirnya
        $fasilitas = Fasilitas::with('peminjamanTerakhir')->get();
        return view('fasilitas.fasilitas', compact('fasilitas'));
    }


    public function create()
    {
        return view('fasilitas.tambah');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'desk' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:4048',
        ]);

        $fotoFasilitas = $request->file('foto')->store('upload/foto', 'public');

        Fasilitas::create([
            'nama_fasilitas' => $request->nama,
            'lokasi' => $request->tempat,
            'deskripsi' => $request->desk,
            'foto' => $fotoFasilitas,
        ]);
        return redirect('/fasilitas')->with('success', 'Data fasilitas Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $data['fasilitas'] = Fasilitas::where('id_fasilitas', $id)->first();
        return view('fasilitas.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tempat' => 'required',
            'desk' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);

        // Ganti foto jika ada file baru diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fasilitas->foto && Storage::disk('public')->exists($fasilitas->foto)) {
                Storage::disk('public')->delete($fasilitas->foto);
            }

            // Simpan foto baru
            $fotoFasilitas = $request->file('foto')->store('upload/foto', 'public');
            $fasilitas->foto = $fotoFasilitas;
        }

        // Update field lain
        $fasilitas->nama_fasilitas = $request->nama;
        $fasilitas->lokasi = $request->tempat;
        $fasilitas->deskripsi = $request->desk;
        $fasilitas->save();
        return redirect('/fasilitas')->with('success', 'Data fasilitas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $storagePath = public_path('storage/');
        // Hapus foto di file storage/public
        if ($fasilitas->foto && file_exists($storagePath . $fasilitas->foto)) {
            unlink($storagePath . $fasilitas->foto);
        }

        $fasilitas->delete();
        return redirect('/fasilitas')->with('success', 'Data fasilitas berhasil dihapus');
    }
}
