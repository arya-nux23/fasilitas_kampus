<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Fasilitas;
use App\Models\Mahasiswa;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'fasilitas' => Fasilitas::all(),
            'mahasiswa' => Mahasiswa::all(),
            'admin' => Admin::all(),
            'pengajuan' => Peminjam::where('status_pengajuan', 'pending')->get(), // yang sedang mengajukan
            'menunggu_konfirmasi' => Peminjam::where('status_pengajuan', 'pending')->get(), // bisa pakai sama
            'sudah_dikonfirmasi' => Peminjam::where('status_pengajuan', 'selesai')->get()
        ];
        return view('dashboard.dashboard', $data);
    }


    public function dashboard_mhs(){
        $data = [
            'pengajuan' => Peminjam::where('status_pengajuan', 'pending')->get(), // yang sedang mengajukan
            'menunggu_konfirmasi' => Peminjam::where('status_pengajuan', 'pending')->get(), // bisa pakai sama
            'sudah_dikonfirmasi' => Peminjam::where('status_pengajuan', 'selesai')->get()
        ];
        return view('dashboard.dash_mhs', $data);
    }
}
