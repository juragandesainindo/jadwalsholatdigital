<?php

namespace App\Http\Controllers;

use App\Helpers\HijriDate;
use App\Models\IqomahTime;
use App\Models\IslamicHoliday;
use App\Models\PrayerTime;
use App\Models\RunningText;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrayerTimeController extends Controller
{
    public function index()
    {
        $now = Carbon::now(); // Waktu sekarang
        $today = $now->toDateString(); // Format: YYYY-MM-DD
        $tomorrow = $now->copy()->addDay()->toDateString(); // Tanggal besok

        // Ambil jadwal hari ini dan besok
        $jadwalHariIni = PrayerTime::whereDate('date', $today)->first();
        $jadwalBesok = PrayerTime::whereDate('date', $tomorrow)->first();
        $iqomah = IqomahTime::first();
        $nextHoliday = IslamicHoliday::whereDate('date', '>=', $today)->orderBy('date', 'asc')->first();
        $sliders = Slider::orderBy('order', 'asc')->get();
        // dd($sliders);
        $slider = Slider::first();
        $interval = $slider ? $slider->interval : 3000; // Default 3 detik jika tidak ada data
        $runningText = RunningText::where('status', 1)->orderBy('order', 'asc')->get();
        $hijriDate = HijriDate::convertToHijri($now->year, $now->month, $now->day);

        if ($now->format('H:i:s') === '23:59:59') {
            $jadwalHariIni = $jadwalBesok;
            $today = $tomorrow; // Tanggal pindah ke besok
        }

        // Jika tidak ada jadwal besok, tampilkan "Jadwal Kosong"
        $jadwal = $jadwalHariIni ? $jadwalHariIni->toArray() : [];

        return view('display.prayerTime', [
            'jadwal' => $jadwal,
            'tanggal' => $jadwalHariIni ? $today : "Jadwal Kosong",
            'iqomah' => $iqomah,
            'hijriDate' => $hijriDate,
            'nextHoliday' => $nextHoliday,
            'sliders' => $sliders,
            'interval' => $interval,
            'runningText' => $runningText,

        ]);
    }
}
