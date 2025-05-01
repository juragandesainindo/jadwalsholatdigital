<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IslamicHolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('islamic_holidays')->insert([
            [
                'name' => 'Idul Fitri',
                'date' => '2025-03-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Idul Adha',
                'date' => '2025-06-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Isra Miraj',
                'date' => '2025-07-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

// php artisan make:seeder IslamicHolidaySeeder
// php artisan db:seed --class=IslamicHolidaySeeder