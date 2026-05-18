<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PendonorController;

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('pendonor', PendonorController::class);
    });
