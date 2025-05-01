<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Dapatkan IP server
        $serverIp = request()->server('SERVER_ADDR') ?: gethostbyname(gethostname());

        // URL admin dengan IP server
        $adminUrl = "http://{$serverIp}:8000/admin";

        // Generate QR Code
        $qrCode = QrCode::size(300)->generate($adminUrl);
        return view('admin.dashboard.index', [
            'ip' => $serverIp,
            'adminUrl' => $adminUrl,
            'qrCode' => $qrCode
        ]);
    }
}
