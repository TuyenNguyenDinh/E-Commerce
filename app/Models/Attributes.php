<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = 'attributes';
    public $timestamps = false;
    protected $dateFormat = 'U';

    function Categories()
    {
        return $this->belongsTo('App\Models\Categories', 'id_category');
    }

    protected $fillable = [
        'id_category',
        'attributes_1',
        'attributes_2',
        'attributes_3',
        'attributes_4'
    ];
}
