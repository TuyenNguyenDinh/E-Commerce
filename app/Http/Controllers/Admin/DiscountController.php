<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Products;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        define('paginate', 2);
        $products = Products::paginate(paginate);
        return view('admin.discount.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $products = Products::all();
        // return view('admin.discount.create', array('products' => $products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $data = array_merge($request->all());
        // $result = Discount::create($data);
        // // $pro = Products::where('id',$result->id_product)->update(array('email' => $newEmail));
        // // if ($result) {
        // //     return redirect()->route('discount.index');
        // // }
        // // return redirect()->route('discount.create');
        // return dd($pro);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Products::find($id);
        return view('admin.discount.edit', ['discount' => $discount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $products = Products::find($id);
        $old_price = $request->old_price;
        $price = $old_price * ((100 - $request->discount) / 100);
        $products->update(array_merge($request->all(),['old_price' => $old_price, 'price' => $price]));
        if($products){
            return redirect()->route('discount.index');
        }
        return redirect()->route('admin.discount.edit');
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
