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
    public $timestamps = false;
    protected $dateFormat = 'U';


    function comments(){
    return $this->hasMany('App\Models\Customers','id_customer');
    }

    protected $fillable = [
        'name',
        'phone',
        'password',
        'address',
        'address_ship',
        'email',
        'city',
        'country'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
