<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beasiswas = [
            ['name' => 'Beasiswa Prestasi', 'description' => 'Beasiswa untuk mahasiswa berprestasi.'],
            ['name' => 'Beasiswa Bidikmisi', 'description' => 'Beasiswa untuk mahasiswa berkebutuhan ekonomi.'],
            ['name' => 'Beasiswa PPA', 'description' => 'Beasiswa Peningkatan Prestasi Akademik.'],
            ['name' => 'Beasiswa Unggulan', 'description' => 'Beasiswa untuk mahasiswa yang memiliki prestasi unggulan.'],
            ['name' => 'Beasiswa Riset', 'description' => 'Beasiswa untuk mendukung kegiatan riset mahasiswa.'],
            ['name' => 'Beasiswa Kreatifitas', 'description' => 'Beasiswa untuk mahasiswa dengan kreativitas tinggi.'],
            ['name' => 'Beasiswa Keilmuan', 'description' => 'Beasiswa untuk mahasiswa dengan keilmuan tertentu.'],
            ['name' => 'Beasiswa Kewirausahaan', 'description' => 'Beasiswa untuk mahasiswa dengan minat dan keterampilan kewirausahaan.'],
            // Tambahkan lebih banyak beasiswa sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel "beasiswas"
        DB::table('beasiswas')->insert($beasiswas);
    }
}
