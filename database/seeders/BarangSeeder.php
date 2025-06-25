<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Proyektor',
                'lokasi' => 'Ruang Rapat',
                'deskripsi' => 'Proyektor untuk presentasi atau seminar.',
                'foto' => null,
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'AC',
                'lokasi' => 'Ruang Dosen',
                'deskripsi' => 'Air Conditioner untuk pendingin ruangan.',
                'foto' => null,
                'stok' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'Kursi',
                'lokasi' => 'Gudang A',
                'deskripsi' => 'Kursi plastik/lipat untuk acara.',
                'foto' => null,
                'stok' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'Sofa',
                'lokasi' => 'Ruang Tamu',
                'deskripsi' => 'Sofa untuk ruang tamu VIP.',
                'foto' => null,
                'stok' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'Mic',
                'lokasi' => 'Ruang Multimedia',
                'deskripsi' => 'Microphone untuk keperluan suara.',
                'foto' => null,
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'Sound System',
                'lokasi' => 'Ruang Multimedia',
                'deskripsi' => 'Sound system lengkap untuk acara besar.',
                'foto' => null,
                'stok' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'Palu',
                'lokasi' => 'Workshop',
                'deskripsi' => 'Alat palu untuk perbaikan dan bangunan.',
                'foto' => null,
                'stok' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
