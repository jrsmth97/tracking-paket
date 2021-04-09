<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaKustomer extends Model
{
    protected $table = 'data_harga_kustomer';
    protected $fillable = [
        'kode',
        'tujuan',
        'harga_normal',
        'harga_express',
        'harga_super_express',
        'edd_normal',
        'edd_express',
        'edd_super_express'
    ];
}
