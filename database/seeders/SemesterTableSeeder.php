<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the IDs of years from the "years" table
        $yearIds = DB::table('tahun_akademiks')->pluck('id');

        // Define data for seeding
        $semesters = [
            ['name' => 'Semester 1', 'tahun_id' => $yearIds[0]],
            ['name' => 'Semester 2', 'tahun_id' => $yearIds[0]],
            ['name' => 'Semester 1', 'tahun_id' => $yearIds[1]],
            ['name' => 'Semester 2', 'tahun_id' => $yearIds[1]],
            ['name' => 'Semester 1', 'tahun_id' => $yearIds[2]],
            ['name' => 'Semester 2', 'tahun_id' => $yearIds[2]],
            // Add more semesters as needed
        ];

        // Insert data into the "semesters" table
        DB::table('semesters')->insert($semesters);
    }
}
