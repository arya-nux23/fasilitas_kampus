<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Mahasiswa';
        $jurusan = Jurusan::all();
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.mhs', compact('mahasiswa', 'jurusan', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'jurusan_id' => 'required|exists:jurusan,id_jurusan', // Validasi jurusan_id
        ]);

        $data = [
            'nama_mhs' => $request->nama,
            'nim_mhs' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jurusan_id' => $request->jurusan_id,
        ];

        Mahasiswa::create($data);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Di Tambah');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|email|unique:users,email, ' . $id,
            'password' => 'nullable|min:3',
            'jurusan_id' => 'required|exists:jurusan,id_jurusan', // Validasi jurusan_id
        ]);

        $data = [
            'nama_mhs' => $request->nama,
            'nim_mhs' => $request->nim,
            'email' => $request->email,
            'jurusan_id' => $request->jurusan_id,
        ];
        // Kalau password diisi, baru update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        Mahasiswa::where('id_mahasiswa', $id)->update($data);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Mahasiswa::where('id_mahasiswa', $id)->delete();
        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa Berhasil Di Hapus');
    }
}
