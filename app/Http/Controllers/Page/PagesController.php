<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';
        $fasilitas = Fasilitas::all();
        $peminjaman = Peminjam::all();
        $peminjam = Peminjam::where('status_pengajuan', 'selesai')->get();
        return view('home.index', compact('peminjam', 'fasilitas', 'peminjaman', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fasilitas()
    {
        $title = 'Fasilitas';
        $fasilitas = Fasilitas::all();
        return view('home.fasility', compact('fasilitas', 'title'));
    }
}
