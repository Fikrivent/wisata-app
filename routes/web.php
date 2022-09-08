<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanTiketController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ajaxLoadJadwalWisata/{id}/{tgl_kunjungan}', [HomeController::class, 'loadSelectBox'])->name('home');
Route::post('/ajaxLoadCekTiket', [PesanTiketController::class, 'cekTiket'])->name('cekTiket');

Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.dashboard');
Route::get('/wisata/detail/{id}', [WisataController::class, 'detail']);

Route::get('/pesantiket', [PesanTiketController::class, 'index'])->name('pesantiket.form');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
