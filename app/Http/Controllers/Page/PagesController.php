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
        $fasilitas = Fasilitas::all();
        $peminjaman = Peminjam::all();
        $peminjam = Peminjam::where('status_pengajuan', 'selesai')->get();
        return view('home.index', compact('peminjam', 'fasilitas', 'peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fasilitas()
    {
        $fasilitas = Fasilitas::all();
        return view('home.sewa', compact('fasilitas'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
