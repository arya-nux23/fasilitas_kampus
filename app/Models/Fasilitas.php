<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_kampus';
    protected $primaryKey = 'id_fasilitas';
    protected $guarded = [];


    public function peminjam()
    {
        return $this->hasMany(Peminjam::class, 'fasilitas_id', 'id_fasilitas');
    }

    public function peminjamanTerakhir()
    {
        return $this->hasOne(Peminjam::class, 'fasilitas_id', 'id_fasilitas')->latest('created_at');
    }
}
