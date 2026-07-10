<?php

namespace Database\Seeders;

use App\Models\Ibpr;
use Illuminate\Database\Seeder;

class IbprSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ibprs = [
            [
                'aktivitas' => 'Bekerja di Ketinggian',
                'bahaya' => 'Jatuh dari ketinggian',
                'konsekuensi' => 'Cidera serius/fatal',
                'keparahan' => 5,
                'kemungkinan' => 3,
                'hierarki' => 'eliminasi_substitusi',
                'pic' => 'Safety Manager',
                'batas_waktu' => '2024-03-31',
                'status' => 'open',
            ],
            [
                'aktivitas' => 'Pengelasan',
                'bahaya' => 'Paparan asap las',
                'konsekuensi' => 'Gangguan pernafasan',
                'keparahan' => 4,
                'kemungkinan' => 4,
                'hierarki' => 'apd',
                'pic' => 'HSE Supervisor',
                'batas_waktu' => '2024-04-30',
                'status' => 'in_progress',
            ],
            [
                'aktivitas' => 'Penggunaan Bahan Kimia',
                'bahaya' => 'Tumpahan/paparan kimia',
                'konsekuensi' => 'Iritasi kulit/mata, kebakaran',
                'keparahan' => 4,
                'kemungkinan' => 3,
                'hierarki' => 'substitusi',
                'pic' => 'Safety Officer',
                'batas_waktu' => '2024-05-31',
                'status' => 'open',
            ],
            [
                'aktivitas' => 'Operasi Forklift',
                'bahaya' => 'Tertabrak forklift',
                'konsekuensi' => 'Cidera/fatality',
                'keparahan' => 5,
                'kemungkinan' => 2,
                'hierarki' => 'rekayasa',
                'pic' => 'Engineering',
                'batas_waktu' => '2024-06-30',
                'status' => 'in_progress',
            ],
            [
                'aktivitas' => 'Pekerjaan Listrik',
                'bahaya' => 'Sengatan listrik',
                'konsekuensi' => 'Cidera/fatality',
                'keparahan' => 5,
                'kemungkinan' => 2,
                'hierarki' => 'eliminasi',
                'pic' => 'HSE + Elektro',
                'batas_waktu' => '2024-07-31',
                'status' => 'open',
            ],
            [
                'aktivitas' => 'Manual Handling',
                'bahaya' => 'Cidera punggung',
                'konsekuensi' => 'Musculoskeletal disorder',
                'keparahan' => 3,
                'kemungkinan' => 4,
                'hierarki' => 'rekayasa',
                'pic' => 'Safety Officer',
                'batas_waktu' => '2024-08-31',
                'status' => 'selesai',
            ],
        ];

        foreach ($ibprs as $ibpr) {
            Ibpr::create($ibpr);
        }
    }
}
