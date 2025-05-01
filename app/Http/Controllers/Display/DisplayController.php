<?php

namespace App\Http\Controllers\Display;

use App\Helpers\HijriDate;
use App\Http\Controllers\Controller;
use App\Models\BlankTime;
use App\Models\IqomahTime;
use App\Models\IslamicHoliday;
use App\Models\PengaturanDetailMasjid;
use App\Models\PrayerTime;
use App\Models\RunningText;
use App\Models\Setting;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    protected $setting;
    protected $jadwal;
    protected $jadwalHariIni;
    protected $today;
    protected $detailMasjid;
    protected $hijriDate;
    protected $sliders;
    protected $interval;
    protected $runningText;
    protected $nextHoliday;
    protected $iqomah;
    protected $iqomahTime;
    protected $sholat;
    protected $blankTime;

    public function __construct()
    {
        $this->setting = Setting::get('display_mode', '6');
        $now = Carbon::now(); // Waktu sekarang
        $this->today = $now->toDateString(); // Format: YYYY-MM-DD
        $tomorrow = $now->copy()->addDay()->toDateString(); // Tanggal besok

        // Ambil jadwal hari ini dan besok
        $this->jadwalHariIni = PrayerTime::whereDate('date', $this->today)->first();
        $jadwalBesok = PrayerTime::whereDate('date', $tomorrow)->first();

        if ($now->format('H:i:s') === '23:59:59') {
            $this->jadwalHariIni = $jadwalBesok;
            $this->today = $tomorrow; // Tanggal pindah ke besok
        }

        // Jika tidak ada jadwal besok, tampilkan "Jadwal Kosong"
        $this->jadwal = $this->jadwalHariIni ? $this->jadwalHariIni->toArray() : [];

        $this->detailMasjid = PengaturanDetailMasjid::latest()->first();
        $this->hijriDate = HijriDate::getFullHijriDate($now->year, $now->month, $now->day);

        // dd($this->hijriDate);
        $this->sliders = Slider::orderBy('order', 'asc')
            ->where('status', 1)
            ->get();
        $slider = Slider::first();
        $this->interval = $slider ? $slider->interval : 1000; // Default 3 detik jika tidak ada data
        $this->runningText = RunningText::where('status', 1)->orderBy('order', 'asc')->get();
        $this->nextHoliday = IslamicHoliday::whereDate('date', '>=', $this->today)->orderBy('date', 'asc')->first();
        // dd($this->nextHoliday->toArray());
        $this->iqomah = IqomahTime::first();
        $this->blankTime = BlankTime::first();
    }

    public function index()
    {

        return view('display.jadwal' . $this->setting, [
            'setting' => $this->setting,
            'jadwal' => $this->jadwal,
            'tanggal' => $this->jadwalHariIni ? $this->today : "Jadwal Kosong",
            'detailMasjid' => $this->detailMasjid,
            'hijriDate' => $this->hijriDate,
            'sliders' => $this->sliders,
            'interval' => $this->interval,
            'runningText' => $this->runningText,
            'nextHoliday' => $this->nextHoliday,
        ]);
        // dd($displayMode);
    }

    public function iqomah($sholat)

    {
        $iqomahTime = IqomahTime::where('sholat', $sholat)->first();

        if (!$iqomahTime) {
            abort(404, 'Waktu Iqomah tidak ditemukan');
        }

        return view('display.iqomah' . $this->setting, [
            'jadwal' => $this->jadwal,
            'tanggal' => $this->jadwalHariIni ? $this->today : "Jadwal Kosong",
            'detailMasjid' => $this->detailMasjid,
            'hijriDate' => $this->hijriDate,
            'sliders' => $this->sliders,
            'interval' => $this->interval,
            'runningText' => $this->runningText,
            'nextHoliday' => $this->nextHoliday,
            'iqomah' => $this->iqomah,
            'iqomahTime' => $iqomahTime->duration * 60 // Konversi menit ke detik
        ]);
    }

    public function blank()
    {
        return view('display.blank', [
            'blankTime' => $this->blankTime->duration * 60,
        ]);
    }
}
