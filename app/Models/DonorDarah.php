<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DonorDarah extends Model
{
    protected $table = 'donor_darahs';

    protected $fillable = [
        'user_id',
        'tanggal_donor',
        'lokasi',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
