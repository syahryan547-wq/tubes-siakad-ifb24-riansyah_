<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        $dosen = [
            ['nidn' => '0101010001', 'nama' => 'Dr. Budi Santoso'],
            ['nidn' => '0101010002', 'nama' => 'Dr. Siti Rahayu'],
            ['nidn' => '0101010003', 'nama' => 'Prof. Ahmad Fauzi'],
            ['nidn' => '0101010004', 'nama' => 'Dr. Dewi Lestari'],
            ['nidn' => '0101010005', 'nama' => 'Dr. Eko Prasetyo'],
        ];

        foreach ($dosen as $d) {
            Dosen::create($d);
        }
    }
}