<?php

namespace Database\Seeders;

use App\Models\Departemen;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemens = Departemen::pluck('id', 'nama_departemen');

        $karyawans = [
            ['nip' => '2024001', 'nama' => 'Ahmad Fauzi', 'departemen' => 'HSE', 'jabatan' => 'HSE Officer', 'no_hp' => '081234560001',
                'alamat' => 'Jl. Melati No. 1, Jakarta', 'tanggal_masuk' => '2022-01-10', 'is_active' => true],
            ['nip' => '2024002', 'nama' => 'Siti Nurhaliza', 'departemen' => 'HSE', 'jabatan' => 'HSE Supervisor', 'no_hp' => '081234560002',
                'alamat' => 'Jl. Mawar No. 2, Jakarta', 'tanggal_masuk' => '2021-03-15', 'is_active' => true],
            ['nip' => '2024003', 'nama' => 'Budi Santoso', 'departemen' => 'Produksi', 'jabatan' => 'Operator Mesin', 'no_hp' => '081234560003',
                'alamat' => 'Jl. Kenanga No. 3, Bekasi', 'tanggal_masuk' => '2020-06-01', 'is_active' => true],
            ['nip' => '2024004', 'nama' => 'Dewi Lestari', 'departemen' => 'Produksi', 'jabatan' => 'Kepala Shift', 'no_hp' => '081234560004',
                'alamat' => 'Jl. Anggrek No. 4, Bekasi', 'tanggal_masuk' => '2019-11-20', 'is_active' => true],
            ['nip' => '2024005', 'nama' => 'Rudi Hartono', 'departemen' => 'Maintenance', 'jabatan' => 'Teknisi', 'no_hp' => '081234560005',
                'alamat' => 'Jl. Dahlia No. 5, Tangerang', 'tanggal_masuk' => '2022-08-05', 'is_active' => true],
            ['nip' => '2024006', 'nama' => 'Indah Permata', 'departemen' => 'Logistik', 'jabatan' => 'Staff Gudang', 'no_hp' => '081234560006',
                'alamat' => 'Jl. Flamboyan No. 6, Depok', 'tanggal_masuk' => '2023-02-14', 'is_active' => true],
            ['nip' => '2024007', 'nama' => 'Eko Prasetyo', 'departemen' => 'Logistik', 'jabatan' => 'Driver', 'no_hp' => '081234560007',
                'alamat' => 'Jl. Cempaka No. 7, Depok', 'tanggal_masuk' => '2021-09-01', 'is_active' => true],
            ['nip' => '2024008', 'nama' => 'Maya Sari', 'departemen' => 'Human Resource', 'jabatan' => 'HR Staff', 'no_hp' => '081234560008',
                'alamat' => 'Jl. Teratai No. 8, Jakarta', 'tanggal_masuk' => '2020-04-10', 'is_active' => true],
            ['nip' => '2024009', 'nama' => 'Agus Setiawan', 'departemen' => 'Produksi', 'jabatan' => 'Operator Mesin', 'no_hp' => '081234560009',
                'alamat' => 'Jl. Seroja No. 9, Bekasi', 'tanggal_masuk' => '2023-05-22', 'is_active' => false],
            ['nip' => '2024010', 'nama' => 'Fitriani', 'departemen' => 'Maintenance', 'jabatan' => 'Admin Maintenance', 'no_hp' => '081234560010',
                'alamat' => 'Jl. Cempaka No. 10, Tangerang', 'tanggal_masuk' => '2022-12-01', 'is_active' => true],
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::create([
                'departemen_id' => $departemens[$karyawan['departemen']],
                'nip' => $karyawan['nip'],
                'nama' => $karyawan['nama'],
                'jabatan' => $karyawan['jabatan'],
                'no_hp' => $karyawan['no_hp'],
                'alamat' => $karyawan['alamat'],
                'tanggal_masuk' => $karyawan['tanggal_masuk'],
                'is_active' => $karyawan['is_active'],
            ]);
        }
    }
}
