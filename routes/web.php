<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestrictedController;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('index');
Route::get('/access_denied', [RestrictedController::class, 'accessDenied'])->name('restricted');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    // Route::middleware(['admin'])->group(function () {
    Route::resource('users',  App\Http\Controllers\UserController::class);

    Route::resource('admin/jenjang', App\Http\Controllers\Admin\JenjangController::class);
    Route::resource('admin/jurusan', App\Http\Controllers\Admin\JurusanController::class)->names('admin.jurusans');
    Route::get('admin/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
    Route::resource('admin/fakultas', App\Http\Controllers\Admin\FakultasController::class, [
        'parameters' => [
        'fakultas' => 'fakultas',
    ],])->names('admin.fakultas');

    Route::resource('admin/kelas', App\Http\Controllers\Admin\KelasController::class, [
        'parameters' => [
        'kelas' => 'kelas',
    ],])->names('admin.kelas');
    //


    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/daftar', [App\Http\Controllers\DaftarController::class, 'index'])->name('daftar.index');
    Route::get('/daftar/form', [App\Http\Controllers\DaftarController::class, 'form'])->name('daftar.form');
    Route::get('/daftar/{id}/edit', [App\Http\Controllers\DaftarController::class, 'edit'])->name('daftar.edit');
    Route::post('/daftar', [App\Http\Controllers\DaftarController::class, 'store'])->name('daftar.store');
    Route::get('/daftar/get-jenjang', [App\Http\Controllers\DaftarController::class, 'getJenjang'])->name('daftar.getJenjang');
    Route::get('/daftar/get-jurusan-by-jenjang', [App\Http\Controllers\DaftarController::class, 'getJurusanByJenjang'])->name('daftar.getJurusanByJenjang');
});

require __DIR__ . '/auth.php';
