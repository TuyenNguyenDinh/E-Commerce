<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function Province(){
        return $this->belongsTo('App\Models\Province','id_province');
    }

    function Customers(){
        return $this->hasMany('App\Models\Customers', 'id_district');
    }

    function Orders(){
        return $this->hasMany('App\Models\District','id_district');
    }

    protected $fillable = [
       'id_province',
       'district_name'
    ];
}
