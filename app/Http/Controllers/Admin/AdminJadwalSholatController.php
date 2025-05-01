<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PrayerTimeImport;
use App\Models\PrayerTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AdminJadwalSholatController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = PrayerTime::query();
        //     return DataTables::of(PrayerTime::query())
        //         ->addIndexColumn()
        //         ->editColumn('date', function ($row) {
        //             return $row->date->format('Y-m-d');
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);


        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->editColumn('date', function ($row) {
        //             return $row->date->format('Y-m-d');
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }











        if ($request->ajax()) {
            $data = PrayerTime::query();

            // Filter berdasarkan tanggal spesifik
            if ($request->has('search_date') && !empty($request->search_date)) {
                $date = Carbon::createFromFormat('Y-m-d', $request->search_date);
                $data->whereDate('date', $date);
            }

            // Filter berdasarkan bulan
            if ($request->has('search_month') && !empty($request->search_month)) {
                $data->whereMonth('date', $request->search_month);
            }

            // Filter berdasarkan tahun
            if ($request->has('search_year') && !empty($request->search_year)) {
                $data->whereYear('date', $request->search_year);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('date', function ($row) {
                    return $row->date->format('Y-m-d');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Get distinct years for dropdown
        $years = PrayerTime::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'DESC')
            ->pluck('year');
        // dd($years);


        // $jadwals = Cache::remember('prayer_times', 60, function () {
        //     return PrayerTime::orderBy('date', 'desc')->paginate(20);
        // });
        // DB::enableQueryLog();
        // $jadwals = PrayerTime::orderByRaw('YEAR(date) ASC, MONTH(date) ASC')->get();
        // dd($jadwals->toArray());
        // dd(DB::enableQueryLog());
        // dd($jadwals->toArray());
        return view('admin.jadwalSholat.index', compact('years'));
    }
    public function create()
    {
        return view('admin.jadwalSholat.create');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new PrayerTimeImport, $file);

            Session::flash('success', 'Data jadwal shalat berhasil diimport!');
            return redirect()->route('admin.jadwal-sholat.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    // public function uploadExcel(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    //     ]);

    //     Excel::import(new PrayerTimeImport, $request->file('file'));

    //     return redirect()->route('admin/jadwal-sholat.index');
    // }
}
