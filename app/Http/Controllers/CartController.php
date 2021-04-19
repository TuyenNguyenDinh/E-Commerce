<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Customer_shipping_address;
use App\Models\Customers;
use App\Models\Products;
use App\Models\Province;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function getAddCart(Request $request, $id)
    {
        $product = Products::find($id);
        Cart::add(['id' => $id, 'name' => $product->name_product, 'weight' => $product->weight ,'qty' => 1, 'price' => $product->price,
          'options' => ['img' => $product->image1, 'brands' => $product->brands->name, 'categories' => $product->categories->name]]);
        return redirect('cart/show');
        // return dd($qty);
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
            return redirect()->back();
            
    }

    public function getUpdateCart(Request $request)
    {
        $cart = Cart::update($request->rowId, $request->qty);
        return response()->json($cart);
     
    }

    public function cartdata(){
        $data['items'] = Cart::content();
        $data['total'] = Cart::total(0);
        return view('frontend.cartdata',$data);
    }


    public function getCheckout(){
        
        if(Cart::count() == 0){
            Alert::warning("warning", "Not found items in cart");
            return redirect("/");
        }else{
            $id = Auth::guard('customer')->user()->id;
            $data['items'] = Cart::content();
            $data['total'] = Cart::total(0);
            $data['ship_addrs'] = Customer_shipping_address::where('id_customer',$id)->get();
            $data['cus'] = Customers::find($id);
            $pr = Province::all();
            return view('frontend.checkout', $data, ['pr' => $pr]);
        }
    }

    public function addAddress(Request $request){
        $address = new Customer_shipping_address();
        $address->id_customer = Auth::guard('customer')->user()->id;
        $address->id_province = $request->province;
        $address->id_district = $request->district;
        $address->address_detail = $request->address_detail;
        $address->save();
        return response()->json($address);
    }

    public function postPurchase(Request $request)
    {
        $data['cart'] = Cart::content();
        $orders = new Orders();
        $orders->id_customer = Auth::guard('customer')->user()->id;
        $orders->order_date = Date::now();
        $promotionDate = Carbon::createFromFormat('Y.m.d', $orders->order_date);
        $dateToAdd = 14;
        $promotionDate = $promotionDate->addDays($dateToAdd);
        $orders->ship_date = $promotionDate;
        $orders->payment_method = $request->payment_methods;
        $orders->delivery_address = $request;
        $orders->total_price = $request;
        $orders->notes = $request->notes;       
        $orders->status = "Checking order";
        $orders->save();

        foreach($data['cart'] as $product){
            $orderdetails = new Orderdetails();
            $orderdetails->id_order = $$orders->id;
            $orderdetails->id_product = $product->id;
            $orderdetails->quantity = $product->qty;
            $orderdetails->price = $product->price;
            $orderdetails->save();
        }
        return redirect('/');
    }

}
