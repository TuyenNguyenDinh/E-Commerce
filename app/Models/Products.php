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


    function Categories()
    {
        return $this->belongsTo('App\Models\Categories', 'id_category');
    }

    function Brands()
    {
        return $this->belongsTo('App\Models\Brands', 'id_brand');
    }

    function Comments()
    {
        return $this->hasMany('App\Models\Comments', 'id_product');
    }

    function Wishlist()
    {
        return $this->hasMany('App\Models\Wishlist', 'id_product');
    }


    function Orderdetails()
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
        'attributes',
        'description',
        'like',
        'old_price'
    ];
}
