<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer_shipping_address extends Model
{
    protected $table = 'customer_shipping_address';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function Customers(){
        return $this->belongsTo('App\Models\Customers','id_customer');
    }

    function Province(){
        return $this->belongsTo('App\Models\Province','id_province');
    }

    function District(){
        return $this->belongsTo('App\Models\District','id_district');
    }


    protected $fillable = [
        'id_customer',
        'id_province',
        'id_district',
        'address_detail',
    ];
}
