<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class PermintaanDarah extends Model
{
    protected $table = 'permintaan_darahs';
    protected $fillable = [
        'user_id',
        'nama_pasien',
        'jenis_kelamin',
        'no_hp',
        'golongan_darah',
        'jumlah_kantong',
        'rumah_sakit',
        'tanggal_permintaan',
        'status',
        'keterangan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
