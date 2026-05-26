<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PermintaanDarah;

class DistribusiDarah extends Model
{
    protected $table = 'distribusi_darahs';

    protected $fillable = [
        'permintaan_darah_id',
        'petugas_id',
        'golongan_darah',
        'jumlah_kantong',
        'tanggal_distribusi',
        'status',
        'catatan',
    ];
    public function permintaanDarah()
    {
        return $this->belongsTo(PermintaanDarah::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
