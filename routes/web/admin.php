<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PendonorController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\PetugasControllr;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Spatie\Permission\Contracts\Permission;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('pendonor', PendonorController::class);
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
    });