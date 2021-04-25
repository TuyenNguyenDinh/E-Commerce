<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{

    use Notifiable;

    protected $table = 'customers';
    protected $guard = 'cus';
    protected $primaryKey = 'id';


    function comments()
    {
        return $this->hasMany('App\Models\Customers', 'id_customer');
    }

    function wishlist(){
        return $this->hasMany('App\Models\Wishlist','id_customer');
    }

    function orders(){
        return $this->hasMany('App\Models\Orders','id_customer');
    }

    function customer_shipping_address(){
        return $this->hasMany('App\Models\Customer_shipping_address','id_customer');
    }

    function district(){
        return $this->belongsTo('App\Models\District', 'id_district');
    }

    function province(){
        return $this->belongsTo('App\Models\Province', 'id_province');
    }

    public function addNew($input)
{
    $check = static::where('facebook_id',$input['facebook_id'])->first();

    if(is_null($check)){
        return static::create($input);
    }

    return $check;
    

    protected $fillable = [
        'name',
        'phone',
        'password',
        'address',
        'id_district',
        'id_province',
        'email',
        'image_acc',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
