<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlankTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blank_times')->insert([
            [
                'duration' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

// php artisan make:seeder BlankTimeSeeder
// php artisan db:seed --class=BlankTimeSeeder