<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function getHome(){
        $data['brands_image'] = Brands::all();
        $data['products'] = Products::all();
        return view('frontend.index',$data);
    }

    public function getCategory($id){
        $data['cate_name'] = Categories::find($id);
        $data['products'] = Products::all();
        return view('frontend.category',$data);
        
    }

    public function getBrand($id){
        $data['brands'] = Brands::find($id);
        $data['products_brand'] = Products::where('id_brand',$id)->get();
        return view('frontend.brands',$data);
    }

    public function getDetail($id){
        $data['items'] = Products::find($id);
        $data['comments'] = Comments::where('id_product',$id)->get();
        return view('frontend.details', $data);
    }

    public function getSearch(Request $request){
        $result = $request->result;
        $result = str_replace(' ', '%', $result); //bỏ khoảng trắng
        $data['items'] = Products::where('name_product','like','%'.$result.'%')->get();
        $data['keyword'] = $result;
        $data['count'] = $data['items']->count();
        return view('frontend.search',$data);
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

            dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }


}
