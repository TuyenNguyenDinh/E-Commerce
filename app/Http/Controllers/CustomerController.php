<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;

class CustomerController extends Controller
{

    public function getLogin(){
        return view ('frontend.login');
    }


    public function register(Request $request){
        $customer = new Customers;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();
    }

    public function getRegister(){
        return view('frontend.register');
    }
}
