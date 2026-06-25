<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $mahasiswa = [
            ['npm' => '2024010001', 'nama' => 'Andi Pratama'],
            ['npm' => '2024010002', 'nama' => 'Bela Safitri'],
            ['npm' => '2024010003', 'nama' => 'Candra Wijaya'],
        ];

        foreach ($mahasiswa as $m) {
            Mahasiswa::create($m);

            // Buat akun login untuk tiap mahasiswa
            User::create([
                'name'     => $m['nama'],
                'email'    => strtolower(str_replace(' ', '.', $m['nama'])) . '@mhs.com',
                'password' => Hash::make('mhs123'),
                'role'     => 'mahasiswa',
                'npm'      => $m['npm'],
            ]);
        }
    }
}