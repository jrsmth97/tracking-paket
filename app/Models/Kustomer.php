<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kustomer extends Model
{
    protected $table = 'data_kustomer';
    protected $fillable = [
        'kode',
        'nama_kustomer',
        'telepon',
        'telepon_seluler',
        'fax',
        'email',
        'wilayah',
        'alamat'
    ];
}
