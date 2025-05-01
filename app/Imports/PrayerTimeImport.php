<?php

namespace App\Imports;

use App\Models\PrayerTime;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PrayerTimeImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd([
        //     'original' => $row,
        //     'converted' => [
        //         'date' => $this->convertExcelDate($row['tanggal']),
        //         'subuh' => $this->convertExcelTime($row['subuh']),
        //         'syuruq' => $this->convertExcelTime($row['syuruq']),
        //         'dzhuhur' => $this->convertExcelTime($row['dzhuhur']),
        //         'asar' => $this->convertExcelTime($row['asar']),
        //         'maghrib' => $this->convertExcelTime($row['maghrib']),
        //         'isya' => $this->convertExcelTime($row['isya']),
        //     ],
        // ]);
        // return new PrayerTime([
        //     'date' => $this->convertExcelDate($row['tanggal']),
        //     'subuh' => $this->convertExcelTime($row['subuh']),
        //     'syuruq' => $this->convertExcelTime($row['syuruq']),
        //     'dzhuhur' => $this->convertExcelTime($row['dzhuhur']),
        //     'asar' => $this->convertExcelTime($row['asar']),
        //     'maghrib' => $this->convertExcelTime($row['maghrib']),
        //     'isya' => $this->convertExcelTime($row['isya']),
        // ]);
        return PrayerTime::updateOrCreate(
            ['date' => $row['date']],
            [
                'subuh'    => $row['subuh'],
                'syuruq'    => $row['syuruq'],
                'dzhuhur' => $row['dzhuhur'],
                'asar'    => $row['asar'],
                'maghrib'  => $row['maghrib'],
                'isya'     => $row['isya'],
            ]
        );
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'subuh' => 'required|date_format:H:i:s',
            'syuruq' => 'required|date_format:H:i:s',
            'dzhuhur' => 'required|date_format:H:i:s',
            'asar' => 'required|date_format:H:i:s',
            'maghrib' => 'required|date_format:H:i:s',
            'isya' => 'required|date_format:H:i:s',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        // Handle failures if needed
    }

    // private function convertExcelDate($excelDate)
    // {
    //     return Carbon::instance(Date::excelToDateTimeObject($excelDate))->format('Y-m-d');
    // }
    // private function convertExcelTime($excelTime)
    // {
    //     $totalSeconds = round($excelTime * 86400);
    //     return gmdate("H:i:s", $totalSeconds);
    // }
}