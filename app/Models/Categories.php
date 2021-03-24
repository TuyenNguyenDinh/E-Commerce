<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    public $timestamps = false;
    protected $dateFormat = 'U';

   
    function products(){
        return $this->hasMany('App\Models\Products', 'id_category');
    }

    protected $fillable = [
        'name',
        'image',
        'description'
    ];
}
