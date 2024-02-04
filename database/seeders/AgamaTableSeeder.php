<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agamas = [
            ['name' => 'Islam'],
            ['name' => 'Christianity'],
            ['name' => 'Hinduism'],
            ['name' => 'Buddhism'],
            ['name' => 'Other'],
        ];

        // Using Eloquent Model
        // \App\Models\Agama::insert($agamas);

        // Using DB facade
        DB::table('agamas')->insert($agamas);
    }
}
