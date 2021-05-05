<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport_fee extends Model
{
    protected $table = 'transport_fee';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function Province()
    {
        return $this->belongsTo('App\Models\Province', 'id_province');
    }

    protected $fillable = [
        'id_province',
        'transport_fee',
    ];
}
