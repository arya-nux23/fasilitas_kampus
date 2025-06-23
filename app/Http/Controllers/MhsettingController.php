<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class MhsettingController extends Controller
{
    public function index(){
        $title = 'Setting|Akun';
         $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.pengaturan-profil.pengaturan', compact('mahasiswa', 'title'));
    }
}
