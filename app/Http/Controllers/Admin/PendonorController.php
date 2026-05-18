<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendonor;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PendonorController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [

            new Middleware('permission:view pendonor', only: ['index', 'show']),

            new Middleware('permission:create pendonor', only: ['create', 'store']),

            new Middleware('permission:edit pendonor', only: ['edit', 'update']),

            new Middleware('permission:delete pendonor', only: ['destroy']),
        ];
    }

    public function index()
    {
        $pendonors = Pendonor::all();
        return view('admin.pendonor.index', compact('pendonors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendonor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama'             => 'required',
            'nik'              => 'required|unique:pendonors',
            'jenis_kelamin'    => 'required',
            'golongan_darah'   => 'required',
            'rhesus'           => 'required',
            'alamat'           => 'required',
            'no_hp'            => 'required',
            'tanggal_lahir'    => 'required',

        ]);
        Pendonor::create([

            'nama'             => $request->nama,
            'nik'              => $request->nik,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'golongan_darah'   => $request->golongan_darah,
            'rhesus'           => $request->rhesus,
            'alamat'           => $request->alamat,
            'no_hp'            => $request->no_hp,
            'tanggal_lahir'    => $request->tanggal_lahir,

        ]);
        return redirect()
            ->route('admin.pendonor.index')
            ->with('success', 'Data pendonor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendonor = Pendonor::findorFail($id);
        return view('admin.pendonor.show', compact('pendonor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendonor = Pendonor::findorFail($id);
        return view('admin.pendonor.edit', compact('pendonor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendonor = Pendonor::findOrFail($id);

        $request->validate([

            'nama'             => 'required',
            'nik'              => 'required|unique:pendonors,nik,' . $pendonor->id,
            'jenis_kelamin'    => 'required',
            'golongan_darah'   => 'required',
            'rhesus'           => 'required',
            'alamat'           => 'required',
            'no_hp'            => 'required',
            'tanggal_lahir'    => 'required',

        ]);

        $pendonor->update([

            'nama'             => $request->nama,
            'nik'              => $request->nik,
            'jenis_kelamin'    => $request->jenis_kelamin,
            'golongan_darah'   => $request->golongan_darah,
            'rhesus'           => $request->rhesus,
            'alamat'           => $request->alamat,
            'no_hp'            => $request->no_hp,
            'tanggal_lahir'    => $request->tanggal_lahir,

        ]);

        return redirect()
            ->route('admin.pendonor.index')
            ->with('success', 'Data pendonor berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendonor = Pendonor::findOrFail($id);
        $pendonor->delete();
        return redirect()
            ->route('admin.pendonor.index')
            ->with('success', 'Data pendonor berhasil dihapus');
    }
}
