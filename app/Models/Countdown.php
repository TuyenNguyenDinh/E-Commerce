<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Countdown extends Model
{
    protected $table = 'countdown_time';
    public $timestamps = true;
    protected $dateFormat = 'U';

    protected $fillable = [
        'datetime',
        'status'
    ];
}
