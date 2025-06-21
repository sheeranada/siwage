<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\TalentaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\StatusNikahController;
use App\Http\Controllers\StatusWargaController;
use App\Http\Controllers\StatusKeluargaController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::controller(KelompokController::class)->group(function () {
        Route::get('kelompok', 'index')->name('kelompok.index');
        Route::post('kelompok', 'store')->name('kelompok.store');
        Route::put('kelompok/{kode_kelompok}', 'update')->name('kelompok.update');
        Route::delete('kelompok/{kode_kelompok}', 'destroy')->name('kelompok.delete');
    });
    Route::controller(PendidikanController::class)->group(function () {
        Route::get('pendidikan', 'index')->name('pendidikan.index');
        Route::post('pendidikan', 'store')->name('pendidikan.store');
        Route::put('pendidikan/{id}', 'update')->name('pendidikan.update');
        Route::delete('pendidikan/{id}', 'destroy')->name('pendidikan.delete');
    });
    Route::controller(PekerjaanController::class)->group(function () {
        Route::get('pekerjaan', 'index')->name('pekerjaan.index');
        Route::post('pekerjaan', 'store')->name('pekerjaan.store');
        Route::put('pekerjaan/{id}', 'update')->name('pekerjaan.update');
        Route::delete('pekerjaan/{id}', 'destroy')->name('pekerjaan.delete');
    });
    Route::controller(TalentaController::class)->group(function () {
        Route::get('talenta', 'index')->name('talenta.index');
        Route::post('talenta', 'store')->name('talenta.store');
        Route::put('talenta/{id}', 'update')->name('talenta.update');
        Route::delete('talenta/{id}', 'destroy')->name('talenta.delete');
    });
    Route::controller(StatusWargaController::class)->group(function () {
        Route::get('status_warga', 'index')->name('status_warga.index');
        Route::post('status_warga', 'store')->name('status_warga.store');
        Route::put('status_warga/{id}', 'update')->name('status_warga.update');
        Route::delete('status_warga/{id}', 'destroy')->name('status_warga.delete');
    });
    Route::controller(StatusNikahController::class)->group(function () {
        Route::get('status_nikah', 'index')->name('status_nikah.index');
        Route::post('status_nikah', 'store')->name('status_nikah.store');
        Route::put('status_nikah/{id}', 'update')->name('status_nikah.update');
        Route::delete('status_nikah/{id}', 'destroy')->name('status_nikah.delete');
    });
    Route::controller(StatusKeluargaController::class)->group(function () {
        Route::get('status_keluarga', 'index')->name('status_keluarga.index');
        Route::post('status_keluarga', 'store')->name('status_keluarga.store');
        Route::put('status_keluarga/{id}', 'update')->name('status_keluarga.update');
        Route::delete('status_keluarga/{id}', 'destroy')->name('status_keluarga.delete');
    });
    Route::controller(WargaController::class)->group(function () {
        Route::get('warga', 'index')->name('warga.index');
        Route::post('warga', 'store')->name('warga.store');
        Route::put('warga/{id}', 'update')->name('warga.update');
        Route::delete('warga/{id}', 'destroy')->name('warga.delete');
    });
    Route::controller(KeluargaController::class)->group(function () {
        Route::get('keluarga', 'index')->name('keluarga.index');
        Route::post('keluarga', 'store')->name('keluarga.store');
        Route::get('/keluarga/detail_warga/{kode}', 'detail')->name('keluarga.detail');
        Route::get('/keluarga/cetak_kk/{kode}', 'cetakKK')->name('keluarga.cetakKK');
    });
    // users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::put('users/profile', [UserController::class, 'updateSelf'])->name('users.updateSelf');
    Route::put('users/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::delete('/users/self-delete', [UserController::class, 'destroySelf'])->name('users.destroySelf');
    // filter pencarian
    Route::get('/warga/search', [WargaController::class, 'search'])->name('warga.search');
    Route::get('/keluarga/search', [KeluargaController::class, 'search'])->name('keluarga.search');
});
