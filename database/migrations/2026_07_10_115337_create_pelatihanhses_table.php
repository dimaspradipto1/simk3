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
        Schema::create('pelatihanhses', function (Blueprint $table) {
            $table->id();
            $table->text('nama_pelatihan');
            $table->string('kategori');
            $table->date('tanggal');
            $table->string('durasi');
            $table->integer('jumlah_peserta');
            $table->string('instruktur');
            $table->string('kelas');
            $table->integer('nilai_evaluasi');
            $table->string('sertifikat');
            $table->string('status');
            $table->string('link_sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihanhses');
    }
};
