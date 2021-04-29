<?php

namespace App\Http\Controllers;

use App\Models\Orderdetails;
use App\Models\Orders;
use App\Models\Products;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;

class PurchaseController extends Controller
{
    public function postPurchase(Request $request)
    {

        // $dateToAdd = 14;
        // $orders->ship_date = date("Y-m-d", strtotime('+ '.$dateToAdd , strtotime($orders->order_date)));
            $data['cart'] = Cart::content();
            $orders = new Orders();
            $orders->id_customer = Auth::guard('customer')->user()->id;
            $orders->order_date = date('Y-m-d');
            $orders->payment_method = $request->payment_methods;
            $result_explode = explode('||', $request->delivery_address);
            $orders->delivery_address = $result_explode[1];
            $orders->total_price = $request->total_fetch;
            $orders->notes = $request->notes;
            $orders->status = "Checking order";
            $orders->id_province = $result_explode[0];
            $orders->save();

            foreach ($data['cart'] as $product) {
                $orderdetails = new Orderdetails();
                $orderdetails->id_order = $orders->id;
                $orderdetails->id_product = $product->id;
                $orderdetails->quantity = $product->qty;
                $orderdetails->price = $product->price;
                $orderdetails->save();

                $products = Products::find($product->id);
                $new_quant = ($products->quantity) - ($product->qty);
                $products->update(['quantity' => $new_quant]);

                $data['fee_fetch'] = $request->fee_fetch;
                $data['total'] = $request->total_fetch;
                $email = Auth::guard('customer')->user()->email;
                Mail::send('frontend.emailpurchase', $data, function ($message) use ($email) {
                    $message->from('hoangcmnr000@gmail.com', 'Electro');
                    $message->to($email, $email);
                    $message->subject('Purchase confirmation');
                });
            }

            // return redirect("complete");
            Cart::destroy();
            return response()->json('ok');
    
    }

    public function getComplete()
    {
        // Cart::destroy();
        // return view('frontend.complete');
    }
}
