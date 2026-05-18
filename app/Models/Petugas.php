<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
