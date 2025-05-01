<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrayerTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prayer_times')->insert([
            [
                'date' => '2025-04-09',
                'subuh' => '04:15:39',
                'syuruq' => '06:15:39',
                'dzhuhur' => '12:15:39',
                'asar' => '16:15:39',
                'maghrib' => '18:30:39',
                'isya' => '19:40:39',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2025-04-10',
                'subuh' => '04:15:39',
                'syuruq' => '06:15:39',
                'dzhuhur' => '12:15:39',
                'asar' => '16:15:39',
                'maghrib' => '18:30:39',
                'isya' => '19:40:39',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2025-04-11',
                'subuh' => '04:15:39',
                'syuruq' => '06:15:39',
                'dzhuhur' => '12:15:39',
                'asar' => '16:15:39',
                'maghrib' => '18:30:39',
                'isya' => '19:40:39',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

// php artisan make:seeder PrayerTimeSeeder
// php artisan db:seed --class=PrayerTimeSeeder