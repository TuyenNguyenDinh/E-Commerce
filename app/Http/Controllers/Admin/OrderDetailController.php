<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orderdetails;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Repositories\OrderDetailEloquentRepository;
use App\Repositories\OrderEloquentRepository;

class OrderDetailController extends Controller
{

    protected $orderdetails;
    protected $orders;

    public function __construct(OrderDetailEloquentRepository $orderdetails, OrderEloquentRepository $orders)
    {
        $this->orderdetails = $orderdetails;
        $this->orders = $orders;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['orders'] = $this->orders->find($id);
        $data['order_details'] = Orderdetails::where('id_order',$id)->get();
        return view('admin.orderdetails.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
