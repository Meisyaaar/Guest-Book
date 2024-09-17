<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LaporanKurirController;
use App\Http\Controllers\LaporanTamuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::get('/admin/dashboard', [HomeController::class,'index'])->middleware(['auth' , 'admin'])->name('index');
// Route::get('/pegawai', [PegawaiController::class,'pegawai'])->name('pegawai');

Route::middleware(['auth', 'admin:ADM'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/pegawai', [PegawaiController::class, 'pegawai'])->name('pegawai');
    Route::post('/store/pegawai', [PegawaiController::class, 'storePegawai'])->name('store.pegawai');
    Route::get('/edit/pegawai', [PegawaiController::class, 'editPegawai'])->name('edit.pegawai');
    Route::post('/update/pegawai', [PegawaiController::class, 'updatePegawai'])->name('update.pegawai');
    Route::post('/importExcelPost', [PegawaiController::class, 'importExcelPost'])->name('importExcelPost');

    Route::get('/kunjungan', [KunjunganController::class, 'kunjungan'])->name('kunjungan');
    Route::get('/LaporanTamu', [LaporanTamuController::class, 'LaporanTamu'])->name('LaporanTamu');
    Route::get('/LaporanKurir', [LaporanKurirController::class, 'LaporanKurir'])->name('LaporanKurir');

});
Route::get('/delete/pegawai/{NIP}', [PegawaiController::class, 'deletePegawai'])->name('delete.pegawai');
Route::get('/filter/pegawai', [PegawaiController::class, 'filter'])->name('filter.pegawai');
// Route::get('/importExcel', [PegawaiController::class, 'importExcel'])->name('import.excel');


Route::middleware(['auth', 'admin:FO'])->group(function () {
    Route::get('/FO/dashboard', [HomeController::class, 'FO'])->name('fo.dashboard');


});

Route::middleware(['auth', 'admin:PEG'])->group(function () {
    Route::get('/pegawai/dashboard', [HomeController::class, 'pegawai'])->name('pegawai.dashboard');
    Route::get('/pegawai/laporan-tamu', [HomeController::class, 'Laporantamu'])->name('pegawai.Laporan_tamu');
    Route::get('/pegawai/laporan-kurir', [HomeController::class, 'Laporankurir'])->name('pegawai.Laporan_kurir');
    Route::get('/pegawai/kunjungan', [HomeController::class, 'kunjungan'])->name('pegawai.kunjungan');

});

Route::get('/user/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/form_tamu', [HomeController::class, 'formTamu'])->name('formTamu');
Route::post('user/add_form_tamu', [HomeController::class, 'add_tamu'])->name('add_tamu');
Route::get('/user/form_kurir', [HomeController::class, 'formKurir'])->name('formKurir');
Route::post('/user/add_form_kurir', [HomeController::class, 'add_kurir'])->name('add_kurir');
Route::get('/user/pegawai', [HomeController::class, 'user_pegawai'])->name('user_pegawai');
Route::get('/user/about_us', [HomeController::class, 'about_us'])->name('about_us');








