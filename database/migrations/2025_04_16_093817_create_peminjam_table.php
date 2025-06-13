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
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id('id_peminjam');
            $table->date('date');
            $table->text('note')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->string('status_pengajuan')->nullable();
            $table->foreignId('fasilitas_id')->constrained('fasilitas_kampus', 'id_fasilitas')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa', 'id_mahasiswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjam');
    }
};
