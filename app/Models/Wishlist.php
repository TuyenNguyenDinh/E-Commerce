<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'whistlist';
    public $timestamps = false;
    protected $dateFormat = 'U';

    protected $fillable = [
        'id_customer',
        'id_product',
        'price',
        'quantity'
    ];
}
