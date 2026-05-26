<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StokDarah;

class StokDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stokDarah = StokDarah::latest()->get();
        return view('petugas.stok-darah.index',compact('stokDarah'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.stok-darah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'golongan_darah' => 'required',
            'jumlah_kantong' => 'required|integer',
            'tanggal_donor' => 'required',
            'tanggal_kedaluwarsa' => 'required',
            'keterangan'=>'nullable ',
        ]);
        StokDarah::create([
            'golongan_darah' => $request->golongan_darah,
            'jumlah_kantong' => $request->jumlah_kantong,
            'tanggal_donor' => $request->tanggal_donor,
            'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
            'keterangan' => $request->keterangan,

        ]);
        return redirect()->route('petugas.stok-darah.index')
            ->with('success', 'Stok darah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stokDarah = StokDarah::findOrFail($id);

        return view('petugas.stok-darah.edit', compact('stokDarah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'golongan_darah' => 'required',
            'jumlah_kantong' => 'required|integer',
            'tanggal_donor' => 'required',
            'tanggal_kedaluwarsa' => 'required',
        ]);

        $stokDarah = StokDarah::findOrFail($id);

        $stokDarah->update([
            'golongan_darah' => $request->golongan_darah,
            'jumlah_kantong' => $request->jumlah_kantong,
            'tanggal_donor' => $request->tanggal_donor,
            'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('petugas.stok-darah.index')
            ->with('success', 'Data stok darah berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stokDarah = StokDarah::findOrFail($id);

        $stokDarah->delete();

        return redirect()->route('petugas.stok-darah.index')
            ->with('success', 'Data stok darah berhasil dihapus');
    }
}
