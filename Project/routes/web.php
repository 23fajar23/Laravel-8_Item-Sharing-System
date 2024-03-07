<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\pesanController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route User
Route::post('/cari',[transaksiController::class,'search']);
Route::post('/select',[transaksiController::class,'select']);
Route::resource('transaksi', transaksiController::class);
Route::post('/ubah', [transaksiController::class, 'ubah']);
Route::post('/update', [transaksiController::class, 'upd']);
Route::post('/minta', [transaksiController::class, 'minta']);
Route::post('/lapor', [transaksiController::class, 'lapor']);
Route::post('/profilUpdate', [transaksiController::class, 'profilUpdate']);
Route::post('/terimaPermintaan', [transaksiController::class, 'terimaPermintaan']);
Route::post('/tolakPermintaan', [transaksiController::class, 'tolakPermintaan']);
Route::post('/resi', [transaksiController::class, 'resi']);
Route::get('/posting', [transaksiController::class, 'posting'])->name('posting');
Route::get('/permintaan', [transaksiController::class, 'permintaan'])->name('permintaan');
Route::get('/riwayatBooking', [transaksiController::class, 'riwayatBooking'])->name('riwayatBooking');
Route::get('/pesan', [transaksiController::class, 'pesan'])->name('pesan');
Route::get('/profil', [transaksiController::class, 'profil'])->name('profil');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('pesanC', pesanController::class);

// Route Admin
Route::resource('admin', adminController::class);
Route::get('/laporan', [adminController::class, 'laporan'])->name('laporan');
Route::post('/searchAdmin', [adminController::class, 'search']);