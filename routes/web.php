<?php

use App\Http\Controllers\alternatifController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\perhitunganController;
use App\Http\Controllers\rankingController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\votingController;
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

Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/daftar-akun', [loginController::class, 'store']);
Route::get('/daftar', [loginController::class, 'registerIndex']);
Route::post('/logout', [loginController::class, 'destroy']);


Route::get('/home', [homeController::class, 'index'])->middleware('auth');

Route::get('/alternatif', [alternatifController::class, 'index'])->middleware('auth');
Route::post('/tambah-alternatif',  [alternatifController::class, 'store'])->middleware('auth');
Route::put('/edit-alternatif/{id}', [alternatifController::class, 'update'])->middleware('auth');
Route::delete('/hapus=alternatif/{id}', [alternatifController::class, 'destroy'])->middleware('auth');

Route::get('/voting', [votingController::class, 'index'])->middleware('auth');
Route::post('/simpan-voting', [votingController::class, 'store'])->middleware('auth');

Route::get('/perhitungan', [perhitunganController::class, 'index'])->middleware('auth');
Route::post('/proses-aktual', [perhitunganController::class, 'store'])->middleware('auth');
Route::delete('/hapus-perhitungan', [perhitunganController::class, 'destroy']);


Route::get('/normalisasi',  [perhitunganController::class, 'normalisasiIndex'])->middleware('auth');
Route::post('/proses-pembagi', [perhitunganController::class, 'pembagiProses'])->middleware('auth');

Route::get('/normalisasi-terbobot',  [perhitunganController::class, 'normalbobotIndex'])->middleware('auth');

Route::delete('/voting-clear', [votingController::class, 'clear'])->middleware('auth');
Route::put('/voting-edit/{id}', [votingController::class, 'update'])->middleware('auth');
Route::delete('/voting-hapus/{id}', [votingController::class, 'destroy'])->middleware('auth');

Route::get('/ranking', [rankingController::class, 'index'])->middleware('auth');

Route::get('/getRank', [perhitunganController::class, 'getRankData'])->middleware('auth');

Route::get('/laporan', [laporanController::class, 'index'])->middleware('auth' , 'role:admin');

Route::put('/edit-user/{id}', [loginController::class, 'update'])->middleware('auth', 'role:admin');

Route::get('/siswa',[siswaController::class, 'index'])->middleware('auth', 'role:admin');
Route::post('/tambah-siswa', [siswaController::class, 'store'])->middleware('auth', 'role:admin');
Route::put('edit-siswa/{id}', [siswaController::class, 'update'])->middleware('auth', 'role:admin');
Route::delete('/siswa-hapus/{id}', [siswaController::class, 'destroy'])->middleware('auth', 'role:admin');
