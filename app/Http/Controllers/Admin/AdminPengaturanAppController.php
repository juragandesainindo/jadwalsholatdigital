<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IqomahTime;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminPengaturanAppController extends Controller
{
    public function index()
    {
        $iqomah = IqomahTime::latest()->get(['sholat', 'duration']);
        $display = Setting::latest()->first();
        // dd($display->toArray());
        return view('admin.pengaturan.pengaturanApp.index', compact('iqomah'));
    }
}