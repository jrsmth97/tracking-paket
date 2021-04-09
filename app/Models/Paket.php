<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'data_paket';
    protected $fillable = [
        'no_stt',
        'no_sik',
        'kustomer',
        'agen_perwakilan',
        'tujuan',
        'kota_tujuan',
        'tipe_paket',
        'pelayanan',
        'tanggal',
        'pengirim',
        'penerima',
        'alamat_penerima',
        'alamat_pengirim',
    ];

    public function detail()
    {
        return $this->hasMany('App\Models\DetailPaket');
    }

    public function cost()
    {
        return $this->hasMany('App\Models\PembayaranPaket');
    }
}
