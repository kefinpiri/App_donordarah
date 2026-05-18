<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendonor;
use App\Models\Pasien;
use App\Models\Petugas;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Pendonor::count();
        $total = Pasien::count();
        $total = Petugas::count();
        return view('admin.dashboard', compact(
            'totalpendonor',
            'totalpasien',
            'totalpetugas',
        ));
    }
}
