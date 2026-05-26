<?php

namespace App\Http\Controllers\Donor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonorDarah;

class DonorDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donorDarah = DonorDarah::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'donor.riwayat',
            compact('donorDarah')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('donor.jadwal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_donor' => 'required',
            'lokasi' => 'required',
            'catatan' => 'nullable',
        ]);

        DonorDarah::create([

            'user_id' => auth()->id(),

            'tanggal_donor' => $request->tanggal_donor,

            'lokasi' => $request->lokasi,

            'status' => 'Menunggu',

            'catatan' => $request->catatan,

        ]);

        return redirect()
            ->route('donor.riwayat')
            ->with(
                'success',
                'Pengajuan donor berhasil dibuat'
            );
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
