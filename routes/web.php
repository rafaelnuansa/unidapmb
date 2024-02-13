<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Landing\HomeController::class, 'index'])->name('landing.home.index');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login.store');


Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Route::get('/access_denied', [RestrictedController::class, 'accessDenied'])->name('restricted');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Route::middleware(['admin'])->group(function () {



    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/daftar', [App\Http\Controllers\DaftarController::class, 'index'])->name('daftar.index');
    Route::get('/daftar/create', [App\Http\Controllers\DaftarController::class, 'form'])->name('daftar.form');
    Route::get('/daftar/{id}/edit', [App\Http\Controllers\DaftarController::class, 'edit'])->name('daftar.edit');
    Route::post('/daftar', [App\Http\Controllers\DaftarController::class, 'store'])->name('daftar.store');
    Route::get('/daftar/get-jenjang', [App\Http\Controllers\DaftarController::class, 'getJenjang'])->name('daftar.getJenjang');
    Route::get('/daftar/get-jurusan-by-jenjang', [App\Http\Controllers\DaftarController::class, 'getJurusanByJenjang'])->name('daftar.getJurusanByJenjang');

    Route::get('pembayaran/{encryptRegistNumber}', [App\Http\Controllers\PembayaranController::class, 'pembayaran'])->name('pembayaran.pembayaran');


    Route::get('formulir/{encryptRegistNumber}', [App\Http\Controllers\FormulirController::class, 'index'])->name('formulir.index');
    Route::post('formulir/{encryptRegistNumber}', [App\Http\Controllers\FormulirController::class, 'biodata_store'])->name('formulir.biodata.store');

    Route::get('formulir/{encryptRegistNumber}/alamat', [App\Http\Controllers\FormulirController::class, 'alamat'])->name('formulir.alamat');
    Route::post('formulir/{encryptRegistNumber}/alamat', [App\Http\Controllers\FormulirController::class, 'alamat_store'])->name('formulir.alamat.store');

    Route::get('formulir/{encryptRegistNumber}/kerja', [App\Http\Controllers\FormulirController::class, 'kerja'])->name('formulir.kerja');
    Route::post('formulir/{encryptRegistNumber}/kerja', [App\Http\Controllers\FormulirController::class, 'kerja_store'])->name('formulir.kerja.store');

    Route::get('formulir/{encryptRegistNumber}/ayah', [App\Http\Controllers\FormulirController::class, 'ayah'])->name('formulir.ayah');
    Route::post('formulir/{encryptRegistNumber}/ayah', [App\Http\Controllers\FormulirController::class, 'ayah_store'])->name('formulir.ayah.store');

    Route::get('formulir/{encryptRegistNumber}/ibu', [App\Http\Controllers\FormulirController::class, 'ibu'])->name('formulir.ibu');
    Route::post('formulir/{encryptRegistNumber}/ibu', [App\Http\Controllers\FormulirController::class, 'ibu_store'])->name('formulir.ibu.store');

    Route::get('formulir/{encryptRegistNumber}/wali', [App\Http\Controllers\FormulirController::class, 'wali'])->name('formulir.wali');
    Route::post('formulir/{encryptRegistNumber}/wali', [App\Http\Controllers\FormulirController::class, 'wali_store'])->name('formulir.wali.store');

    Route::get('formulir/{encryptRegistNumber}/lampiran', [App\Http\Controllers\FormulirController::class, 'lampiran'])->name('formulir.lampiran');
    Route::post('formulir/{encryptRegistNumber}/lampiran', [App\Http\Controllers\FormulirController::class, 'lampiran_store'])->name('formulir.lampiran.store');
});



// require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
