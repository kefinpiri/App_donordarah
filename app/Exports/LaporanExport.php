<?php

namespace App\Exports;

use App\Models\PermintaanDarah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * DATA EXCEL
     */
    public function collection()
    {
        return PermintaanDarah::select(
            'nama_pasien',
            'jenis_kelamin',
            'golongan_darah',
            'jumlah_kantong',
            'rumah_sakit',
            'status',
            'tanggal_permintaan'
        )->get();
    }

    /**
     * HEADER KOLOM
     */
    public function headings(): array
    {
        return [
            'Nama Pasien',
            'Jenis Kelamin',
            'Golongan Darah',
            'Jumlah Kantong',
            'Rumah Sakit',
            'Status',
            'Tanggal Permintaan',
        ];
    }
}
