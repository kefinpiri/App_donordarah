<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PendonorController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\PetugasControllr;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Spatie\Permission\Contracts\Permission;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/pendonor', [PendonorController::class, 'index'])->name('pendonor.index');
        Route::get('/pendonor/{id}', [PendonorController::class, 'show'])
            ->name('pendonor.show');
        Route::post('/pendonor/{id}/update-status', [PendonorController::class, 'updateStatus'])
            ->name('pendonor.updateStatus');
        Route::resource('petugas', PetugasController::class);
        Route::resource('pasien', PasienController::class)
            ->except(['create', 'store',]);
        Route::resource('roles', RoleController::class)
            ->except(['show']);
        Route::resource('permissions', PermissionController::class);
        Route::get('roles/{id}/permission', [RoleController::class, 'permission'])
            ->name('roles.permission');

        Route::post('roles/{id}/permission', [RoleController::class, 'permissionStore'])
            ->name('roles.permission.store');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('export.pdf');
        Route::get(
            '/laporan/export/excel',
            [LaporanController::class, 'exportExcel']
        )->name('export.excel');
    });
