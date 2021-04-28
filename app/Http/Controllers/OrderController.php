<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Repositories\OrderEloquentRepository;
use App\Repositories\CustomerEloquentRepository;
use App\Repositories\OrderDetailEloquentRepository;

class OrderController extends Controller
{

    protected $orders;
    protected $customers;
    protected $orderdetails;

    public function __construct(OrderEloquentRepository $orders,
                                CustomerEloquentRepository $customers,
                                OrderDetailEloquentRepository $orderdetails)
    {
        $this->orders = $orders;
        $this->customers = $customers;
        $this->orderdetails = $orderdetails;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $orders = $this->orders->getAll();
        $customers = $this->orders->getAll();

        if($request->has('totalPrice')) {
            switch ($request->totalPrice) {
                case 1:
                    $orders = Orders::all();
                    break;
                case 2:
                    $orders = Orders::where('total_price', '<', 10000000)->get();
                    break;
                case 3:
                    $orders = Orders::where('total_price', '>=', 10000000)->where('total_price','<=',15000000)->get();
                    break;
               case 4:
                    $orders = Orders::where('total_price', '>=', 15000000)->where('total_price','<=',20000000)->get();
                    break;
                case 5 :
                    $orders = Orders::where('total_price', '>=', 20000000)->where('total_price','<=',25000000)->get();
                    break;
                case 6 :
                    $orders = Orders::where('total_price','>=',25000000)->get();
                    break;
            }
        }
        if($request->has('statusOrder')) {
            switch ($request->statusOrder) {
                case 1:
                    $orders = Orders::all();
                    break;
                case 2:
                    $orders = Orders::where('status', '=', "Waiting checking")->get();
                    break;
                case 3:
                    $orders = Orders::where('status', '=', "Checking order")->get();
                    break;
               case 4:
                    $orders = Orders::where('status', '=', "Waiting for the goods")->get();
                    break;
                case 5 :
                    $orders = Orders::where('status', '=', "Shipping")->get();
                    break;
                case 6 :
                    $orders = Orders::where('status','=',"Shipped")->get();
                    break;
                case 7 :
                    $orders = Orders::where('status','=',"Cancel")->get();
                    break;
            }
        }
        if($request->has('paymentMethod')) {
            switch ($request->paymentMethod) {
                case 1:
                    $orders = Orders::all();
                    break;
                case 2:
                    $orders = Orders::where('payment_method', '=', "COD")->get();
                    break;
                case 3:
                    $orders = Orders::where('payment_method', '>=', "Debit Card")->get();
                    break;
                }
            }
       

        return view('admin.orders.index', ['orders' => $orders]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['customers'] = $this->customers->find($id);
        $data['orders'] = Orders::where('id_customer',$id)->get();
        $data['orders_details'] = $this->orderdetails->getAll();
        return view('admin.orders.show',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if ($request->status == 'Shipping') {
            $this->orders->update($id, array_merge(['status' => $request->status, 'ship_date' => date('Y-m-d')]));
           
        } else {
            $this->orders->update($id, array_merge(['status' => $request->status, 'ship_date' => date('Y-m-d')]));
        }
        return redirect()->route('orders.index')->with('success', 'Update successs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
