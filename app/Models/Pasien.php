<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'golongan_darah',
        'jumlah_darah',
        'ruma_sakit',
        'status',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
