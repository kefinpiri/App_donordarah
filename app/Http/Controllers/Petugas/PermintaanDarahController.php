<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermintaanDarah;

class PermintaanDarahController extends Controller
{
    public function index()
    {
        $permintaanDarah = PermintaanDarah::latest()->get();

        return view(
            'petugas.permintaan-darah.index',
            compact('permintaanDarah')
        );
    }
    public function show(string $id) {
        //
    }
    public function edit(string $id)
    {
        $permintaanDarah = PermintaanDarah::findOrFail($id);

        return view(
            'petugas.permintaan-darah.edit',
            compact('permintaanDarah')
        );
    }
    public function update(Request $request, string $id)
    {
        $request->validate([

            'status' => 'required',

            'keterangan' => 'nullable',

        ]);

        $permintaanDarah = PermintaanDarah::findOrFail($id);

        $permintaanDarah->update([

            'status' => $request->status,

            'keterangan' => $request->keterangan,

        ]);

        return redirect()
            ->route('petugas.permintaan-darah.index')
            ->with(
                'success',
                'Status permintaan darah berhasil diupdate'
            );
    }
}
