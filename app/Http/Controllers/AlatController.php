<?php

namespace App\Http\Controllers;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alat = alat::withCount('peminjam')->get();
        return view('alat.alat', compact('alat'));
    }

    public function tambah_action(Request $request)
    {
        $request->validate([
            'alat' => 'required|string|max:100'
        ]);
        Alat::create([
            'nama_alat' =>$request->alat
        ]);
        return redirect()->route('alat')->with('success', ' Data Alat Berhasil Di Tambah');
    }
    public function edit_action(Request $request, $id)
    {
        $request->validate([
            'alat' => 'required|string|max:100'
        ]);
        $data = [
            'nama_alat'=>$request->alat
        ];
        Alat::where('id_alat',$id)->update($data);
        return redirect('/alat')->with('success', 'Data Alat berhasil di edit');
    }


    public function hapus($id)
    {
        Alat::where('id_alat', $id)->delete();
        return redirect('/alat')->with('success', 'Data Alat Berhasil Di Hapus');
    }
}
