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
    /**
     * HALAMAN LAPORAN
     */
    public function index(Request $request)
    {
        $query = PermintaanDarah::query();

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | DATA LAPORAN
        |--------------------------------------------------------------------------
        */

        $laporan = $query->latest()->get();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

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

    /**
     * EXPORT PDF
     */
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

    /**
     * EXPORT EXCEL
     */
    public function exportExcel()
    {
        return Excel::download(
            new LaporanExport,
            'laporan-permintaan-darah.xlsx'
        );
    }
}
