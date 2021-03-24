<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    public $timestamps = false;
    protected $dateFormat = 'U';


    protected $fillable = [
        'id_product',
        'id_customer',
        'comments',
        'rate'
    ];
}
