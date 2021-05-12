<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Customer_shipping_address;
use App\Models\Customers;
use App\Models\Orderdetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Province;
use App\Models\Transport_fee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function getAddCart($id, $qty)
    {
        $product = Products::find($id);
        Cart::add([
            'id' => $id, 'name' => $product->name_product, 'weight' => 0, 'qty' => $qty, 'price' => $product->price,
            'options' => ['img' => $product->image1, 'brands' => $product->brands->name, 'categories' => $product->categories->name]
        ]);
        return redirect('cart/show');
        // return response()->json('add ok');
    }

    public function getShowCart()
    {
        $data['items'] = Cart::content();
        $data['total'] = Cart::subtotal(0);

        return view('frontend.cart', $data);
        // return dd($data['items']);
    }

    public function getDeleteCart($id)
    {
        Cart::remove($id);
        return response()->json('ok');
    }

    public function getUpdateCart(Request $request)
    {
        $cart = Cart::update($request->rowId, $request->qty);
        return response()->json($cart);
    }

    public function cartdata()
    {
        $data['items'] = Cart::content();
        $data['total'] = Cart::subtotal(0);
        return view('frontend.cartdata', $data);
    }


    public function getCheckout()
    {

        if (Cart::count() == 0) {
            Alert::warning("warning", "Not found items in cart");
            return redirect("/");
        } else {
            $id = Auth::guard('customer')->user()->id;
            $data['items'] = Cart::content();
            $data['total'] = Cart::subtotal(0, "", "");
            $data['ship_addrs'] = Customer_shipping_address::where('id_customer', $id)->get();
            $data['cus'] = Customers::find($id);
            $pr = Province::all();
            $data['transport_fee'] = Transport_fee::all();
            return view('frontend.checkout', $data, ['pr' => $pr]);
        }
    }

    public function getFeeFromProvince($id)
    {
        echo json_encode(DB::table('transport_fee')->where('id_province', $id)->get());
    }

    public function addAddress(Request $request)
    {
        $address = new Customer_shipping_address();
        $address->id_customer = Auth::guard('customer')->user()->id;
        $address->id_province = $request->province;
        $address->id_district = $request->district;
        $address->address_detail = $request->address_detail;
        $address->save();
        return response()->json($address);
    }
}
