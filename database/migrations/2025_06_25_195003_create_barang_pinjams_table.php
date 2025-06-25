<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang_pinjam', function (Blueprint $table) {
            $table->id('id_barang_pinjam');
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->date('tanggal_peminjaman');
            $table->dateTime('tanggal_tenggat');
            $table->date('returned_at')->nullable();
            $table->enum('status_pengajuan', ['diajukan', 'ditolak', 'disetujui'])->default('diajukan');
            $table->enum('status_peminjaman', ['menunggu', 'dipinjam', 'dikembalikan'])->default('menunggu');
            $table->string('kondisi_barang')->nullable(); // misal: baik, rusak, hilang
            $table->integer('jumlah')->default(1);
            $table->integer('stok')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('barang_id')->references('id_barang')->on('barang')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_pinjam');
    }
};
