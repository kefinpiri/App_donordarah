<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:petugas'])->group(function () {

    Route::get('/petugas/dashboard', function () {

        return view('petugas.dashboard');
    });
});
