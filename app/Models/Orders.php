<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $dateFormat = 'U';
    

    function Customers()
    {
        return $this->belongsTo('App\Models\Customers', 'id_customer');
    }

    function Orderdetails()
    {
        return $this->hasMany('App\Models\Orderdetails','id_order');
    }

    function Comments(){
        return $this->hasMany('App\Models\Comments','id_order');
    }

    function Province(){
        return $this->belongsTo('App\Models\Province', 'id_province');
    }

    function District(){
        return $this->belongsTo('App\Models\District','id_district');
    }


    protected $fillable = [
        'id_customers',
        'order_date',
        'ship_date',
        'payment_menthod',
        'delivery_address',
        'total_price',
        'notes',
        'status',
        'reasons_cancel_order',
        'id_province',
        'id_district'
    ];
}
