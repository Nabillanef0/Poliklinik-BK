<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DaftarPeriksaController;
use App\Http\Controllers\DaftarPoliController;
use App\Http\Controllers\DetailPeriksaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalPeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
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

Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'doLogin'])->middleware('guest');

Route::get('registration', [AdminAuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AdminAuthController::class, 'postRegistration'])->name('register.post');
Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('layouts.wrapper', $data);
});

Route::get('/gen-pw', function () {
    $pw = bcrypt('admin');
    dd($pw);
});

Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'dashboard.index'
        ];
        return view('layouts.wrapper', $data);
    });
    Route::resource('/user', AdminUserController::class);
    Route::resource('poli', PoliController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('daftar_poli', DaftarPoliController::class);
    Route::post('daftar_poli/data_jadwal_periksa', [DaftarPoliController::class, 'dataJadwalPeriksa']);
    Route::resource('jadwal_periksa', JadwalPeriksaController::class);
});


