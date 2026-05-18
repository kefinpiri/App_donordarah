<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PasienController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [

            new Middleware('permission:view pasien', only: ['index', 'show']),

            new Middleware('permission:create pasien', only: ['create', 'store']),

            new Middleware('permission:edit pasien', only: ['edit', 'update']),

            new Middleware('permission:delete pasien', only: ['destroy']),
        ];
    }

    public function index()
    {
        $pasien = Pasien::latest()->get();
        return view('admin.pasien.index', compact('pasien'));
    }
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }
    public function update(Request $request, string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'golongan_darah' => 'required',
            'jumlah_darah' => 'required|numeric',
            'rumah_sakit' => 'required',
            'status' => 'required',
        ]);
        $pasien->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'golongan_darah' => $request->golongan_darah,
            'jumlah_darah' => $request->jumlah_darah,
            'rumah_sakit' => $request->rumah_sakit,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.pasien.index')
            ->with('success', 'Data berhasil diupdate');
    }
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('admin.pasien.index')
            ->with('success', 'Data berhasil dihapus');
    }
    public function show(string $id)
    {
        $pasien = Pasien::findOrFail($id);

        return view('admin.pasien.show', compact('pasien'));
    }
}
