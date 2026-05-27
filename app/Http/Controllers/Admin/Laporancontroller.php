<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermintaanDarah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * HALAMAN LAPORAN
     */
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
        $laporan = $query->latest()->get();

        $totalPermintaan = $laporan->count();

        $pending = $laporan->where(
            'status',
            'Pending'
        )->count();

        $disetujui = $laporan->where(
            'status',
            'Disetujui'
        )->count();

        $ditolak = $laporan->where(
            'status',
            'Ditolak'
        )->count();

        return view(
            'admin.laporan.index',
            compact(
                'laporan',
                'totalPermintaan',
                'pending',
                'disetujui',
                'ditolak'
            )
        );
    }

    /**
     * EXPORT PDF
     */
    public function exportPdf()
    {
        $laporan = PermintaanDarah::latest()->get();

        $pdf = Pdf::loadView(
            'admin.laporan.pdf',
            compact('laporan')
        );

        return $pdf->download(
            'laporan-admin.pdf'
        );
    }

    public function exportExcel()
    {
        return Excel::download(
            new LaporanExport,
            'laporan-admin.xlsx'
        );
    }
}
