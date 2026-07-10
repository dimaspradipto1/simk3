<?php

namespace Database\Seeders;

use App\Models\Apd;
use Illuminate\Database\Seeder;

class ApdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apds = [
            [
                'jenis_apd' => 'Helm Safety (Hard Hat)',
                'merek' => 'MSA V-Gard',
                'jumlah_tersedia' => 550,
                'jumlah_dibutuhkan' => 500,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-01-01',
                'masa_pakai' => 24,
            ],
            [
                'jenis_apd' => 'Sepatu Safety',
                'merek' => 'Jogger Absolute',
                'jumlah_tersedia' => 480,
                'jumlah_dibutuhkan' => 500,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-01-01',
                'masa_pakai' => 12,
            ],
            [
                'jenis_apd' => 'Kacamata Safety',
                'merek' => '3M SecureFit',
                'jumlah_tersedia' => 200,
                'jumlah_dibutuhkan' => 300,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-03-01',
                'masa_pakai' => 6,
            ],
            [
                'jenis_apd' => 'Rompi Reflektif',
                'merek' => 'Dragon Fly',
                'jumlah_tersedia' => 520,
                'jumlah_dibutuhkan' => 500,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-01-01',
                'masa_pakai' => 18,
            ],
            [
                'jenis_apd' => 'Sarung Tangan Kulit',
                'merek' => 'Uvex Profi',
                'jumlah_tersedia' => 320,
                'jumlah_dibutuhkan' => 250,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-02-01',
                'masa_pakai' => 3,
            ],
            [
                'jenis_apd' => 'Masker Debu (N95)',
                'merek' => '3M 8210',
                'jumlah_tersedia' => 450,
                'jumlah_dibutuhkan' => 400,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-04-01',
                'masa_pakai' => 1,
            ],
            [
                'jenis_apd' => 'Full Body Harness',
                'merek' => 'Petzl Avao',
                'jumlah_tersedia' => 50,
                'jumlah_dibutuhkan' => 60,
                'kondisi' => 'perlu_periksa',
                'tanggal_beli' => '2023-06-01',
                'masa_pakai' => 36,
            ],
            [
                'jenis_apd' => 'SCBA',
                'merek' => 'Scott Air-Pak',
                'jumlah_tersedia' => 5,
                'jumlah_dibutuhkan' => 5,
                'kondisi' => 'baik',
                'tanggal_beli' => '2023-01-01',
                'masa_pakai' => 60,
            ],
            [
                'jenis_apd' => 'Pelindung Telinga',
                'merek' => 'Howard Leight',
                'jumlah_tersedia' => 150,
                'jumlah_dibutuhkan' => 150,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-01-01',
                'masa_pakai' => 24,
            ],
            [
                'jenis_apd' => 'Kacamata Las',
                'merek' => 'Lincoln Electric',
                'jumlah_tersedia' => 30,
                'jumlah_dibutuhkan' => 25,
                'kondisi' => 'baik',
                'tanggal_beli' => '2024-02-01',
                'masa_pakai' => 12,
            ],
        ];

        foreach ($apds as $apd) {
            Apd::create($apd);
        }
    }
}
