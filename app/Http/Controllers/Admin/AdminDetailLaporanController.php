<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKeuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDetailLaporanController extends Controller
{
    public function index()
    {
        $hariIni = Carbon::now();

        // Ambil 7 hari terakhir
        $tujuhHariLalu = $hariIni->copy()->subDays(7);
        // 🔹 Ambil bulan sebelumnya
        $bulanLalu = $hariIni->copy()->subMonth()->format('m'); // Contoh: Sekarang Maret, maka ambil Februari
        $tahunSekarang = $hariIni->format('Y'); // Tahun saat ini



        $kategoriKeuangan = KategoriKeuangan::with([
            'keuanganBulanLalu' => function ($query) use ($bulanLalu, $tahunSekarang) {
                $query->whereMonth('tanggal', $bulanLalu)
                    ->whereYear('tanggal', $tahunSekarang);
            },
            'keuanganTujuhHari' => function ($query) use ($tujuhHariLalu, $hariIni) {
                $query->whereBetween('tanggal', [$tujuhHariLalu->format('Y-m-d'), $hariIni->format('Y-m-d')]);
            },
            'keuanganMasjid' // Mengambil semua data tanpa filter
        ])->get();


        // 🔹 Array untuk laporan final
        $laporanFinal = [];

        foreach ($kategoriKeuangan as $kategori) {
            $laporanFinal[] = [
                'kategori' => $kategori->kategori,
                'laporan_7_hari' => [
                    'totalMasuk' => $kategori->keuanganTujuhHari->where('jenis', 'Masuk')->sum('nominal'),
                    'totalKeluar' => $kategori->keuanganTujuhHari->where('jenis', 'Keluar')->sum('nominal'),
                    'saldoAkhir' => $kategori->keuanganTujuhHari->where('jenis', 'Masuk')->sum('nominal')
                        - $kategori->keuanganTujuhHari->where('jenis', 'Keluar')->sum('nominal'),
                    'data' => $kategori->keuanganTujuhHari
                ],
                'laporan_bulanan' => [
                    'totalMasuk' => $kategori->keuanganBulanLalu->where('jenis', 'Masuk')->sum('nominal'),
                    'totalKeluar' => $kategori->keuanganBulanLalu->where('jenis', 'Keluar')->sum('nominal'),
                    'saldoAkhir' => $kategori->keuanganBulanLalu->where('jenis', 'Masuk')->sum('nominal')
                        - $kategori->keuanganBulanLalu->where('jenis', 'Keluar')->sum('nominal'),
                    'data' => $kategori->keuanganBulanLalu
                ],
                'laporan_all' => [
                    'totalMasuk' => $kategori->keuanganMasjid->where('jenis', 'Masuk')->sum('nominal'),
                    'totalKeluar' => $kategori->keuanganMasjid->where('jenis', 'Keluar')->sum('nominal'),
                    'saldoAkhir' => $kategori->keuanganMasjid->where('jenis', 'Masuk')->sum('nominal')
                        - $kategori->keuanganMasjid->where('jenis', 'Keluar')->sum('nominal'),
                    'data' => $kategori->keuanganMasjid
                ],
            ];
        }


        return view('admin.laporanKeuangan.detailLaporan.index', compact('laporanFinal'));
    }
}
