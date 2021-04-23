<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Discount;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ProductEloquentRepository;
use App\Repositories\BrandEloquentRepository;
use App\Repositories\CategoryEloquentRepository;

class ProductController extends Controller
{

    protected $products;
    protected $brands;
    protected $categories;

    public function __construct(ProductEloquentRepository $products,
                                BrandEloquentRepository $brands,
                                CategoryEloquentRepository $categories)
    {
        $this->products = $products;
        $this->brands = $brands;
        $this->categories = $categories;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->getAll();
        $categories = $this->categories->getAll();
        $brands = $this->brands->getAll();

        return view('admin.products.index', array(
            'products' => $products,
            'categories' => $categories, 'brands' => $brands
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories->getAll();
        $brands = $this->brands->getAll();
        return view('admin.products.create', array('categories' => $categories, 'brands' => $brands));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $fileName1 = $this->products->doUpload($request->file('image1'));
        $fileName2 = $this->products->doUpload($request->file('image2'));;
        $fileName3 = $this->products->doUpload($request->file('image3'));;
        $fileName4 = $this->products->doUpload($request->file('image4'));;
        $old_price = $request->price;
        $price = $old_price;
        $products = $this->products->create(array_merge($request->all(),["old_price" => $old_price],
         ["price" => $price],
         ["discount" => 0],
         ["image1" =>$fileName1], ["image2" => $fileName2], 
         ["image3" => $fileName3], ["image4" => $fileName4]));

        return response()->json($products);
        // return redirect()->route('products.create');
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categories->getAll();
        $products = $this->products->find($id);
        $brands = $this->brands->getAll();
        return view('admin.products.edit', array('products' => $products, 'categories' => $categories, 'brands' => $brands));
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
        $fileName1 = $this->products->doUpload($request->file('image1'));
        $fileName2 = $this->products->doUpload($request->file('image2'));;
        $fileName3 = $this->products->doUpload($request->file('image3'));;
        $fileName4 = $this->products->doUpload($request->file('image4'));;
        $products = $this->products->update($id,array_merge($request->all(),["discount" => 0],["image1" =>$fileName1], ["image2" => $fileName2], ["image3" => $fileName3], ["image4" => $fileName4]));
        if($products){
            return redirect()->route('products.index');
        }
        return redirect()->route('admin.products.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->products->delete($id);
        // return redirect()->route('products.index');
        return response()->json("ok");
    }
}
