<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaAgen extends Model
{
    protected $table = 'data_harga_agen';
    protected $fillable = [
        'kode',
        'tujuan',
        'harga_normal',
        'harga_express',
        'harga_super_express',
        'eddNormal',
        'eddExpress',
        'eddSuperExpress'
    ];
}
