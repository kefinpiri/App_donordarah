<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Donor\DashboardController;
use App\Http\Controllers\Donor\DonorDarahController;

Route::middleware(['auth', 'role:donor'])
    ->prefix('donor')
    ->name('donor.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/jadwal',  [DonorDarahController::class, 'create'])->name('jadwal');

        Route::post('/jadwal',  [DonorDarahController::class, 'store'])->name('jadwal.store');
        Route::get('/riwayat', [DonorDarahController::class, 'index'])->name('riwayat');
    });
