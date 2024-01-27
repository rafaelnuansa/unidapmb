<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Dapatkan ID program dari tabel "jenjangs"
         $programIds = DB::table('jenjangs')->pluck('id');

         // Dapatkan ID fakultas dari tabel "fakultas"
         $facultyIds = DB::table('fakultas')->pluck('id');
         // Tentukan data untuk seeding
         $departments = [
             // Fakultas Pertanian
             ['name' => 'Agroteknologi (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[0]],
             ['name' => 'Agribisnis (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[0]],
             ['name' => 'Peternakan (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[0]],
             ['name' => 'Akuakultur (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[0]],

             // Fakultas Ilmu Pangan Halal
             ['name' => 'Teknologi Pangan (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[1]],
             ['name' => 'Teknologi Industri Pertanian (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[1]],

             // Fakultas Ekonomi
             ['name' => 'Manajemen (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[2]],
             ['name' => 'Akuntansi (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[2]],

             // Fakultas Ilmu Sosial, Ilmu Politik, dan Ilmu Komputer
             ['name' => 'Administrasi Publik (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[3]],
             ['name' => 'Sains Komunikasi (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[3]],
             ['name' => 'Ilmu Komputer (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[3]],

             // Fakultas Hukum
             ['name' => 'Hukum (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[4]],

             // Fakultas Agama Islam dan Pendidikan Guru
             ['name' => 'Pendidikan Guru Sekolah Dasar (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[5]],
             ['name' => 'Manajemen Pendidikan Islam (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[5]],
             ['name' => 'Pendidikan Bahasa Arab (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[5]],
             ['name' => 'Ekonomi Syariah (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[5]],
             ['name' => 'Perbankan Syariah (S1)', 'jenjang_id' => $programIds[0], 'fakultas_id' => $facultyIds[5]],

             // Sekolah Pascasarjana
             ['name' => 'Magister Hukum (S2)', 'jenjang_id' => $programIds[1], 'fakultas_id' =>  $facultyIds[6]],
             ['name' => 'Magister Teknologi Pangan (S2)', 'jenjang_id' => $programIds[1], 'fakultas_id' =>  $facultyIds[6]],
             ['name' => 'Magister Administrasi Publik (S2)', 'jenjang_id' => $programIds[1], 'fakultas_id' =>  $facultyIds[6]],
             // Tambahkan lebih banyak departemen sesuai kebutuhan
         ];
         // Masukkan data ke dalam tabel "jurusans"
         DB::table('jurusans')->insert($departments);
    }
}
