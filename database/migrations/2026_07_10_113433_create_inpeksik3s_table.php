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
        Schema::create('inpeksik3s', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('lokasi');
            $table->string('jenis_inpeksi');
            $table->string('inspektor');
            $table->integer('skor');
            $table->string('status_selesai');
            $table->text('temuan')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inpeksik3s');
    }
};
