<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $categories = Categories::all();
        $brands = Brands::all();
        return view('admin.products.index', array('products' => $products, 'categories' =>$categories, 'brands' => $brands));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $brands = Brands::all();
        return view('admin.products.create', array('categories' => $categories, 'brands' => $brands));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = $this->doUpload($request);
        $data = array_merge($request->all(), ["anh" => $fileName]);
        $products = $this->products->create($data);
        // $products = Product::create(array_merge($request->all(), ["anh" =>$fileName]));
        if ($products) {
            return redirect()->route('products.index');
        }
        return redirect()->route('products.create');
    }

    private function doUpload(Request $request)
    {
        $fileName = "";
        //Kiểm tra file
        if ($request->file('anh')->isValid()) {
			// File này có thực, bắt đầu đổi tên và move
			$fileExtension = $request->file('anh')->getClientOriginalExtension(); // Lấy . của file
			
			// Filename cực shock để khỏi bị trùng
			$fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
						
			// Thư mục upload
			$uploadPath = public_path('/upload'); // Thư mục upload
			
			// Bắt đầu chuyển file vào thư mục
			$request->file('anh')->move($uploadPath, $fileName);
		}
		else {
        }
        return $fileName;
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
