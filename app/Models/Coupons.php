<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $table = 'coupons';
    public $timestamps = false;
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
        'name',
        'coupon_code',
        'exp_date'
    ];
}
