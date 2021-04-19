<?php

namespace App\Models;

use App\Http\Filterable;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use Filterable;
    protected $table = 'products';
    public $timestamps = false;
    protected $dateFormat = 'U';


    function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'id_category');
    }

    function brands()
    {
        return $this->belongsTo('App\Models\Brands', 'id_brand');
    }

    function comments()
    {
        return $this->hasMany('App\Models\Comments', 'id_product');
    }

    function wishlist()
    {
        return $this->hasMany('App\Models\Wishlist', 'id_product');
    }


    function orderdetails()
    {
        return $this->hasMany('App\Models\Orderdetails','id_product');
    }



    protected $fillable = [
        'id_category',
        'id_brand',
        'name_product',
        'image1',
        'image2',
        'image3',
        'image4',
        'price',
        'discount',
        'quantity',
        'lenght',
        'weight',
        'height',
        'width',
        'description',
        'like',
        'old_price'
    ];
}
