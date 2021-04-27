<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function province(){
        return $this->belongsTo('App\Models\Province','id_province');
    }

    function customers(){
        return $this->hasMany('App\Models\Customers', 'id_district');
    }

    function orders(){
        return $this->hasMany('App\Models\District','id_district');
    }

    protected $fillable = [
       'id_province',
       'district_name'
    ];
}
