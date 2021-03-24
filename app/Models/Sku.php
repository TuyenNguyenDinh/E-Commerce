<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $table = 'sku';
    public $timestamps = false;
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable = [
       'sku'
    ];
}
