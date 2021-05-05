<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function Disctrict(){
        return $this->hasMany('App\Models\District','id_district');
    }

    function Customers(){
        return $this->hasMany('App\Models\Customers', 'id_province');
    }

    function Customers_shipping_address(){
        return $this->hasMany('App\Models\Customers_shipping_address', 'id_province');
    }

    function Transport_fee(){
        return $this->hasMany('App\Models\Transport_fee','id_province');
    }

    function Orders(){
        return $this->hasMany('App\Models\Province', 'id_province');
    }

    

    protected $fillable = [
       'province',
    ];
    
}
