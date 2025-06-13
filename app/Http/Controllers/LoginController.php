<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.log-akses');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Coba login Admin
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        // Kalau Admin gagal, coba login Mahasiswa
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard/mahasiswa');
        }

        // Kalau dua-duanya gagal
        return redirect('/login')->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
