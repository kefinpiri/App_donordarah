<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonorDarah;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class PendonorController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [

            new Middleware(
                'permission:view pendonor',
                only: ['index', 'show']
            ),

        ];
    }

    public function index()
    {
        $pendonors = DonorDarah::latest()->get();

        return view(
            'admin.pendonor.index',
            compact('pendonors')
        );
    }

    public function show(string $id)
    {
        $pendonor = DonorDarah::findOrFail($id);

        return view(
            'admin.pendonor.show',
            compact('pendonor')
        );
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([

            'status' => 'required|in:   Menunggu,Diterima,Selesai,Ditolak',

        ]);

        $pendonor = DonorDarah::findOrFail($id);

        $pendonor->update([

            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.pendonor.index')
            ->with(
                'success',
                'Status donor berhasil diperbarui'
            );
    }
}
