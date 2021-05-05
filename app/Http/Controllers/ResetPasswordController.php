<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
  public function getPassword(Request $request, $token)
  {
    return view('frontend.reset', ['token' => $token, 'email' => $request->email]);
    // return dd(['token' => $token, 'email' => $request->email]   );
  }

  public function updatePassword(Request $request)
  {
    $request->validate([
      'email' => 'required|email|exists:customers',
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required',

    ]);

    $updatePassword = DB::table('password_resets')
      ->where(['email' => $request->email, 'token' => $request->token])
      ->first();

    if (!$updatePassword)
      return back()->withInput()->with('error', 'Invalid token!');

    Customers::where('email', $request->email)
      ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email' => $request->email])->delete();
    if (app()->getLocale() == 'en') {
      return redirect('/')->with('success', 'Your password has been changed!');
    }else{
      return redirect('/')->with('success', 'Mật khẩu của bạn đã được thay đổi!');
    }
  }
}
