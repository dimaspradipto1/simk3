<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanInsidenController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/loginproses', 'loginproses')->name('loginproses')->middleware('guest');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware('auth', 'checkrole')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('user', UserController::class)->except(['show']);
    Route::get('/user/{user}/update-password', [UserController::class, 'updatePasswordForm'])->name('user.updatePasswordForm');
    Route::put('/user/{user}/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    Route::resource('laporan-insiden', LaporanInsidenController::class);

    Route::resource('departemen', DepartemenController::class)->except(['show'])->parameters(['departemen' => 'departemen']);
    Route::resource('karyawan', KaryawanController::class)->except(['show']);
});