<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Products;
use App\Models\Province;
use App\Models\Transport_fee;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendController extends Controller
{
    public function getHome()
    {
        $data['brands_image'] = Brands::all();
        $data['products'] = Products::all();
        $data['products_selling'] = Products::where('discount','>',0)->get();
        return view('frontend.index', $data);
    }

    public function getCategory($id)
    {
        $data['cate_name'] = Categories::find($id);
        $data['products'] = Products::where('id_category',$id)->get();
        return view('frontend.category', $data);
    }

    public function getBrand($id)
    {
        $data['brands'] = Brands::find($id);
        $data['products_brand'] = Products::where('id_brand', $id)->get();
        return view('frontend.brands', $data);
    }

    public function getDetail($id)
    {
        $data['items'] = Products::find($id);
        $data['comments'] = Comments::where('id_product', $id)->get();
        $data['provinces'] = Province::all();
        $data['transport_fee'] = Transport_fee::where('id_province',Auth::guard('customer')->user()->province->id)->get();
        return view('frontend.details', $data);
    }

    public function getSearch(Request $request)
    {

        $data['brands'] = Brands::all();
        $query = Products::select(DB::raw("*"));
        if ($request->has('key')) {
            $query->where('name_product', 'like', '%' . $request->key . '%');
        }
        //sap xep
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 1: //a-z
                    $query->orderBy('name_product', 'asc');
                    break;
                case 2: //z-a
                    $query->orderBy('name_product', 'desc');
                    break;
                case 3:
                    $query->orderBy('price', 'asc');
                    break;
                case 4:
                    $query->orderBy('price', 'desc');
                    break;
            }
        }

        if ($request->has('brands')) {
            $query->where('id_brand', 'like', $request->brands);
        }

        if ($request->has('rangePrice')) {
            switch ($request->rangePrice) {
                case 1:
                    $query->where('price', '<', 5000000);
                    break;
                case 2:
                    $query->where('price', '>=', 5000000)->where('price','<=',10000000);
                    break;
               case 3:
                    $query->where('price', '>=', 10000000)->where('price','<=',15000000);
                    break;
                case 4 :
                    $query->where('price', '>=', 15000000)->where('price','<=',20000000);
                    break;
                case 5 :
                    $query->where('price','>=',20000000);
                    break;
            }
        }


        $listProduct = $query->paginate(2);
        return view('frontend.search', ['listProduct' => $listProduct], $data);
    }

    public function indexFiltering(Request $request)
    {
        $filter = $request->query('filter');

        if (!empty($filter)) {
            $products = Products::sortable()
                ->where('products.name', 'like', '%' . $filter . '%')
                ->paginate(5);
        } else {
            $products = Products::sortable()
                ->paginate(5);
        }

        return view('products.index-filtering')->with('products', $products)->with('filter', $filter);
    }


    public function postLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('customer')->attempt($arr)) {
            return redirect('/');
        } else {
            return redirect('/')->with('warning', 'Tài khoản hoặc mật khẩu không đúng.');
        }
    }

    public function getWishlist()
    {
        $id = Auth::guard('customer')->user()->id;
        $data['wishlist'] = Wishlist::where('id_customer', $id)->get();
        return view('frontend.wishlist', $data);
    }

    public function addWishlist($id)
    {
        $product = Products::find($id);
        $wishlist = new Wishlist();
        $wishlist->id_customer = Auth::guard('customer')->user()->id;
        $wishlist->id_product = $product->id;
        $wishlist->price = $product->price;
        $wishlist->quantity = $product->quantity;
        $wishlist->save();

        return redirect('wishlist.html');
    }

    public function deleteWishItems($id)
    {
        Wishlist::find($id)->delete();
        return redirect('/')->with('success', 'Xóa thành công!.');
    }
}
