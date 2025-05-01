<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDetailLaporanController;
use App\Http\Controllers\Admin\AdminJadwalSholatController;
use App\Http\Controllers\Admin\AdminKategoriKeuanganController;
use App\Http\Controllers\Admin\AdminKegiatanMasjidController;
use App\Http\Controllers\Admin\AdminKeuanganMasjidController;
use App\Http\Controllers\Admin\AdminPengaturanAppController;
use App\Http\Controllers\Admin\AdminPengaturanDetailMasjidController;
use App\Http\Controllers\Admin\AdminPetugasJumatController;
use App\Http\Controllers\Admin\AdminRunningTextController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\IpAddressController;
use App\Http\Controllers\BlankController;
use App\Http\Controllers\Display\DisplayBlankController;
use App\Http\Controllers\Display\DisplayController;
use App\Http\Controllers\Display\DisplayIqomahController;
use App\Http\Controllers\IqomahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('kas', function () {
    return view('welcome');
});

// VIEW ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/jadwal-sholat', [AdminJadwalSholatController::class, 'index'])->name('admin.jadwal-sholat.index');
    Route::get('/jadwal-sholat/create', [AdminJadwalSholatController::class, 'create'])->name('admin.jadwal-sholat.create');
    Route::post('/jadwal-sholat', [AdminJadwalSholatController::class, 'uploadExcel'])->name('admin.jadwal-sholat.uploadExcel');
    Route::resource('/petugas-jumat', AdminPetugasJumatController::class);
    Route::delete('/petugas-jumat/delete-all', [AdminPetugasJumatController::class, 'deleteAll'])->name('admin.petugas-jumat.delete-all');
    Route::resource('/running-text', AdminRunningTextController::class);
    Route::resource('/kegiatan-masjid', AdminKegiatanMasjidController::class);
    Route::resource('/kategori-keuangan', AdminKategoriKeuanganController::class);
    Route::resource('/keuangan-masjid', AdminKeuanganMasjidController::class);
    Route::get('/detail-laporan', [AdminDetailLaporanController::class, 'index'])->name('admin.detail-laporan');
    Route::get('/pengaturan-detail-masjid', [AdminPengaturanDetailMasjidController::class, 'index'])->name('admin.pengaturan-detail-masjid.index');
    Route::get('/pengaturan-detail-masjid/{id}', [AdminPengaturanDetailMasjidController::class, 'edit'])->name('admin.pengaturan-detail-masjid.edit');
    Route::put('/pengaturan-detail-masjid/{id}', [AdminPengaturanDetailMasjidController::class, 'update'])->name('admin.pengaturan-detail-masjid.update');
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');
    Route::resource('/slider', AdminSliderController::class);
    Route::get('/pengaturan-app', [AdminPengaturanAppController::class, 'index'])->name('admin.pengaturan-app.index');
    Route::get('/pengaturan-app/{id}', [AdminPengaturanAppController::class, 'edit'])->name('admin.pengaturan-app.edit');
});

// VIEW DISPLAY
Route::get('/', [DisplayController::class, 'index']);
Route::get('/iqomah/{sholat}', [DisplayController::class, 'iqomah'])->name('iqomah');
Route::get('/blank', [DisplayController::class, 'blank']);

Route::get('/ipconfig', function () {
    // Dapatkan IP server
    $serverIp = request()->server('SERVER_ADDR') ?: gethostbyname(gethostname());

    // URL admin dengan IP server
    $adminUrl = "http://{$serverIp}:8000/admin";

    // Generate QR Code
    $qrCode = QrCode::size(300)->generate($adminUrl);

    return view('admin.ipconfig', [
        'ip' => $serverIp,
        'adminUrl' => $adminUrl,
        'qrCode' => $qrCode
    ]);
});
