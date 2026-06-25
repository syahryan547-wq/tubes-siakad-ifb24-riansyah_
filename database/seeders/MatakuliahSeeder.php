<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliah = [
            ['kode_matakuliah' => 'IF001',   'nama_matakuliah' => 'Algoritma & Pemrograman', 'sks' => 3],
            ['kode_matakuliah' => 'IF002',   'nama_matakuliah' => 'Struktur Data',            'sks' => 3],
            ['kode_matakuliah' => 'IF003',   'nama_matakuliah' => 'Basis Data',               'sks' => 3],
            ['kode_matakuliah' => 'IF004',   'nama_matakuliah' => 'Pemrograman Web I',        'sks' => 3],
            ['kode_matakuliah' => 'IF005',   'nama_matakuliah' => 'Pemrograman Web II',       'sks' => 3],
            ['kode_matakuliah' => 'IF006',   'nama_matakuliah' => 'Jaringan Komputer',        'sks' => 2],
        ];

        foreach ($matakuliah as $mk) {
            Matakuliah::create($mk);
        }
    }
}