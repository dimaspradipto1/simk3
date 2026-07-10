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
        Schema::create('apds', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_apd');
            $table->string('merek');
            $table->integer('jumlah_tersedia');
            $table->integer('jumlah_dibutuhkan');
            $table->string('kondisi');
            $table->date('tanggal_beli');
            $table->integer('masa_pakai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apds');
    }
};
