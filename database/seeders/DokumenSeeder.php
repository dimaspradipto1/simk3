<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Seeder;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokumens = [
            [
                'nomor_dokumen' => 'HSE-SOP-001',
                'nama_dokumen' => 'SOP Penggunaan APAR',
                'jenis' => 'sop',
                'versi' => 'Rev.3',
                'tanggal_efektif' => '2024-01-01',
                'tanggal_review' => '2025-01-01',
                'pemilik_dokumen' => 'Safety Officer',
                'status' => 'aktif',
            ],
            [
                'nomor_dokumen' => 'HSE-SOP-002',
                'nama_dokumen' => 'SOP Penanganan Tumpahan Kimia',
                'jenis' => 'sop',
                'versi' => 'Rev.2',
                'tanggal_efektif' => '2023-03-01',
                'tanggal_review' => '2024-03-01',
                'pemilik_dokumen' => 'HSE Manager',
                'status' => 'review',
            ],
            [
                'nomor_dokumen' => 'HSE-SOP-003',
                'nama_dokumen' => 'SOP Bekerja di Ketinggian',
                'jenis' => 'sop',
                'versi' => 'Rev.4',
                'tanggal_efektif' => '2024-01-15',
                'tanggal_review' => '2025-01-15',
                'pemilik_dokumen' => 'Safety Supervisor',
                'status' => 'aktif',
            ],
            [
                'nomor_dokumen' => 'HSE-SOP-004',
                'nama_dokumen' => 'SOP Permit to Work',
                'jenis' => 'sop',
                'versi' => 'Rev.1',
                'tanggal_efektif' => '2023-06-01',
                'tanggal_review' => '2024-06-01',
                'pemilik_dokumen' => 'HSE Manager',
                'status' => 'review',
            ],
            [
                'nomor_dokumen' => 'HSE-PRO-001',
                'nama_dokumen' => 'Prosedur Tanggap Darurat Kebakaran',
                'jenis' => 'prosedur',
                'versi' => 'Rev.2',
                'tanggal_efektif' => '2024-01-01',
                'tanggal_review' => '2025-01-01',
                'pemilik_dokumen' => 'Safety Manager',
                'status' => 'aktif',
            ],
            [
                'nomor_dokumen' => 'HSE-FOR-001',
                'nama_dokumen' => 'Formulir Laporan Insiden',
                'jenis' => 'formulir',
                'versi' => 'Rev.5',
                'tanggal_efektif' => '2024-01-01',
                'tanggal_review' => '2024-07-01',
                'pemilik_dokumen' => 'Safety Officer',
                'status' => 'aktif',
            ],
            [
                'nomor_dokumen' => 'HSE-POL-001',
                'nama_dokumen' => 'Kebijakan K3 Perusahaan',
                'jenis' => 'kebijakan',
                'versi' => 'Rev.1',
                'tanggal_efektif' => '2023-01-01',
                'tanggal_review' => '2025-01-01',
                'pemilik_dokumen' => 'Direktur',
                'status' => 'aktif',
            ],
            [
                'nomor_dokumen' => 'HSE-MAN-001',
                'nama_dokumen' => 'Manual Sistem Manajemen K3',
                'jenis' => 'manual',
                'versi' => 'Rev.2',
                'tanggal_efektif' => '2023-06-01',
                'tanggal_review' => '2024-06-01',
                'pemilik_dokumen' => 'HSE Manager',
                'status' => 'review',
            ],
        ];

        foreach ($dokumens as $dokumen) {
            Dokumen::create($dokumen);
        }
    }
}
