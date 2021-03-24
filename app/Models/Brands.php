<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    public $timestamps = false;
    protected $dateFormat = 'U';

    protected $fillable = [
        'name',
        'image'
    ];
}
