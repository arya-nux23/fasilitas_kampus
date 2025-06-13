<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = 'peminjam';
    protected $primaryKey = 'id_peminjam';
    protected $guarded = [];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id', 'id_fasilitas');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }
}
