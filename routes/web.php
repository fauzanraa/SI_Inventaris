<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\UrusanRumahTanggaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('registrasi');
Route::post('/simpanRegistrasi', [RegisterController::class, 'simpanRegistrasi'])->name('simpanRegistrasi');

Route::group(['prefix' => 'password'], function () {
Route::get('/lupa', [UbahPasswordController::class, 'index'])->name('lupaPassword');
Route::post('/requestUbahPass', [UbahPasswordController::class, 'requestUbahPassword'])->name('requestUbahPassword');
Route::put('/{id}', [UbahPasswordController::class, 'simpanPassword'])->name('simpanUbahPassword');
});

Route::group(['prefix' => 'mahasiswa', 'middleware' => ['auth', 'cekposisi:3']], function () {
    Route::get('/', [MahasiswaController::class, 'index'])->name('indexMahasiswa');
    Route::get('/cekRuangan', [MahasiswaController::class, 'cekRuangan'])->name('cekRuanganMhs');
    Route::get('/pencarianNama', [MahasiswaController::class, 'pencarianNama'])->name('cariRuanganByNamaMhs');
    Route::get('/pencarianTanggal', [MahasiswaController::class, 'pencarianTanggal'])->name('cariRuanganByTglMhs');
    Route::get('/pengajuan', [MahasiswaController::class, 'pengajuan'])->name('pengajuanMhs');
    Route::post('/pengajuan', [MahasiswaController::class, 'filterRuangan'])->name('filterTanggal');
    Route::post('/simpanPengajuan', [MahasiswaController::class, 'simpanPengajuan'])->name('simpanPengajuanMhs');
    Route::get('/tandaTerima', [MahasiswaController::class, 'tandaTerima'])->name('tandaTerimaMhs');
    Route::get('/{id}/buktiPeminjaman', [MahasiswaController::class, 'bukti']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'cekposisi:1']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('indexAdmin');
    Route::get('/cekPengajuan', [AdminController::class, 'cekPengajuan'])->name('cekPengajuanAdmin');
    Route::get('/cekPengajuan/{id}/detail', [AdminController::class, 'detailPengajuan'])->name('detailPengajuanAdmin');    
    Route::get('/dokumen/{filename}', [AdminController::class, 'cekDokumen'])->name('cekDokumenAdmin');    
    Route::get('/cekPengajuan/{id}/konfirmasi', [AdminController::class, 'konfirmasiPengajuan'])->name('konfirmasiAdmin');    
    Route::put('/cekPengajuan/{id}', [AdminController::class, 'simpanKonfirmasi'])->name('simpanKonfirmasiAdmin');    
    Route::get('/ruangan', [AdminController::class, 'listRuangan'])->name('listRuanganAdmin');
    Route::get('/tambahRuangan', [AdminController::class, 'tambahRuangan'])->name('tambahRuanganAdmin');
    Route::post('/ruangan', [AdminController::class, 'simpanRuangan'])->name('simpanRuanganAdmin');
    Route::delete('/ruangan/{id}', [AdminController::class, 'hapus'])->name('hapusRuanganAdmin');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporanAdmin');
});

Route::group(['prefix' => 'urt', 'middleware' => ['auth', 'cekposisi:2']], function () {
    Route::get('/', [UrusanRumahTanggaController::class, 'index'])->name('indexUrt');
    Route::get('/cekPengajuan', [UrusanRumahTanggaController::class, 'cekPengajuan'])->name('cekPengajuanUrt');
    Route::get('/cekPengajuan/{id}/detail', [UrusanRumahTanggaController::class, 'detailPengajuan'])->name('detailPengajuanUrt');    
    Route::get('/dokumen/{filename}', [UrusanRumahTanggaController::class, 'cekDokumen'])->name('cekDokumenUrt');    
    Route::get('/cekPengajuan/{id}/konfirmasi', [UrusanRumahTanggaController::class, 'konfirmasiPengajuan'])->name('konfirmasiUrt');    
    Route::put('/cekPengajuan/{id}', [UrusanRumahTanggaController::class, 'simpanKonfirmasi'])->name('simpanKonfirmasiUrt');    
    Route::get('/laporan', [UrusanRumahTanggaController::class, 'laporan'])->name('laporanUrt');
});




