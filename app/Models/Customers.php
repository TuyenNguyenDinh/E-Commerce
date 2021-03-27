<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = 'customers';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function comments(){
    return $this->hasMany('App\Models\Customers','id_customer');
    }

    protected $fillable = [
        'name',
        'phone',
        'address',
        'address_ship',
        'email',
        'city',
        'postalcode',
        'country'
    ];
}
