<?php

namespace App\Services;

use App\Models\PrayerTime;
use Carbon\Carbon;

class DisplayService
{
    public function getJadwal()
    {
        $now = Carbon::now(); // Waktu sekarang
        $today = $now->toDateString(); // Format: YYYY-MM-DD
        $tomorrow = $now->copy()->addDay()->toDateString(); // Tanggal besok

        // Ambil jadwal hari ini dan besok
        $jadwalHariIni = PrayerTime::whereDate('date', $today)->first();
        $jadwalBesok = PrayerTime::whereDate('date', $tomorrow)->first();

        if ($now->format('H:i:s') === '23:59:59') {
            $jadwalHariIni = $jadwalBesok;
            $today = $tomorrow; // Tanggal pindah ke besok
        }

        // Jika tidak ada jadwal besok, tampilkan "Jadwal Kosong"
        $jadwalHariIni ? $jadwalHariIni->toArray() : [];
    }
}
