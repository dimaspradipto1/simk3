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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_dokumen');
            $table->string('jenis');
            $table->text('nama_dokumen');
            $table->string('versi')->nullable();
            $table->string('pemilik_dokumen')->nullable();
            $table->date('tanggal_efektif');
            $table->date('tanggal_review')->nullable();
            $table->string('status');
            $table->string('link_dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
