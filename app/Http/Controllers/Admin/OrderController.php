<?php

namespace App\Http\Controllers\Admin;

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

    public function index(){
        $orders = $this->orders->getAll();
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
        // $id_orders = Orders::find($id);
        // $id_orders->update(array_merge(['status' => $request->status]));
        $id_orders = $this->orders->update($id, array_merge(['status' => $request->status]));
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
