<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Jurusan';
        $jurusan = Jurusan::withCount('mahasiswa')->get();
        return view('jurusan.jurusan', compact('jurusan', 'title'));
    }


    public function tambah_action(Request $request)
    {
        $request->validate([
            'jurusan' => 'required|string|max:100'
        ]);
        Jurusan::create([
            'nama_jurusan' =>$request->jurusan
        ]);
        return redirect()->route('jurusan')->with('success', ' Data Jurusan Berhasil Di Tambah');
    }


    public function edit_action(Request $request, $id)
    {
        $request->validate([
            'jurusan' => 'required|string|max:100'
        ]);
        $data = [
            'nama_jurusan'=>$request->jurusan
        ];
        Jurusan::where('id_jurusan',$id)->update($data);
        return redirect('/jurusan')->with('success', ' Data Jurusan Berhasil Di Edit');
    }


    public function hapus($id)
    {
        Jurusan::where('id_jurusan', $id)->delete();
        return redirect('/jurusan')->with('success', ' Data Jurusan Berhasil Di Hapus');
    }
}
