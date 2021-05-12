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
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    protected $products;
    protected $brands;
    protected $categories;

    public function __construct(
        ProductEloquentRepository $products,
        BrandEloquentRepository $brands,
        CategoryEloquentRepository $categories
    ) {
        $this->products = $products;
        $this->brands = $brands;
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 5;
        $products = $this->products->getAll();
        $products = Products::paginate($paginate);
        $categories = $this->categories->getAll();
        $brands = $this->brands->getAll();


        if ($request->has('id_brand')) {
            $products = Products::where('id_brand', $request->id_brand)->paginate($paginate);
        }

        if ($request->has('rangePriceAdmin')) {
            switch ($request->rangePriceAdmin) {
                case 1:
                    $products = Products::paginate($paginate);
                    break;
                case 2:
                    $products = Products::where('price', '<', 5000000)->paginate($paginate);
                    break;
                case 3:
                    $products = Products::where('price', '>=', 5000000)->where('price', '<=', 10000000)->paginate($paginate);
                    break;
                case 4:
                    $products = Products::where('price', '>=', 10000000)->where('price', '<=', 15000000)->paginate($paginate);
                    break;
                case 5:
                    $products = Products::where('price', '>=', 15000000)->where('price', '<=', 20000000)->paginate($paginate);
                    break;
                case 6:
                    $products = Products::where('price', '>=', 20000000)->paginate($paginate);
                    break;
            }
        }

        if ($request->has('searchAdmin')) {
            $products = Products::where('name_product', 'like', '%' . $request->searchAdmin . '%')->paginate($paginate);
        }


        return view('admin.products.index', array(
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
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


    public function getAttrCategory($id)
    {
        echo json_encode(DB::table('attributes')->where('id_category', $id)->get());
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
        $attributes = ($request->attr1 . ': ' . $request->attr_name1 . '-' . $request->attr2 . ': ' . $request->attr_name2 . '-'
            . $request->attr3 . ': ' . $request->attr_name3
            . '-' . $request->attr4 . ': ' . $request->attr_name4);
        $products = $this->products->create(array_merge(
            $request->all(),
            ["old_price" => $old_price],
            ["price" => $price],
            ["discount" => 0],
            ["image1" => $fileName1],
            ["image2" => $fileName2],
            ["image3" => $fileName3],
            ["image4" => $fileName4],
            ['attributes' => $attributes]
        ));

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
    public function update(ProductRequest $request, $id)
    {
        $fileName1 = $this->products->doUpload($request->file('image1'));
        $fileName2 = $this->products->doUpload($request->file('image2'));
        $fileName3 = $this->products->doUpload($request->file('image3'));
        $fileName4 = $this->products->doUpload($request->file('image4'));
        $attributes = ($request->attr1 . ': ' . $request->attr_name1 . '-' . $request->attr2 . ': ' . $request->attr_name2 . '-'
            . $request->attr3 . ': ' . $request->attr_name3
            . '-' . $request->attr4 . ': ' . $request->attr_name4);
        $products = $this->products->update($id, array_merge(
            $request->all(),
            ["discount" => 0],
            ["image1" => $fileName1],
            ["image2" => $fileName2],
            ["image3" => $fileName3],
            ["image4" => $fileName4],
            ['attributes' => $attributes]
        ));

        return response()->json($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $products = Products::find($id);
        $this->products->unlinkfile($id, 'image1');
        $this->products->unlinkfile($id, 'image2');
        $this->products->unlinkfile($id, 'image3');
        $this->products->unlinkfile($id, 'image4');        
        $this->products->delete($id);
        return response()->json("ok");
    }
}
