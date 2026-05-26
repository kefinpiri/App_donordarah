<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use App\Models\DonorDarah;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL DONOR SAYA
        |--------------------------------------------------------------------------
        */

        $totalDonor = DonorDarah::where(
            'user_id',
            auth()->id()
        )->count();

        /*
        |--------------------------------------------------------------------------
        | STATUS MENUNGGU
        |--------------------------------------------------------------------------
        */

        $menunggu = DonorDarah::where(
            'user_id',
            auth()->id()
        )->where(
            'status',
            'Menunggu'
        )->count();
        $diterima = DonorDarah::where(
            'user_id',
            auth()->id()
        )->where(
            'status',
            'Diterima'
        )->count();
        $ditolak = DonorDarah::where(
            'user_id',
            auth()->id()
        )->where(
            'status',
            'Ditolak'
        )->count();

        $donorTerbaru = DonorDarah::where(
            'user_id',
            auth()->id()
        )->latest()
            ->take(5)
            ->get();

        return view(
            'donor.dashboard.index',
            compact(
                'totalDonor',
                'menunggu',
                'diterima',
                'ditolak',
                'donorTerbaru'
            )
        );
    }
}
