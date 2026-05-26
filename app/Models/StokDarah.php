<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokDarah extends Model
{
    protected $table = 'stok_darahs';
    protected $fillable = [
        'golongan_darah',
        'jumlah_kantong',
        'tanggal_donor',
        'tanggal_kedaluwarsa',
        'keterangan',
    ];
}
