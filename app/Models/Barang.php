<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $guarded = [];

    public function peminjam()
    {
        return $this->hasMany(Peminjam::class, 'peminjam_id', 'id_peminjam');
    }
    public function peminjamanTerakhir()
    {
        return $this->hasOne(Peminjam::class, 'fasilitas_id', 'id_fasilitas')->latest('created_at');
    }
}
