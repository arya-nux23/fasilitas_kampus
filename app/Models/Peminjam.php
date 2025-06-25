<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = 'peminjam';
    protected $primaryKey = 'id_peminjam';

    protected $fillable = [
        'tanggal_peminjaman',
        'tanggal_tenggat',
        'returned_at',
        'status_pengajuan',
        'status_peminjaman',
        'kondisi_fasilitas',
        'note',
        'catatan_sanksi',
        'fasilitas_id',
        'mahasiswa_id',
    ];

    // Relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }


    // Relasi ke fasilitas
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id', 'id_fasilitas');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
    }
}
