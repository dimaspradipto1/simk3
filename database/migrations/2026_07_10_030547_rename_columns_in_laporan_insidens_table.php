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
        Schema::table('laporan_insidens', function (Blueprint $table) {
            $table->dropColumn(['Jenis Insiden', 'Lokasi']);
        });

        Schema::table('laporan_insidens', function (Blueprint $table) {
            $table->string('jenis_insiden')->after('user_id');
            $table->string('lokasi')->after('waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_insidens', function (Blueprint $table) {
            $table->dropColumn(['jenis_insiden', 'lokasi']);
        });

        Schema::table('laporan_insidens', function (Blueprint $table) {
            $table->string('Jenis Insiden')->after('user_id');
            $table->string('Lokasi')->after('waktu');
        });
    }
};
