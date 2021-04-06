<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Discount;
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
        $fileName1 = $this->doUploadImage1($request);
        $fileName2 = $this->doUploadImage2($request);
        $fileName3 = $this->doUploadImage3($request);
        $fileName4 = $this->doUploadImage4($request);
        $old_price = $request->price;
        $discount = $request->discount;
        $price = $old_price * ((100 - $discount) / 100);
        $products = Products::create(array_merge($request->all(), ["old_price" => $old_price],
         ["price" => $price],
         ["discount" => $discount],
         ["image1" =>$fileName1], ["image2" => $fileName2], 
         ["image3" => $fileName3], ["image4" => $fileName4]));
        if ($products) {
            return redirect()->route('products.index');
        }
        return redirect()->route('products.create');
        
    }



    private function doUploadImage1(Request $request)
    {
        $fileName = "";
        //Kiểm tra file
        if ($request->file('image1')->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image1')->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $request->file('image1')->move($uploadPath, $fileName);
        } else {
        }

        return $fileName;
    }

    private function doUploadImage2(Request $request)
    {
        $fileName = "";
        //Kiểm tra file
        if ($request->file('image2')->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image2')->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $request->file('image2')->move($uploadPath, $fileName);
        } else {
        }

        return $fileName;
    }

    private function doUploadImage3(Request $request)
    {
        $fileName = "";
        //Kiểm tra file
        if ($request->file('image3')->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image3')->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $request->file('image3')->move($uploadPath, $fileName);
        } else {
        }

        return $fileName;
    }


    private function doUploadImage4(Request $request)
    {
        $fileName = "";
        //Kiểm tra file
        if ($request->file('image4')->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image4')->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $request->file('image4')->move($uploadPath, $fileName);
        } else {
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
        $categories = Categories::all();
        $products = Products::find($id);
        $brands = Brands::all();
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
        $fileName1 = $this->doUploadImage1($request);
        $fileName2 = $this->doUploadImage2($request);
        $fileName3 = $this->doUploadImage3($request);
        $fileName4 = $this->doUploadImage4($request);
        $products = Products::find($id);
        $products->update(array_merge($request->all(), ["image1" =>$fileName1], ["image2" => $fileName2], ["image3" => $fileName3], ["image4" => $fileName4]));
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
        $products = Products::find($id);
        $products->delete();
        return redirect()->route('products.index');
    }
}
