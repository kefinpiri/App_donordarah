<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\DashboardController;
use App\Http\Controllers\Petugas\StokDarahController;
use App\Http\Controllers\Petugas\PermintaanDarahController;
use App\Http\Controllers\Petugas\DistribusiDarahController;
use App\Http\Controllers\Petugas\DonorDarahController;
use App\Http\Controllers\Petugas\LaporanController;


Route::prefix('petugas')
    ->name('petugas.')
    ->middleware(['role:petugas'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/stok-darah',   StokDarahController::class);
        Route::resource('/permintaan-darah', PermintaanDarahController::class)->only(['index', 'edit',   'update']);
        Route::resource('/distribusi-darah', DistribusiDarahController::class);
        Route::resource('/donor-darah', DonorDarahController::class)->only(['index', 'edit', 'update']);
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('export.pdf');
        Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('export.excel');
    });
