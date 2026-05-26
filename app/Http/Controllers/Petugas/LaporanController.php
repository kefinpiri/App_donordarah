<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermintaanDarah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = PermintaanDarah::query();
        if ($request->tanggal_awal) {
            $query->whereDate(
                'tanggal_permintaan',
                '>=',
                $request->tanggal_awal
            );
        }
        if ($request->tanggal_akhir) {

            $query->whereDate(
                'tanggal_permintaan',
                '<=',
                $request->tanggal_akhir
            );
        }

        // Data laporan
        $laporan = $query->latest()->get();

        // Statistik laporan
        $totalPermintaan = $laporan->count();

        $pending = $laporan->where(
            'status',
            'pending'
        )->count();

        $disetujui = $laporan->where(
            'status',
            'disetujui'
        )->count();

        $ditolak = $laporan->where(
            'status',
            'ditolak'
        )->count();

        return view(
            'petugas.laporan.index',
            compact(
                'laporan',
                'totalPermintaan',
                'pending',
                'disetujui',
                'ditolak'
            )
        );
    }
    public function exportPdf()
    {
        $laporan = PermintaanDarah::latest()->get();
        $pdf = Pdf::loadView(
            'petugas.laporan.pdf',
            compact('laporan')
        );

        return $pdf->download(
            'laporan-permintaan-darah.pdf'
        );
    }
    public function exportExcel()
    {
        return Excel::download(
            new LaporanExport,
            'laporan-permintaan-darah.xlsx'
        );
    }
}
