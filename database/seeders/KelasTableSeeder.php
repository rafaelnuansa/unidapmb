<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            ['code' => 'A', 'name' => 'Kelas Pagi'],
            ['code' => 'B', 'name' => 'Kelas Sore'],
            ['code' => 'C', 'name' => 'Kelas Eksekutif'],
            // Add more classrooms as needed
        ];

        // Insert data into the "classrooms" table
        DB::table('kelas')->insert($classrooms);
    }
}
