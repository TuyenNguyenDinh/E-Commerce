<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'provinces';
    public $timestamps = false;
    protected $dateFormat = 'U';


    protected $fillable = [
       'province',
       'distric',
       'village'
    ];
    
}
