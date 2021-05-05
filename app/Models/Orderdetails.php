<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $table = 'orderdetails';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function orders(){
        return $this->belongsTo('App\Models\Orders','id_order');
    }
    function products(){
        return $this->belongsTo('App\Models\Products','id_product');
    }

    protected $fillable = [
        'id_order',
        'id_product',
        'quantity',
        'price'
    ];
}
