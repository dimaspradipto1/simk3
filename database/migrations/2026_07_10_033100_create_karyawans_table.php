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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departemen_id')->constrained('departemens')->onDelete('restrict');
            $table->string('nip')->nullable()->unique();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
