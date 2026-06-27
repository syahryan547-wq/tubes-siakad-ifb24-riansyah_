<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

    Route::resource('dosen', DosenController::class)->except(['show']);
    Route::resource('mahasiswa', MahasiswaController::class)->except(['show']);
    Route::resource('matakuliah', MatakuliahController::class)->except(['show']);

    Route::get('/jadwal', [JadwalController::class, 'adminIndex'])->name('jadwal.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    Route::get('/krs', [KrsController::class, 'adminIndex'])->name('krs.index');
});

// Mahasiswa Routes
Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'mahasiswa'])->name('dashboard');

    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

    Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
    Route::get('/krs/tambah', [KrsController::class, 'create'])->name('krs.create');
    Route::post('/krs', [KrsController::class, 'store'])->name('krs.store');
    Route::delete('/krs/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
});

require __DIR__.'/auth.php';
