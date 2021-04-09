<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected $table = 'data_kurir';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kurir',
        'nama_agen',
        'no_hp',
        'alamat',
        'kendaraan',
        'merk_kendaraan',
        'no_plat',
    ];
}
