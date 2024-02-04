<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Dapatkan ID semester dari tabel "semesters"
       $semesterIds = DB::table('semesters')->pluck('id');

       // Tentukan data untuk seeding
       $periods = [
           [
               'name' => 'Periode Penerimaan 1 - Semester 1',
               'semester_id' => $semesterIds[0],
               'start_date' => '2023-01-01',
               'end_date' => '2023-01-15',
               'discount_information' => 'Diskon pendaftaran awal tersedia.',

           ],
           [
               'name' => 'Periode Penerimaan 2 - Semester 1',
               'semester_id' => $semesterIds[0],
               'start_date' => '2023-01-16',
               'end_date' => '2023-01-31',
               'discount_information' => 'Diskon terbatas untuk pendaftaran terlambat.',
           ],
           [
               'name' => 'Periode Penerimaan 1 - Semester 2',
               'semester_id' => $semesterIds[1],
               'start_date' => '2024-01-01',
               'end_date' => '2024-04-15',
               'discount_information' => 'Diskon pendaftaran awal tersedia.',
           ],
           // Tambahkan lebih banyak periode sesuai kebutuhan
       ];

       // Masukkan data ke dalam tabel "periods"
       DB::table('periodes')->insert($periods);
    }
}
