<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define data for seeding fakultas
         $fakultas = [
            [
                'name' => 'Fakultas Pertanian',
                'jenjang_id' => 1, // Assuming S1 jenjang_id is 1
            ],
            [
                'name' => 'Fakultas Ilmu Pangan Halal',
                'jenjang_id' => 1,
            ],
            [
                'name' => 'Fakultas Ekonomi',
                'jenjang_id' => 1,
            ],
            [
                'name' => 'Fakultas Ilmu Sosial, Ilmu Politik, dan Ilmu Komputer',
                'jenjang_id' => 1,
            ],
            [
                'name' => 'Fakultas Hukum',
                'jenjang_id' => 1,
            ],
            [
                'name' => 'Fakultas Agama Islam dan Pendidikan Guru',
                'jenjang_id' => 1,
            ],
            [
                'name' => 'Sekolah Pascasarjana',
                'jenjang_id' => 2, // Assuming S2 jenjang_id is 2
            ],
        ];

        // Insert data into "fakultas" table
        DB::table('fakultas')->insert($fakultas);
    }
}
