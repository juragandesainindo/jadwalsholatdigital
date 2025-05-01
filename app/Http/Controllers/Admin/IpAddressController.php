<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IpAddressController extends Controller
{

    public function getRealIp(Request $request)
    {
        $ipv4 = $this->getClientRealIpv4($request);

        return response()->json([
            'success' => true,
            'ipv4_address' => $ipv4,
            'ip_info' => [
                'x_forwarded_for' => $request->header('X-Forwarded-For'),
                'x_real_ip' => $request->header('X-Real-IP'),
                'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? null,
                'server_addr' => $_SERVER['SERVER_ADDR'] ?? null,
                'all_headers' => $request->headers->all()
            ],
            'message' => 'IPv4 address retrieved successfully'
        ]);
    }

    /**
     * Method khusus untuk mendapatkan IPv4 address
     */
    private function getClientRealIpv4(Request $request)
    {
        $ip = null;

        // Urutan prioritas header untuk cek IP
        $headersToCheck = [
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_REAL_IP',
            'HTTP_CLIENT_IP',
            'REMOTE_ADDR'
        ];

        foreach ($headersToCheck as $header) {
            if ($request->server->has($header)) {
                $ips = explode(',', $request->server->get($header));
                foreach ($ips as $ipCandidate) {
                    $ipCandidate = trim($ipCandidate);
                    if ($this->isValidIpv4($ipCandidate)) {
                        $ip = $ipCandidate;
                        break 2; // Keluar dari kedua loop
                    }
                }
            }
        }

        return $ip ?? 'IP tidak terdeteksi';
    }

    /**
     * Validasi khusus IPv4
     */
    private function isValidIpv4($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }

    /**
     * Tampilan halaman informasi IP
     */
    public function showIpInfo()
    {
        $ipv4 = $this->getClientRealIpv4(request());

        return view('admin.ip-info', [
            'ipv4' => $ipv4,
            'isLocal' => $this->isLocalIp($ipv4)
        ]);
    }

    /**
     * Cek apakah IP termasuk lokal
     */
    private function isLocalIp($ip)
    {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false;
    }
}
