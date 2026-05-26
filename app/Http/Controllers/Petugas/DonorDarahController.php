<?php

namespace App\Http\Controllers\Petugas;

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
        $donorDarah = DonorDarah::latest()->get();

        return view(
            'petugas.donor-darah.index',
            compact('donorDarah')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $donorDarah = DonorDarah::findOrFail($id);

        return view(
            'petugas.donor-darah.edit',
            compact('donorDarah')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'status' => 'required',

            'catatan' => 'nullable',

        ]);

        $donorDarah = DonorDarah::findOrFail($id);

        $donorDarah->update([

            'status' => $request->status,

            'catatan' => $request->catatan,

        ]);

        return redirect()
            ->route('petugas.donor-darah.index')
            ->with(
                'success',
                'Status donor berhasil diupdate'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
