<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriKeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_keuangans')->insert([
            [
                'kategori' => 'Kas Pembangunan Masjid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori' => 'Kas Infak Anak Yatim',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
