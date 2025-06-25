<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangPinjam extends Model
{
    use HasFactory;
        protected $table = 'barang_pinjam'; // Ganti jika nama tabel berbeda
    protected $primaryKey = 'id_barang_pinjam';

    protected $fillable = [
        'barang_id',
        'mahasiswa_id',
        'tanggal_peminjaman',
        'tanggal_tenggat',
        'returned_at',
        'status_pengajuan',
        'status_peminjaman',
        'kondisi_barang',
        'jumlah',
        'stok',        // ✅ stok ditambahkan di sini
        'note',
    ];

    // Relasi ke mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    // Relasi ke barang
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
    }
}
