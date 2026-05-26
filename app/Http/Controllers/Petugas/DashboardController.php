<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StokDarah;
use App\Models\PermintaanDarah;
use App\Models\DistribusiDarah;
use App\Models\DonorDarah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStokDarah = StokDarah::sum('jumlah_kantong');
        $totalPermintaanDarah = PermintaanDarah::count();
        $totalDistribusiDarah = DistribusiDarah::count();
        $totalDonorDarah = DonorDarah::count();
        $donorMenunggu = DonorDarah::where(
            'status',
            'Menunggu'
        )->count();
        $distribusiDiproses = DistribusiDarah::where(
            'status',
            'Diproses'
        )->count();
        return view(
            'petugas.dashboard.index',
            compact(
                'totalStokDarah',
                'totalPermintaanDarah',
                'totalDistribusiDarah',
                'totalDonorDarah',
                'donorMenunggu',
                'distribusiDiproses'
            )
        );
    }
}
