<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $table = 'orderdetails';
    public $timestamps = false;
    protected $dateFormat = 'U';


    protected $fillable = [
        'id_order',
        'id_product',
        'id_SKU',
        'quantity',
        'price'
    ];
}
