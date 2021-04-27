<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';




    function products(){
        return $this->belongsTo('App\Models\Products','id_product');
    }

    function customers(){
        return $this->belongsTo('App\Models\Customers', 'id_customer');
    }

    function orders(){
        return $this->belongsTo('App\Models\Orders','id_order');
    }



    protected $fillable = [
        'id_product',
        'id_customer',
        'comments',
        'rate',
        'updated_at',
        'created_at',
        'id_order',
    ];
}
