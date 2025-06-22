<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Admin';
        $admin = Admin::all();
        return view('operator.admin', compact('admin', 'title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);

        $data = [
            'nama_admin' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

         // Menyimpan data ke dalam database
         Admin::create($data);

         // Redirect dengan pesan sukses
         return redirect('/operator')->with('success', 'Data Operator Berhasil Ditambah');
    }

    public function edit_action(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:3', // validasi panjang password
        ]);

        $data = [
            'nama_admin' => $request->name,
            'email' => $request->email,
        ];
        // Kalau password diisi, baru update password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        Admin::where('id_admin', $id)->update($data);

        return redirect('/operator')->with('success', 'Data Operator Berhasil Di Edit');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Admin::where('id_admin', $id)->delete();
        return redirect('/operator')->with('success', 'Data Operator Berhasil Di Hapus');
    }
}
