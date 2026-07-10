<?php

namespace Database\Seeders;

use App\Models\LaporanInsiden;
use App\Models\User;
use Illuminate\Database\Seeder;

class LaporanInsidenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelapor = User::pluck('id', 'role');

        $laporans = [
            [
                'jenis_insiden' => 'Kecelakaan Kerja',
                'tanggal' => '2026-05-03',
                'waktu' => '09:15',
                'lokasi' => 'Area Produksi Line 1',
                'nama_korban' => 'Budi Santoso',
                'jabatan' => 'Operator Mesin',
                'departemen' => 'Produksi',
                'hari_hilang' => '3',
                'deskripsi_kejadian' => 'Tangan korban terjepit conveyor saat membersihkan mesin yang belum dimatikan sepenuhnya.',
                'penyebab_langsung' => 'Mesin masih menyala saat proses pembersihan.',
                'penyebab_dasar' => 'Prosedur LOTO (Lock Out Tag Out) tidak dijalankan.',
                'tindakan_segera' => 'Korban dievakuasi dan dibawa ke klinik untuk penanganan pertama.',
                'tindakan_perbaikan' => 'Sosialisasi ulang prosedur LOTO ke seluruh operator produksi.',
                'status' => LaporanInsiden::STATUS_CLOSED,
                'reporter' => 'supervisor',
            ],
            [
                'jenis_insiden' => 'Nearmiss',
                'tanggal' => '2026-06-10',
                'waktu' => '13:40',
                'lokasi' => 'Gudang Logistik',
                'nama_korban' => 'Eko Prasetyo',
                'jabatan' => 'Driver',
                'departemen' => 'Logistik',
                'hari_hilang' => '0',
                'deskripsi_kejadian' => 'Palet barang hampir jatuh menimpa karyawan saat forklift mengangkat beban melebihi kapasitas.',
                'penyebab_langsung' => 'Beban forklift melebihi kapasitas maksimum.',
                'penyebab_dasar' => 'Tidak ada pengecekan kapasitas sebelum pengangkatan.',
                'tindakan_segera' => 'Operator forklift menghentikan pengangkatan dan mengevakuasi area.',
                'tindakan_perbaikan' => 'Pemasangan rambu batas kapasitas forklift di area gudang.',
                'status' => LaporanInsiden::STATUS_IN_PROGRESS,
                'reporter' => 'karyawan',
            ],
            [
                'jenis_insiden' => 'Kebakaran',
                'tanggal' => '2026-04-20',
                'waktu' => '02:30',
                'lokasi' => 'Ruang Panel Listrik',
                'nama_korban' => '-',
                'jabatan' => null,
                'departemen' => 'Maintenance',
                'hari_hilang' => '0',
                'deskripsi_kejadian' => 'Korsleting listrik menyebabkan percikan api kecil pada panel utama.',
                'penyebab_langsung' => 'Kabel panel mengalami korsleting akibat usia pakai.',
                'penyebab_dasar' => 'Belum ada jadwal inspeksi berkala untuk panel listrik.',
                'tindakan_segera' => 'Petugas keamanan memadamkan api menggunakan APAR sebelum membesar.',
                'tindakan_perbaikan' => 'Penjadwalan inspeksi rutin kelistrikan setiap 3 bulan.',
                'status' => LaporanInsiden::STATUS_CLOSED,
                'reporter' => 'timtanggapdarurat',
            ],
            [
                'jenis_insiden' => 'Tumpahan B3',
                'tanggal' => '2026-06-25',
                'waktu' => '10:05',
                'lokasi' => 'Area Penyimpanan Kimia',
                'nama_korban' => 'Rudi Hartono',
                'jabatan' => 'Teknisi',
                'departemen' => 'Maintenance',
                'hari_hilang' => '1',
                'deskripsi_kejadian' => 'Drum bahan kimia bocor saat proses pemindahan ke area penyimpanan.',
                'penyebab_langsung' => 'Drum penyimpanan sudah berkarat dan retak.',
                'penyebab_dasar' => 'Tidak ada rotasi stok dan pengecekan kondisi drum secara berkala.',
                'tindakan_segera' => 'Area diisolasi dan tumpahan dibersihkan sesuai prosedur penanganan B3.',
                'tindakan_perbaikan' => 'Penggantian drum penyimpanan dan penambahan jadwal inspeksi.',
                'status' => LaporanInsiden::STATUS_IN_PROGRESS,
                'reporter' => 'paramedis',
            ],
            [
                'jenis_insiden' => 'Kerusakan Alat',
                'tanggal' => '2026-07-01',
                'waktu' => '15:20',
                'lokasi' => 'Area Produksi Line 2',
                'nama_korban' => '-',
                'jabatan' => null,
                'departemen' => 'Produksi',
                'hari_hilang' => '0',
                'deskripsi_kejadian' => 'Mesin press mengalami kerusakan mendadak dan mengeluarkan suara keras saat beroperasi.',
                'penyebab_langsung' => 'Komponen bearing mesin aus.',
                'penyebab_dasar' => 'Perawatan preventif tidak dilakukan sesuai jadwal.',
                'tindakan_segera' => 'Mesin dihentikan dan area dipasang garis pembatas.',
                'tindakan_perbaikan' => 'Penggantian bearing dan penyusunan ulang jadwal preventive maintenance.',
                'status' => LaporanInsiden::STATUS_OPEN,
                'reporter' => 'supervisor',
            ],
            [
                'jenis_insiden' => 'Kecelakaan Kerja',
                'tanggal' => '2026-07-05',
                'waktu' => '08:50',
                'lokasi' => 'Area Parkir Kendaraan',
                'nama_korban' => 'Indah Permata',
                'jabatan' => 'Staff Gudang',
                'departemen' => 'Logistik',
                'hari_hilang' => '0',
                'deskripsi_kejadian' => 'Korban terpeleset di area parkir yang licin akibat hujan.',
                'penyebab_langsung' => 'Permukaan lantai parkir licin.',
                'penyebab_dasar' => 'Tidak ada rambu peringatan area licin.',
                'tindakan_segera' => 'Korban mendapat pertolongan pertama di klinik perusahaan.',
                'tindakan_perbaikan' => 'Pemasangan rambu peringatan dan lapisan anti-slip di area parkir.',
                'status' => LaporanInsiden::STATUS_OPEN,
                'reporter' => 'karyawan',
            ],
        ];

        foreach ($laporans as $laporan) {
            $reporterRole = $laporan['reporter'];
            unset($laporan['reporter']);

            LaporanInsiden::create([
                ...$laporan,
                'no_laporan' => LaporanInsiden::generateNoLaporan(),
                'user_id' => $pelapor[$reporterRole] ?? $pelapor->first(),
            ]);
        }
    }
}
