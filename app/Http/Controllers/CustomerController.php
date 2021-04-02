<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use App\Models\District;
use App\Models\Province;
use CKSource\CKFinder\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function getLogin()
    {
        return view('frontend.login');
    }

    public function getRegister()
    {
        $pr = Province::all();
        return view('frontend.register', ['pr' => $pr]);
    }

    public function GetSubCatAgainstMainCatEdit($id){
        echo json_encode(DB::table('district')->where('id_province',$id)->get());
    }

    public function register(RegisterRequest $request)
    {
        // $query = Province::select("*");
        // if($request->has('province')){
        //     $query->where('id','like',$request->province)->get();
        // }

        $customer = new Customers;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->address = $request->address;
        $customer->id_district = $request->province;
        $customer->id_province = $request->district;
        $customer->image_acc = 'image_user.jpg';
        $customer->save();

        alert('Register success', 'Tạo tài khoản thành công, vui lòng đăng nhập!', 'success');

        return redirect('/');
    }

    public function getInfo()
    {
        $data['id'] = Auth::guard('customer')->user()->id;
        $data['name'] = Auth::guard('customer')->user()->name;
        $data['mail'] = Auth::guard('customer')->user()->email;
        $data['phone'] = Auth::guard('customer')->user()->phone;
        $data['address'] = Auth::guard('customer')->user()->address;
        $data['provinces'] = Province::all();
        $data['district'] = District::where('id_province', '')->get();
        return view('frontend.profile', $data);
    }
}
