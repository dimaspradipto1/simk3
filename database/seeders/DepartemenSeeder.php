<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemens = [
            ['nama_departemen' => 'HSE', 'keterangan' => 'Health, Safety & Environment'],
            ['nama_departemen' => 'Produksi', 'keterangan' => 'Divisi produksi dan operasional'],
            ['nama_departemen' => 'Maintenance', 'keterangan' => 'Perawatan mesin dan peralatan'],
            ['nama_departemen' => 'Logistik', 'keterangan' => 'Pergudangan dan distribusi'],
            ['nama_departemen' => 'Human Resource', 'keterangan' => 'Sumber daya manusia dan umum'],
        ];

        foreach ($departemens as $departemen) {
            Departemen::create($departemen);
        }
    }
}
