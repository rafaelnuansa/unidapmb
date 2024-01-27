<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data yang ada di tabel users (opsional)
        // DB::table('users')->truncate();

        // Tambahkan data pengguna
        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => true,
            ],
            // Tambahkan data pengguna lainnya di sini
        ]);
    }
}
