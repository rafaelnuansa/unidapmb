<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TahunAkademikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $years = [
            ['name' => '2022-2023'],
            ['name' => '2023-2024'],
            ['name' => '2024-2025'],
            // Add more years as needed
        ];
        DB::table('tahun_akademiks')->insert($years);
    }
}
