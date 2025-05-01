<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IqomahTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iqomah_times')->insert([
            [
                'sholat' => 'subuh',
                'duration' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sholat' => 'dzhuhur',
                'duration' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sholat' => 'asar',
                'duration' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sholat' => 'maghrib',
                'duration' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sholat' => 'isya',
                'duration' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

// php artisan make:seeder IqomahTimeSeeder
// php artisan db:seed --class=IqomahTimeSeeder