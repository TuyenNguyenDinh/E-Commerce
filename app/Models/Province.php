<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function disctrict(){
        return $this->hasMany('App\Models\District','id_province');
    }

    protected $fillable = [
       'province',
    ];
    
}
