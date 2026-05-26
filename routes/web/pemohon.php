<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pemohon\PermintaanDarahController;

Route::middleware(['auth', 'role:pemohon'])
    ->prefix('pemohon')
    ->name('pemohon.')
    ->group(function () {

        // Route::get('/dashboard', function () {

        //     return view('pemohon.dashboard');
        // })->name('dashboard');
        Route::get('/dashboard', [App\Http\Controllers\Pemohon\DashboardController::class, 'index'])->name('dashboard');
        Route::resource( 'permintaan-darah',
            PermintaanDarahController::class  )->only([ 'index',  'create',  'store', ]);
    });
