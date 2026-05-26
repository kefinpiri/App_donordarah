<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermintaanDarah;
use Illuminate\Support\Facades\Auth;

class PermintaanDarahController extends Controller
{
    public function index()
    {
        $permintaanDarah = PermintaanDarah::where('user_id', Auth::id())->latest()->get();

        return view(
            'pemohon.permintaan-darah.index',
            compact('permintaanDarah')
        );
    }
    public function create()
    {
        return view(
            'pemohon.permintaan-darah.create'
        );
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'golongan_darah' => 'required',
            'jumlah_kantong' => 'required|integer',
            'rumah_sakit' => 'required',
            'tanggal_permintaan' => 'required|date',
            'keterangan' => 'nullable',
        ]);
        PermintaanDarah::create([
            'user_id' => Auth::user()->id,
            'nama_pasien' => $request->nama_pasien,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'golongan_darah' => $request->golongan_darah,
            'jumlah_kantong' => $request->jumlah_kantong,
            'rumah_sakit' => $request->rumah_sakit,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'status' => 'pending',
            'keterangan' => $request->keterangan,
        ]);
        return redirect()
            ->route('pemohon.permintaan-darah.index')
            ->with(
                'success',
                'Permintaan darah berhasil dikirim'
            );
    }
}
