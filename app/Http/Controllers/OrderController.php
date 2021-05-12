<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Orderdetails;
use App\Models\Orders;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\OrderEloquentRepository;
use App\Repositories\CustomerEloquentRepository;
use App\Repositories\OrderDetailEloquentRepository;

class OrderController extends Controller
{

    protected $orders;
    protected $customers;
    protected $orderdetails;

    public function __construct(
        OrderEloquentRepository $orders,
        CustomerEloquentRepository $customers,
        OrderDetailEloquentRepository $orderdetails
    ) {
        $this->orders = $orders;
        $this->customers = $customers;
        $this->orderdetails = $orderdetails;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $paginate = 10;
        $orders = $this->orders->getAll();
        $orders = Orders::paginate($paginate);
        $customers = $this->orders->getAll();
            if($request->has('totalPrice')) {
            switch ($request->totalPrice) {
                case 1:
                    $orders = Orders::paginate($paginate);
                    break;
                case 2:
                    $orders = Orders::where('total_price', '<', 10000000)->paginate($paginate);
                    break;
                case 3:
                    $orders = Orders::where('total_price', '>=', 10000000)->where('total_price','<=',15000000)->paginate($paginate);
                    break;
               case 4:
                    $orders = Orders::where('total_price', '>=', 15000000)->where('total_price','<=',20000000)->paginate($paginate);
                    break;
                case 5 :
                    $orders = Orders::where('total_price', '>=', 20000000)->where('total_price','<=',25000000)->paginate($paginate);
                    break;
                case 6 :
                    $orders = Orders::where('total_price','>=',25000000)->paginate($paginate);
                    break;
            }
        }
        if($request->has('statusOrder')) {
            switch ($request->statusOrder) {
                case 1:
                    $orders = Orders::paginate($paginate);
                    break;
                case 2:
                    $orders = Orders::where('status', '=', "Waiting checking")->paginate($paginate);
                    break;
                case 3:
                    $orders = Orders::where('status', '=', "Checking order")->paginate($paginate);
                    break;
               case 4:
                    $orders = Orders::where('status', '=', "Waiting for the goods")->paginate($paginate);
                    break;
                case 5 :
                    $orders = Orders::where('status', '=', "Shipping")->paginate($paginate);
                    break;
                case 6 :
                    $orders = Orders::where('status','=',"Shipped")->paginate($paginate);
                    break;
                case 7 :
                    $orders = Orders::where('status','=',"Cancel")->paginate($paginate);
                    break;
            }
        }
        if($request->has('paymentMethod')) {
            switch ($request->paymentMethod) {
                case 1:
                    $orders = Orders::paginate($paginate);
                    break;
                case 2:
                    $orders = Orders::where('payment_method', '=', "COD")->paginate($paginate);
                    break;
                case 3:
                    $orders = Orders::where('payment_method', '>=', "Debit Card")->paginate($paginate);
                    break;
                }
            }

        return view('admin.orders.index', ['orders' => $orders, 'customers' => $customers]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $paginate = 10;
        $data['customers'] = $this->customers->find($id);
        $data['orders'] = Orders::where('id_customer', $id)->paginate($paginate);
        $data['orders_details'] = $this->orderdetails->getAll();
        return view('admin.orders.show', $data);
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
        return redirect()->route('orders.index')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orders->delete($id);
        return redirect()->route('orders.index')->with('success', 'Delete successfully');
    }
}
