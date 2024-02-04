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
                'codename' => 'faperta',
            ],
            [
                'name' => 'Fakultas Ilmu Pangan Halal',
                'codename' => 'fiphal',
            ],
            [
                'name' => 'Fakultas Ekonomi',
                'codename' => 'fe',
            ],
            [
                'name' => 'Fakultas Ilmu Sosial, Ilmu Politik',
                'codename' => 'fisip',
            ],
            [
                'name' => 'Fakultas Hukum',
                'codename' => 'fh',
            ],
            [
                'name' => 'Fakultas Agama Islam dan Pendidikan Guru',
                'codename' => 'faipg',
            ],
            [
                'name' => 'Fakultas Ilmu Komputer',
                'codename' => 'filkom',
            ],
            [
                'name' => 'Sekolah Pascasarjana',
                'codename' => 'pascasarjana',
            ],
        ];

        // Insert data into "fakultas" table
        DB::table('fakultas')->insert($fakultas);
    }
}
