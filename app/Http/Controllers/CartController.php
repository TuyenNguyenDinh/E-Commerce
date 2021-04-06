<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function getAddCart($id)
    {
        $product = Products::find($id);
        
        Cart::add(['id' => $id, 'name' => $product->name_product, 'weight' => $product->weight ,'qty' => 1, 'price' => $product->price,
          'options' => ['img' => $product->image1, 'brands' => $product->brands->name, 'categories' => $product->categories->name]]);
        return redirect('cart/show');
    }

    public function getShowCart()
    {
        $data['items'] = Cart::content();
        $data['total'] = Cart::total(0);
        return view('frontend.cart',$data);
        // return dd($data['items']);
    }

    public function getDeleteCart($id)
    {
        
            Cart::remove($id);
            return back();
    }

    public function getUpdateCart(Request $request)
    {
        $cart = Cart::update($request->rowId, $request->qty);
        return response()->json($cart);
    }
}
