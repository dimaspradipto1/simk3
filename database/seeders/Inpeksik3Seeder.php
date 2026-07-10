<?php

namespace Database\Seeders;

use App\Models\Inpeksik3;
use Illuminate\Database\Seeder;

class Inpeksik3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inpeksis = [
            [
                'tanggal' => '2026-06-01',
                'lokasi' => 'Area Produksi Line 1',
                'jenis_inpeksi' => 'rutin_harian',
                'inspektor' => 'Ahmad Fauzi',
                'skor' => 92,
                'status_selesai' => 'selesai',
                'temuan' => 'APD lengkap digunakan, area kerja bersih dan rapi.',
                'rekomendasi' => 'Pertahankan kondisi kebersihan area kerja.',
                'tindak_lanjut' => 'Tidak ada tindak lanjut khusus.',
            ],
            [
                'tanggal' => '2026-06-05',
                'lokasi' => 'Gudang Logistik',
                'jenis_inpeksi' => 'rutin_mingguan',
                'inspektor' => 'Siti Nurhaliza',
                'skor' => 68,
                'status_selesai' => 'belum',
                'temuan' => 'Beberapa palet disusun melebihi tinggi maksimum yang aman.',
                'rekomendasi' => 'Susun ulang palet sesuai batas tinggi aman dan pasang rambu.',
                'tindak_lanjut' => 'Menunggu perbaikan tata letak gudang oleh tim logistik.',
            ],
            [
                'tanggal' => '2026-06-10',
                'lokasi' => 'Ruang Panel Listrik',
                'jenis_inpeksi' => 'khusus',
                'inspektor' => 'Ahmad Fauzi',
                'skor' => 75,
                'status_selesai' => 'selesai',
                'temuan' => 'Ditemukan kabel yang mulai getas pada salah satu panel.',
                'rekomendasi' => 'Penggantian kabel dan jadwal inspeksi kelistrikan rutin.',
                'tindak_lanjut' => 'Kabel telah diganti oleh tim maintenance.',
            ],
            [
                'tanggal' => '2026-06-15',
                'lokasi' => 'Seluruh Area Pabrik',
                'jenis_inpeksi' => 'audit_internal',
                'inspektor' => 'Siti Nurhaliza',
                'skor' => 81,
                'status_selesai' => 'selesai',
                'temuan' => 'Secara umum kepatuhan K3 baik, namun dokumentasi pelatihan belum lengkap.',
                'rekomendasi' => 'Lengkapi dokumentasi pelatihan HSE seluruh karyawan.',
                'tindak_lanjut' => 'HR sedang menyusun ulang arsip pelatihan.',
            ],
            [
                'tanggal' => '2026-07-01',
                'lokasi' => 'Area Penyimpanan Kimia',
                'jenis_inpeksi' => 'audit_eksternal',
                'inspektor' => 'Auditor Eksternal - PT Sertifikasi Aman',
                'skor' => 88,
                'status_selesai' => 'selesai',
                'temuan' => 'Penyimpanan B3 sudah sesuai standar, MSDS tersedia lengkap.',
                'rekomendasi' => 'Pertahankan sistem pelabelan dan penyimpanan saat ini.',
                'tindak_lanjut' => 'Sertifikat kepatuhan diterbitkan.',
            ],
            [
                'tanggal' => '2026-07-08',
                'lokasi' => 'Area Produksi Line 2',
                'jenis_inpeksi' => 'rutin_bulanan',
                'inspektor' => 'Ahmad Fauzi',
                'skor' => 55,
                'status_selesai' => 'belum',
                'temuan' => 'Mesin press tidak memiliki pelindung pada bagian bergerak.',
                'rekomendasi' => 'Pemasangan safety guard pada seluruh mesin press.',
                'tindak_lanjut' => 'Menunggu pengadaan safety guard dari vendor.',
            ],
            [
                'tanggal' => '2026-07-09',
                'lokasi' => 'Area Parkir Kendaraan',
                'jenis_inpeksi' => 'khusus',
                'inspektor' => 'Siti Nurhaliza',
                'skor' => 0,
                'status_selesai' => 'batal',
                'temuan' => null,
                'rekomendasi' => null,
                'tindak_lanjut' => 'Inspeksi dibatalkan karena cuaca ekstrem, dijadwalkan ulang.',
            ],
        ];

        foreach ($inpeksis as $inpeksi) {
            Inpeksik3::create($inpeksi);
        }
    }
}
