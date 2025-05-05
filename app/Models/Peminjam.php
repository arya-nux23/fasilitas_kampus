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

    public function alat()
    {
        return $this->belongsTo(Alat::class, 'alat_id', 'id_alat');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }
}
