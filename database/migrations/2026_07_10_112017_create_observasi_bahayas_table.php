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
        Schema::create('observasi_bahayas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('lokasi');
            $table->text('deskripsi_bahaya');
            $table->string('kategori_bahaya');
            $table->string('tingkat_resiko');
            $table->text('tindakan_perbaikan')->nullable();
            $table->string('pic');
            $table->date('target_selesai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('status')->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observasi_bahayas');
    }
};
