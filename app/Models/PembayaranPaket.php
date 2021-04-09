<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranPaket extends Model
{
    protected $table = 'data_pembayaran_paket';
    protected $primaryKey = 'paket_id';
    protected $fillable = [
        'no_stt',
        'pembayaran',
        'tanggal_input',
        'tanggal_pickup',
        'biaya_tambahan',
        'diskon',
        'total_harga',
    ];

    public function paket()
    {
        return $this->belongsTo('App\Models\Paket');
    }
}
