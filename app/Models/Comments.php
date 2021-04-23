<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $dateFormat = 'U';



    function Products(){
        return $this->belongsTo('App\Models\Products','id_product');
    }

    function Customers(){
        return $this->belongsTo('App\Models\Customers', 'id_customer');
    }

    function Orders(){
        return $this->belongsTo('App\Models\Orders','id_order');
    }



    protected $fillable = [
        'id_product',
        'id_customer',
        'comments',
        'rate'
    ];
}
