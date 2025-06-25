<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id('id_peminjam');

            // Waktu pengajuan peminjaman
            $table->dateTime('tanggal_peminjaman'); // contoh: 2025-06-25 14:30:00

            // Tenggat waktu pengembalian (diisi saat disetujui admin)
            $table->dateTime('tanggal_tenggat')->nullable();

            // Waktu pengembalian sebenarnya
            $table->timestamp('returned_at')->nullable();

            // Status proses pengajuan
            $table->enum('status_pengajuan', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');

            // Status peminjaman berjalan
            $table->enum('status_peminjaman', ['menunggu', 'sedang_dipinjam', 'selesai', 'terlambat'])->default('menunggu');

            // Kondisi fasilitas saat dikembalikan
            $table->enum('kondisi_fasilitas', ['baik', 'rusak', 'hilang'])->nullable();

            // Catatan tambahan dari mahasiswa atau admin
            $table->text('note')->nullable();

            // Catatan sanksi jika ada pelanggaran
            $table->text('catatan_sanksi')->nullable();

            // Relasi ke fasilitas dan mahasiswa
            $table->foreignId('fasilitas_id')->constrained('fasilitas_kampus', 'id_fasilitas')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa', 'id_mahasiswa')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barang', 'id_barang')->onDelete('cascade');

            // created_at & updated_at
            $table->timestamps();
        });
    }
    public function down(): void
    {
        //
    }
};
