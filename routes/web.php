<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\StatusKeluargaController;
use App\Http\Controllers\StatusNikahController;
use App\Http\Controllers\StatusWargaController;
use App\Http\Controllers\TalentaController;
use App\Http\Controllers\WargaController;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Route::controller(UserController::class)->group(function () {
    //     Route::get('/user/{id}', 'show')->name('user.show');
    //     Route::post('/user', 'store')->name('user.store');
    //     Route::put('/user/{$user}', 'update')->name('user.update');
    //     Route::post('/user/{$user}', 'delete')->name('user.delete');
    // });
    Route::resource('pekerjaan', PekerjaanController::class)->except(['edit', 'show', 'create']);
    Route::resource('pendidikan', PendidikanController::class)->except(['edit', 'show', 'create']);
    Route::resource('talenta', TalentaController::class)->except(['edit', 'show', 'create']);
    Route::resource('kelompok', KelompokController::class)->except(['edit', 'show', 'create']);
    Route::resource('status_warga', StatusWargaController::class)->except(['edit', 'show', 'create']);
    Route::resource('status_keluarga', StatusKeluargaController::class)->except(['edit', 'show', 'create']);
    Route::resource('status_nikah', StatusNikahController::class)->except(['edit', 'show', 'create']);
    Route::resource('keluarga', KeluargaController::class)->except(['edit', 'show', 'create']);
    // Route::resource('warga', WargaController::class)->except(['edit', 'show', 'create']);
    Route::controller(WargaController::class)->group(function () {
        Route::get('/warga/cetak_warga', 'cetakWarga')->name('cetak.warga');
        Route::get('/warga', 'index')->name('warga.index');
        Route::post('/warga', 'store')->name('warga.store');
        Route::put('/warga/{id}', 'update')->name('warga.update');
        Route::delete('/warga/{id}', 'destroy')->name('warga.destroy');
    });
    Route::controller(AkunController::class)->group(function () {
        Route::get('/akun/{id}', 'show')->name('akun.show');
        Route::post('/akun', 'register')->name('akun.register');
        Route::put('/akun/{id}', 'update')->name('akun.update');
    });
});
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
