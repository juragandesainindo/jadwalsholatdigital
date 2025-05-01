<?php

namespace App\Helpers;

class HijriDate
{
    public static function convertToHijri($year, $month, $day)
    {
        $jd = gregoriantojd($month, $day, $year);
        $islamic = self::jdToIslamic($jd);
        $dayOfWeek = self::getHijriDayOfWeek($jd);

        return sprintf(
            "%s, %d %s %d",
            $dayOfWeek,
            $islamic[2],
            self::getHijriMonthName($islamic[1]),
            $islamic[0]
        );
    }

    private static function jdToIslamic($jd)
    {
        $jd = $jd - 1948440 + 10632;
        $n = (int)(($jd - 1) / 10631);
        $jd = $jd - 10631 * $n + 354;
        $j = ((int)((10985 - $jd) / 5316)) * ((int)((50 * $jd) / 17719)) + ((int)($jd / 5670)) * ((int)((43 * $jd) / 15238));
        $jd = $jd - ((int)((30 - $j) / 15)) * ((int)((17719 * $j) / 50)) - ((int)($j / 16)) * ((int)((15238 * $j) / 43)) + 29;
        $m = (int)((24 * $jd) / 709);
        $d = $jd - (int)((709 * $m) / 24);
        $y = 30 * $n + $j - 30;
        return [$y, $m, $d];
    }

    private static function getHijriDayOfWeek($jd)
    {
        $days = [
            'Ahad',
            'Itsnain',
            'Tsulaatsa',
            'Arbi"a',
            'Khamis',
            'Jumu"ah',
            'Sabt'
        ];

        // Hari dalam Julian Date dimulai dari Senin (0) sampai Minggu (6)
        // Kita sesuaikan agar Ahad (0) sampai Sabtu (6)
        $dayNumber = ($jd + 1) % 7;

        return $days[$dayNumber] ?? 'Unknown';
    }

    private static function getHijriMonthName($month)
    {
        $months = [
            1 => "Muharram",
            2 => "Safar",
            3 => "Rabi' al-Awwal",
            4 => "Rabi' al-Thani",
            5 => "Jumada al-Awwal",
            6 => "Jumada al-Thani",
            7 => "Rajab",
            8 => "Sha'ban",
            9 => "Ramadhan",
            10 => "Syawal",
            11 => "Dhul-Qa'dah",
            12 => "Dhul-Hijjah"
        ];
        return $months[$month] ?? "Unknown";
    }

    // Fungsi tambahan untuk mendapatkan info tanggal lengkap
    public static function getFullHijriDate($year, $month, $day)
    {
        $jd = gregoriantojd($month, $day, $year);
        $islamic = self::jdToIslamic($jd);
        $dayOfWeek = self::getHijriDayOfWeek($jd);

        return [
            'day_of_week' => $dayOfWeek,
            'day' => $islamic[2],
            'month' => $islamic[1],
            'month_name' => self::getHijriMonthName($islamic[1]),
            'year' => $islamic[0],
            'full_date' => sprintf("%s, %d %s %d", $dayOfWeek, $islamic[2], self::getHijriMonthName($islamic[1]), $islamic[0])
        ];
    }
}
