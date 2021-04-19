<?php

namespace App\Http\Controllers;

use App\Models\Orderdetails;
use App\Models\Orders;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PurchaseController extends Controller
{
    public function postPurchase(Request $request)
    {
        $data['cart'] = Cart::content();
        $orders = new Orders();
        $orders->id_customer = Auth::guard('customer')->user()->id;
        $orders->order_date = date('Y-m-d');
        $dateToAdd = 14;
        $orders->ship_date = date("Y-m-d", strtotime('+ '.$dateToAdd , strtotime($orders->order_date)));
        $orders->payment_method = $request->payment_methods;
        $orders->delivery_address = "asdfsadf";
        $orders->total_price = Cart::total(0,'','');
        $orders->notes = $request->notes;       
        $orders->status = "Checking order";
        $orders->save();
        

        foreach($data['cart'] as $product){
            $orderdetails = new Orderdetails();
            $orderdetails->id_order = $orders->id;
            $orderdetails->id_product = $product->id;
            $orderdetails->quantity = $product->qty;
            $orderdetails->price = $product->price;
            $orderdetails->save();
        }
        return dd($orders);
    }

    public function getComplete(){

        return view('frontend.complete');
    }
}
