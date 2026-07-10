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
        Schema::create('laporan_insidens', function (Blueprint $table) {
            $table->id();
            $table->string('no_laporan');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('Jenis Insiden');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('Lokasi');
            $table->string('nama_korban');
            $table->string('jabatan')->nullable();
            $table->string('departemen')->nullable();
            $table->string('hari_hilang')->nullable();
            $table->text('deskripsi_kejadian')->nullable();
            $table->text('penyebab_langsung')->nullable();
            $table->text('penyebab_dasar')->nullable();
            $table->text('tindakan_segera')->nullable();
            $table->text('tindakan_perbaikan')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_insidens');
    }
};
