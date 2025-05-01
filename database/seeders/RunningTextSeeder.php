<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RunningTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('running_texts')->insert([
            [
                'title' => 'Selamat Datang di Masjid Agung Nurul Falah',
                'status' => '1',
                'order' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Barangsiapa membangun masjid karena Allah, maka Allah bangunkan baginya rumah di surga. (HR.',
                'status' => '1',
                'order' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sholat tepat waktu adalah kunci sukses dunia & akhirat',
                'status' => '1',
                'order' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bersabarlah, Allah bersama orang-orang yang sabar. (QS. Al-Baqarah: 153)',
                'status' => '1',
                'order' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


// php artisan make:seeder RunningTextSeeder
// php artisan db:seed --class=RunningTextSeeder