<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonorDarah;
use App\Models\PermintaanDarah;
use App\Models\DistribusiDarah;
use App\Models\StokDarah;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        
        $totalUser = User::count();

        // TOTAL DATA
        $totalDonor = DonorDarah::count();

        $totalPermintaan = PermintaanDarah::count();

        $totalDistribusi = DistribusiDarah::count();

        $totalPetugas = User::role('petugas')->count();

        // DATA TERBARU
        $donorTerbaru = DonorDarah::latest()
            ->take(5)
            ->get();

        $permintaanTerbaru = PermintaanDarah::latest()
            ->take(5)
            ->get();

        // STOK DARAH
        $stokA = StokDarah::where(
            'golongan_darah',
            'A'
        )->sum('jumlah_kantong');

        $stokB = StokDarah::where(
            'golongan_darah',
            'B'
        )->sum('jumlah_kantong');

        $stokAB = StokDarah::where(
            'golongan_darah',
            'AB'
        )->sum('jumlah_kantong');

        $stokO = StokDarah::where(
            'golongan_darah',
            'O'
        )->sum('jumlah_kantong');

        return view(
            'admin.dashboard',
            compact(
                'totalDonor',
                'totalPermintaan',
                'totalDistribusi',
                'totalPetugas',
                'donorTerbaru',
                'permintaanTerbaru',
                'stokA',
                'stokB',
                'stokAB',
                'stokO'
            )
        );
    }
}
