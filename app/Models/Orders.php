<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    protected $dateFormat = 'U';


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
