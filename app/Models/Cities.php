<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'id', 'province_id', 'type', 'city_name', 'postal_code'
    ];
}
