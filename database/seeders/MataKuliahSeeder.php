<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $matkul = [
            [
                'Nama Matkul' => 'Pemrograman Berbasis Objek',
                'SKS' => 3,
                'Jam' => 6,
                'Semester' => 4,
            ],
            [
                'Nama Matkul' => 'Pemrograman Web Lanjut',
                'SKS' => 3,
                'Jam' => 6,
                'Semester' => 4,
            ],
            [
                'Nama Matkul' => 'Basis Data Lanjut',
                'SKS' => 3,
                'Jam' => 4,
                'Semester' => 4,
            ],
            [
                'Nama Matkul' => 'Praktikum Basis Data Lanjut',
                'SKS' => 3,
                'Jam' => 6,
                'Semester' => 4,
            ],
            
        ];

        DB::table('matakuliah')->insert($matkul);
    }
}
