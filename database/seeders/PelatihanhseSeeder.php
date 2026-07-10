<?php

namespace Database\Seeders;

use App\Models\Pelatihanhse;
use Illuminate\Database\Seeder;

class PelatihanhseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelatihans = [
            [
                'nama_pelatihan' => 'Pelatihan K3 Dasar untuk Karyawan Baru',
                'kategori' => 'k3_umum',
                'tanggal' => '2026-05-05',
                'durasi' => '2 hari',
                'jumlah_peserta' => 25,
                'instruktur' => 'Ahmad Fauzi',
                'kelas' => 'kelas_praktik',
                'nilai_evaluasi' => 88,
                'sertifikat' => 'ya',
                'status' => 'selesai',
                'link_sertifikat' => 'https://sertifikat.simk3.local/k3-dasar-2026-05',
            ],
            [
                'nama_pelatihan' => 'Simulasi Tanggap Darurat Kebakaran',
                'kategori' => 'kebakaran',
                'tanggal' => '2026-05-20',
                'durasi' => '1 hari',
                'jumlah_peserta' => 40,
                'instruktur' => 'Tim Damkar Wilayah',
                'kelas' => 'praktik',
                'nilai_evaluasi' => 82,
                'sertifikat' => 'ya',
                'status' => 'selesai',
                'link_sertifikat' => 'https://sertifikat.simk3.local/kebakaran-2026-05',
            ],
            [
                'nama_pelatihan' => 'Penggunaan dan Perawatan APD',
                'kategori' => 'apd',
                'tanggal' => '2026-06-03',
                'durasi' => '4 jam',
                'jumlah_peserta' => 30,
                'instruktur' => 'Siti Nurhaliza',
                'kelas' => 'kelas',
                'nilai_evaluasi' => 90,
                'sertifikat' => 'ya',
                'status' => 'selesai',
                'link_sertifikat' => 'https://sertifikat.simk3.local/apd-2026-06',
            ],
            [
                'nama_pelatihan' => 'P3K dan Kesehatan Kerja',
                'kategori' => 'kesehatan',
                'tanggal' => '2026-06-18',
                'durasi' => '1 hari',
                'jumlah_peserta' => 20,
                'instruktur' => 'dr. Maya Sari',
                'kelas' => 'kelas_praktik',
                'nilai_evaluasi' => 0,
                'sertifikat' => 'tidak',
                'status' => 'dijadwalkan',
                'link_sertifikat' => null,
            ],
            [
                'nama_pelatihan' => 'Keselamatan Bekerja di Ruang Terbatas',
                'kategori' => 'ruang_terbatas',
                'tanggal' => '2026-07-02',
                'durasi' => '2 hari',
                'jumlah_peserta' => 15,
                'instruktur' => 'Rudi Hartono',
                'kelas' => 'praktik',
                'nilai_evaluasi' => 79,
                'sertifikat' => 'ya',
                'status' => 'selesai',
                'link_sertifikat' => 'https://sertifikat.simk3.local/ruang-terbatas-2026-07',
            ],
            [
                'nama_pelatihan' => 'Sistem Manajemen K3 (SMK3) untuk Supervisor',
                'kategori' => 'manajemen',
                'tanggal' => '2026-07-15',
                'durasi' => '3 hari',
                'jumlah_peserta' => 12,
                'instruktur' => 'Konsultan HSE Eksternal',
                'kelas' => 'online',
                'nilai_evaluasi' => 0,
                'sertifikat' => 'tidak',
                'status' => 'dijadwalkan',
                'link_sertifikat' => null,
            ],
            [
                'nama_pelatihan' => 'Pengelolaan Limbah B3 dan Lingkungan',
                'kategori' => 'lingkungan',
                'tanggal' => '2026-05-28',
                'durasi' => '1 hari',
                'jumlah_peserta' => 18,
                'instruktur' => 'Indah Permata',
                'kelas' => 'e_learning',
                'nilai_evaluasi' => 0,
                'sertifikat' => 'tidak',
                'status' => 'batal',
                'link_sertifikat' => null,
            ],
            [
                'nama_pelatihan' => 'Penanganan Bahan Kimia Berbahaya',
                'kategori' => 'kimia',
                'tanggal' => '2026-06-25',
                'durasi' => '2 hari',
                'jumlah_peserta' => 22,
                'instruktur' => 'Rudi Hartono',
                'kelas' => 'kelas_praktik',
                'nilai_evaluasi' => 85,
                'sertifikat' => 'ya',
                'status' => 'selesai',
                'link_sertifikat' => 'https://sertifikat.simk3.local/kimia-2026-06',
            ],
        ];

        foreach ($pelatihans as $pelatihan) {
            Pelatihanhse::create($pelatihan);
        }
    }
}
