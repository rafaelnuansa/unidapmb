<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(JenjangTableSeeder::class);
        $this->call(FakultasTableSeeder::class);
        $this->call(TahunAkademikTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(PeriodeTableSeeder::class);
        $this->call(JurusanTableSeeder::class);
        $this->call(BeasiswaTableSeeder::class);
    }
}
