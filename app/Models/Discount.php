<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount';
    public $timestamps = false;
    protected $dateFormat = 'U';


    // function categories(){
    //     return $this->belongsTo('App\Models\Categories','id_category');
    // }

    function products(){
        return $this->belongsTo('App\Models\Products','id_product');
    }


    protected $fillable = [
        'id_product',
        'discount_percent'       
    ];
}