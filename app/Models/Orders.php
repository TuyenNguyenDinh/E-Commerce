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

    function orderdetails()
    {
        return $this->hasMany('App\Models\Orderdetails','id_order');
    }


    protected $fillable = [
        'id_customers',
        'order_date',
        'ship_date',
        'payment_menthod',
        'delivery_address',
        'total_price',
        'notes',
        'status'
    ];
}
