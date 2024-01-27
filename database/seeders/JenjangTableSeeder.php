<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define data for seeding
         $jenjangs = [
            ['name' => 'S1'],
            ['name' => 'S2'],
            ['name' => 'S3'],
        ];

        // Insert data into the "jenjangs" table
        DB::table('jenjangs')->insert($jenjangs);
    }
}
