<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    public $timestamps = false;
    protected $dateFormat = 'U';

    function products(){
        return $this->hasMany('App\Models\Products', 'id_brand');
    }

    protected $fillable = [
        'name',
        'image'
    ];
}
