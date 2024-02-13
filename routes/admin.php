<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestrictedController;
use Illuminate\Support\Facades\Route;
Route::middleware('admin')->group(function () {

    Route::resource('admin/users',  App\Http\Controllers\UserController::class);

    Route::resource('admin/jenjang', App\Http\Controllers\Admin\JenjangController::class);
    Route::resource('admin/jurusan', App\Http\Controllers\Admin\JurusanController::class)->names('admin.jurusans');
    Route::get('admin/dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('admin.dashboard');
    Route::resource('admin/daftar', App\Http\Controllers\Admin\DaftarController::class)->names('admin.daftar');
    Route::resource('admin/fakultas', App\Http\Controllers\Admin\FakultasController::class, [
        'parameters' => [
        'fakultas' => 'fakultas',
    ],])->names('admin.fakultas');

    Route::resource('admin/kelas', App\Http\Controllers\Admin\KelasController::class, [
        'parameters' => [
        'kelas' => 'kelas',
    ],])->names('admin.kelas');
    //


});
