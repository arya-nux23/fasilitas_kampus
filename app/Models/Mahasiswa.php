<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <-- tambah ini
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable // <-- ubah Model jadi Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa'; // sudah benar, nama tabel
    protected $primaryKey = 'id_mahasiswa'; // sudah benar, primary key
    protected $guarded = []; // atau bisa kamu ganti ke fillable kalau mau lebih aman

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id_jurusan');
    }

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class, 'mahasiswa_id', 'id_mahasiswa');
    }
}
