<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HSE Manager',
                'email' => 'hsemanger@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'hsemanger',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supervisor',
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'supervisor',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karyawan',
                'email' => 'karyawan@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'karyawan',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kontraktor',
                'email' => 'kontraktor@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'kontraktor',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paramedis',
                'email' => 'paramedis@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'paramedis',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tim Tanggap Darurat',
                'email' => 'timtanggapdarurat@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'timtanggapdarurat',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'direksi',
                'email' => 'direksi@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'direksi',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'auditor',
                'email' => 'auditor@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'auditor',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
