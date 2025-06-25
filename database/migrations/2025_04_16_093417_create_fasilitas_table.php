<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fasilitas_kampus', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->string('nama_fasilitas');
            $table->string('lokasi');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->integer('stok')->default(0);
             $table->enum('status_pengajuan', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_kampus');
    }
};
