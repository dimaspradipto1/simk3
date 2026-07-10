<?php

namespace Database\Seeders;

use App\Models\ObservasiBahaya;
use Illuminate\Database\Seeder;

class ObservasiBahayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $observasis = [
            [
                'tanggal' => '2026-05-12',
                'lokasi' => 'Area Produksi Line 1',
                'deskripsi_bahaya' => 'Kabel listrik berserakan di lantai dekat mesin produksi.',
                'kategori_bahaya' => 'unsafe_condition',
                'tingkat_resiko' => 'sedang',
                'tindakan_perbaikan' => 'Kabel dirapikan dan dipasang cable tray.',
                'pic' => 'Rudi Hartono',
                'target_selesai' => '2026-05-19',
                'tanggal_selesai' => '2026-05-18',
                'status' => ObservasiBahaya::STATUS_CLOSED,
            ],
            [
                'tanggal' => '2026-06-02',
                'lokasi' => 'Gudang Logistik',
                'deskripsi_bahaya' => 'Operator forklift tidak menggunakan seatbelt saat bekerja.',
                'kategori_bahaya' => 'unsafe_act',
                'tingkat_resiko' => 'tinggi',
                'tindakan_perbaikan' => 'Briefing ulang SOP penggunaan forklift dan sanksi tegas.',
                'pic' => 'Eko Prasetyo',
                'target_selesai' => '2026-06-09',
                'tanggal_selesai' => null,
                'status' => ObservasiBahaya::STATUS_IN_PROGRESS,
            ],
            [
                'tanggal' => '2026-06-15',
                'lokasi' => 'Ruang Kerja Admin',
                'deskripsi_bahaya' => 'Posisi duduk dan monitor karyawan tidak ergonomis, berpotensi cedera otot.',
                'kategori_bahaya' => 'ergonomik',
                'tingkat_resiko' => 'rendah',
                'tindakan_perbaikan' => 'Pengadaan kursi ergonomis dan pengaturan ulang posisi monitor.',
                'pic' => 'Maya Sari',
                'target_selesai' => '2026-07-01',
                'tanggal_selesai' => null,
                'status' => ObservasiBahaya::STATUS_OPEN,
            ],
            [
                'tanggal' => '2026-06-20',
                'lokasi' => 'Area Penyimpanan Kimia',
                'deskripsi_bahaya' => 'Label bahan kimia pada beberapa drum sudah pudar dan sulit dibaca.',
                'kategori_bahaya' => 'kimia',
                'tingkat_resiko' => 'tinggi',
                'tindakan_perbaikan' => 'Pelabelan ulang seluruh drum sesuai standar GHS.',
                'pic' => 'Rudi Hartono',
                'target_selesai' => '2026-06-27',
                'tanggal_selesai' => '2026-06-26',
                'status' => ObservasiBahaya::STATUS_CLOSED,
            ],
            [
                'tanggal' => '2026-07-02',
                'lokasi' => 'Area Produksi Line 2',
                'deskripsi_bahaya' => 'Tingkat kebisingan mesin melebihi ambang batas aman tanpa pelindung telinga.',
                'kategori_bahaya' => 'fisik',
                'tingkat_resiko' => 'sedang',
                'tindakan_perbaikan' => 'Distribusi ear plug dan pemasangan peredam suara.',
                'pic' => 'Budi Santoso',
                'target_selesai' => '2026-07-16',
                'tanggal_selesai' => null,
                'status' => ObservasiBahaya::STATUS_OPEN,
            ],
            [
                'tanggal' => '2026-07-08',
                'lokasi' => 'Klinik Perusahaan',
                'deskripsi_bahaya' => 'Limbah medis tidak dipisahkan sesuai kategori infeksius dan non-infeksius.',
                'kategori_bahaya' => 'biologi',
                'tingkat_resiko' => 'sedang',
                'tindakan_perbaikan' => 'Penyediaan tempat sampah medis terpisah dan pelatihan penanganan limbah.',
                'pic' => 'Indah Permata',
                'target_selesai' => '2026-07-22',
                'tanggal_selesai' => null,
                'status' => ObservasiBahaya::STATUS_IN_PROGRESS,
            ],
        ];

        foreach ($observasis as $observasi) {
            ObservasiBahaya::create($observasi);
        }
    }
}
