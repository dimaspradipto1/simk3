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
        Schema::create('ibprs', function (Blueprint $table) {
            $table->id();
            $table->string('aktivitas');
            $table->text('bahaya');
            $table->text('konsekuensi');
            $table->text('pengendalian_saat_ini')->nullable();
            $table->integer('keparahan');
            $table->integer('kemungkinan');
            $table->string('hierarki');
            $table->string('pic')->nullable();
            $table->text('pengendalian_tambahan')->nullable();
            $table->date('batas_waktu');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibprs');
    }
};
