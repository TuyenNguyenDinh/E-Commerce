<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;


class AuthController extends Controller
{
    public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

public function handleFacebookCallback()
{
    try {
        $customer = Socialite::driver('facebook')->user();
        $create['name'] = $customer->name;
        $create['email'] = $customer->email;
        $create['facebook_id'] = $customer->id;

        $customerModel = new Customers();
        $createCustomer = $customerModel->addNew($create);
        Auth::loginUsingId($createCustomer->id);
        return redirect()->route('home');
    } catch (Exception $e) {
        return redirect('/');
    }
}
}
