<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HijriDate;
use App\Http\Controllers\Controller;
use App\Models\IqomahTime;
use App\Models\IslamicHoliday;
use App\Models\PengaturanDetailMasjid;
use App\Models\PrayerTime;
use App\Models\RunningText;
use App\Models\Setting;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $displayMode = Setting::get('display_mode', '1'); // Default ke Display 1

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
        $jadwal = $jadwalHariIni ? $jadwalHariIni->toArray() : [];

        $detailMasjid = PengaturanDetailMasjid::latest()->first();

        $iqomah = IqomahTime::first();

        $nextHoliday = IslamicHoliday::whereDate('date', '>=', $today)->orderBy('date', 'asc')->first();

        $sliders = Slider::orderBy('order', 'asc')->get();
        // dd($sliders);
        $slider = Slider::first();
        $interval = $slider ? $slider->interval : 1000; // Default 3 detik jika tidak ada data

        $runningText = RunningText::where('status', 1)->orderBy('order', 'asc')->get();

        $hijriDate = HijriDate::convertToHijri($now->year, $now->month, $now->day);




        return view('display.jadwal' . $displayMode, [
            'jadwal' => $jadwal,
            'tanggal' => $jadwalHariIni ? $today : "Jadwal Kosong",
            'detailMasjid' => $detailMasjid,
            'iqomah' => $iqomah,
            'hijriDate' => $hijriDate,
            'nextHoliday' => $nextHoliday,
            'sliders' => $sliders,
            'interval' => $interval,
            'runningText' => $runningText,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'display_mode' => 'required|in:1,2',
        ]);

        Setting::set('display_mode', $request->display_mode);

        return redirect()->back()->with('success', 'Tampilan berhasil diubah!');
    }
}
