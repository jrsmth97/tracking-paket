<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'name',
        'messages',
        'active',
        'action',
    ];
}
