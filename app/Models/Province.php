<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function disctrict(){
        return $this->hasMany('App\Models\District','id_district');
    }

    function customers(){
        return $this->hasMany('App\Models\Customers', 'id_province');
    }

    function customers_shipping_address(){
        return $this->hasMany('App\Models\Customers_shipping_address', 'id_province');
    }

    function transport_fee(){
        return $this->hasMany('App\Models\Transport_fee','id_province');
    }

    protected $fillable = [
       'province',
    ];
    
}
