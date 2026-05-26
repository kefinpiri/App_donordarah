<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Models\PermintaanDarah;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Total permintaan pemohon login
        $totalPermintaan = PermintaanDarah::where(
            'user_id',
            Auth::id()
        )->count();

        // Pending
        $pending = PermintaanDarah::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'pending'
        )->count();

        // Disetujui
        $disetujui = PermintaanDarah::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'disetujui'
        )->count();

        // Ditola
        $ditolak = PermintaanDarah::where(
            'user_id',
            Auth::id()
        )->where(
            'status',
            'ditolak'
        )->count();

        // Data terbaru
        $permintaanTerbaru = PermintaanDarah::where(
            'user_id',
            Auth::id()
        )->latest()->take(5)->get();

        return view(
            'pemohon.dashboard',
            compact(
                'totalPermintaan',
                'pending',
                'disetujui',
                'ditolak',
                'permintaanTerbaru'
            )
        );
    }
}
