<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Orderdetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        $orders = Orders::all();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function getOrders($id){
        $data['customers'] = Customers::find($id);
        $data['orders'] = Orders::where('id_customer',$id)->get();
        $data['orders_details'] = Orderdetails::all();
        return view('admin.orders.show',$data);
        // return dd($data);
    }
}
