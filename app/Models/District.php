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

    protected $fillable = [
       'id_province',
       'district_name'
    ];
}
