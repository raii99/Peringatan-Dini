<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    
    // Other routes...
    Route::get('/transkrip', [DashboardController::class, 'transkrip'])->name('transkrip');
    Route::get('/krs', [DashboardController::class, 'krs'])->name('krs');
    Route::get('/jadwal', [DashboardController::class, 'jadwal'])->name('jadwal');
    Route::get('/matakuliah', [DashboardController::class, 'matakuliah'])->name('matakuliah');
    Route::get('/dosen', [DashboardController::class, 'dosen'])->name('dosen');
    Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');
    Route::get('/statistik', [DashboardController::class, 'statistik'])->name('statistik');
    Route::get('/export', [DashboardController::class, 'export'])->name('export');
});