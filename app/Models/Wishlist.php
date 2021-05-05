<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function Products(){
        return $this->belongsTo('App\Models\Products','id_product');
    }

    protected $fillable = [
        'id_customer',
        'id_product',
        'price',
        'quantity'
    ];
}
