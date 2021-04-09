<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackPaket extends Model
{
    protected $table = 'data_tracking_paket';

    protected $fillable = [
        'no_stt',
        'lokasi',
        'kurir',
        'detail',
        'photo',
    ];
}
