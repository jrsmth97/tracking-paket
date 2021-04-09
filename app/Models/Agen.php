<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    protected $table = 'data_agen';
    protected $fillable = ['kode', 'nama_agen', 'telepon', 'telepon_seluler', 'wilayah', 'alamat'];
}
