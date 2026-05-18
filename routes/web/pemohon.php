<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:pemohon'])->group(function () {

    Route::get('/pemohon/dashboard', function () {

        return view('pemohon.dashboard');
    });
});
