<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPaket extends Model
{
    protected $table = 'data_detail_paket';
    protected $primaryKey = 'paket_id';
    protected $fillable = [
        'no_stt',
        'koli',
        'panjang',
        'lebar',
        'tinggi',
        'berat',
        'keterangan',
    ];

    public function paket()
    {
        return $this->belongsTo('App\Models\Paket');
    }
}
