<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $dateFormat = 'U';


    protected $fillable = [
        'id_category',
        'id_brand',
        'id_SKU',
        'name_product',
        'image1',
        'image2',
        'image3',
        'image4',
        'price',
        'quantity',
        'weight',
        'size',
        'description',
        'like'
    ];
    
}
