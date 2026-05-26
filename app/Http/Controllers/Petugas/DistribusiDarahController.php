<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DistribusiDarah;
use App\Models\PermintaanDarah;

class DistribusiDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distribusiDarah = DistribusiDarah::latest()->get();

        return view(
            'petugas.distribusi-darah.index',
            compact('distribusiDarah')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permintaanDarah = PermintaanDarah::all();
        return view('petugas.distribusi-darah.create', compact('permintaanDarah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permintaan_darah_id' =>
            'required|exists:permintaan_darahs,id',
            'golongan_darah' => 'required',
            'jumlah_kantong' => 'required|integer',
            'tanggal_distribusi' => 'required|date',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);
        DistribusiDarah::create([
            'permintaan_darah_id' => $request->permintaan_darah_id,
            'petugas_id' => auth()->user()->id,
            'golongan_darah' => $request->golongan_darah,
            'jumlah_kantong' => $request->jumlah_kantong,
            'tanggal_distribusi' => $request->tanggal_distribusi,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('petugas.distribusi-darah.index')
            ->with('success', 'Distribusi darah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $distribusiDarah = DistribusiDarah::findOrFail($id);

        $permintaanDarah = PermintaanDarah::all();
        return view(
            'petugas.distribusi-darah.edit',
            compact('distribusiDarah', 'permintaanDarah')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'permintaan_darah_id' => 'required',

            'golongan_darah' => 'required',

            'jumlah_kantong' => 'required|integer',

            'tanggal_distribusi' => 'required',

            'status' => 'required',

            'catatan' => 'nullable',

        ]);
        $distribusiDarah = DistribusiDarah::findOrFail($id);

        $distribusiDarah->update([

            'permintaan_darah_id' => $request->permintaan_darah_id,

            'golongan_darah' => $request->golongan_darah,

            'jumlah_kantong' => $request->jumlah_kantong,

            'tanggal_distribusi' => $request->tanggal_distribusi,

            'status' => $request->status,

            'catatan' => $request->catatan,

        ]);

        return redirect()
            ->route('petugas.distribusi-darah.index')
            ->with('success', 'Distribusi darah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $distribusiDarah = DistribusiDarah::findOrFail($id);

        $distribusiDarah->delete();

        return redirect()
            ->route('petugas.distribusi-darah.index')
            ->with('success', 'Distribusi darah berhasil dihapus');
    }
}
