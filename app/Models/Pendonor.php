<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendonor extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'jenis_kelamin',
        'golongan_darah',
        'rhesus',
        'alamat',
        'no_hp',
        'tanggal_lahir',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
