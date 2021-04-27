<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use App\Models\Orderdetails;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Province;
use App\Models\Transport_fee;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class CustomerFrontendController extends Controller
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

    public function Logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }

    public function GetSubCatAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('district')->where('id_province', $id)->get());
    }

    public function register(RegisterRequest $request)
    {
        $customer = new Customers;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->address = $request->address;
        $customer->id_district = $request->district;
        $customer->id_province = $request->province;
        $customer->image_acc = 'img_user.jpg';
        $customer->save();

        alert('Register success', 'Tạo tài khoản thành công, vui lòng đăng nhập!', 'success');

        return redirect('/');
    }



    // Login social
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }

    protected function _registerOrLogin($data)
    {
        $customer = Customers::where('email', '=', $data->email)->first();
        if (!$customer) {
            $customer = new Customers();
            $customer->name = $data->name;
            $customer->email = $data->email;
            $customer->provider_id = $data->id;
            $customer->image_acc = $data->avatar;
            $customer->save();
        }
        Auth::guard('customer')->login($customer);
    }

    // end


    public function getInfo()
    {
        $data['id'] = Auth::guard('customer')->user()->id;
        $data['cus'] = Customers::find($data['id']);
        $data['pr'] = Province::all();
        return view('frontend.infoacc', $data);
        // return dd($data);

    }

    public function changeProfile(Request $request)
    {
        $id = Auth::guard('customer')->user()->id;
        $fileName = $this->doUpload($request);
        $customers = Customers::find($id);
        $data = array_merge($request->all(), ["image_acc" => $fileName]);
        $customers->update($data);
        if ($customers) {
            Alert::success('Thành công', 'Cập nhật hồ sơ thành công');
            return redirect('/');
        } else {
            Alert::warring('Lỗi', 'Có lỗi');
            return redirect('/');
        }
    }


    public function getOrders()
    {
        $data['id'] = Auth::guard('customer')->user()->id;
        $data['cus'] = Customers::find($data['id']);
        $data['orders'] = Orders::where('id_customer', $data['id'])->get();
        $data['order_details'] = Orderdetails::all();
        $data['waiting_check'] = Orders::where('id_customer', $data['id'])->where('status', "Checking order")->get();
        $data['waiting_the_goods'] = Orders::where('id_customer', $data['id'])->where('status', "Waiting for the goods")->get();
        $data['shipping'] = Orders::where('id_customer', $data['id'])->where('status', "Shipping")->get();
        $data['shipped'] = Orders::where('id_customer', $data['id'])->where('status', "Shipped")->get();
        $data['cancel'] = Orders::where('id_customer', $data['id'])->where('status', "Cancel")->get();
        $data['rating'] = Comments::all();

        return view('frontend.orders', $data);
    }

    private function doUpload(Request $request)
    {
        $fileName = "";
        //Kiểm tra file
        if ($request->file('image_acc')->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image_acc')->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $request->file('image_acc')->move($uploadPath, $fileName);
        } else {
        }
        return $fileName;
    }
    public function verifyEmail(Request $request)
    {
        $password = $request->verifyemail;
        $user = Customers::where('email', '=', Auth::guard('customer')->user()->email)->first();

        if (Hash::check($password, $user->password)) {
            return response()->json(['success' => 'Form is successfully submitted!']);
        } else {
            return response()->json(['error' => 'not!']);
        }
    }

    public function getChangeEmail()
    {
        $data['id'] = Auth::guard('customer')->user()->id;
        $data['cus'] = Customers::find($data['id']);
        return view('frontend.change_email', $data);
    }

    public function changeEmail(Request $request)
    {
        $newEmail = $request->changeEmail;
        $email = Customers::where('email', '=', Auth::guard('customer')->user()->email)
            ->update(array('email' => $newEmail));
        Alert::success('Success', 'Change email successfully');
        return redirect("/");
    }

    public function verifyPhone(Request $request)
    {
        $password = $request->verifyphone;
        $user = Customers::where('phone', '=', Auth::guard('customer')->user()->phone)->first();

        if (Hash::check($password, $user->password)) {
            return response()->json(['success' => 'Form is successfully submitted!']);
        } else {
            return response()->json(['error' => 'not!']);
        }
    }


    public function getChangePhone()
    {
        $data['id'] = Auth::guard('customer')->user()->id;
        $data['cus'] = Customers::find($data['id']);
        return view('frontend.change_phone', $data);
    }

    public function changePhone(Request $request)
    {
        $newPhone = $request->changePhone;
        Customers::where('phone', '=', Auth::guard('customer')->user()->phone)
            ->update(array('phone' => $newPhone));
        Alert::success('Thành công', 'Đổi số điện thoại thành công');
        return redirect("/");
    }

    public function changeProvinceDistrict(Request $request)
    {
        $newProvince = $request->province;
        $newDistrict = $request->district;
        Customers::where('id_province', '=', Auth::guard('customer')->user()->id_province)
            ->update(array('id_province' => $newProvince, 'id_district' => $newDistrict));
        Alert::success('Thành công', 'Đổi số điện thoại thành công');
        return redirect("/");
    }


    public function getEmail()
    {
        return view('frontend.email');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('frontend.verify', ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
        return redirect('/')->with('success', 'Send mail success, please check your mail to reset password');
    }

    public function postCancelOrders(Request $request, $id)
    {
        $reasons = $request->reasons;
        Orders::find($id)->update(array_merge(['status' => 'Request to cancel the order', 'reasons_cancel_order' => $reasons]));
        return redirect('user/account/orders')->with('success', 'Send successfully, please wait seller checking your reasons');
    }

    public function trackingOrders($id)
    {
        $data['id'] = Auth::guard('customer')->user()->id;
        $data['cus'] = Customers::find($data['id']);
        $orders = Orders::find($id);
        $data['order_details'] = Orderdetails::where('id_order', $id)->get();
        $data['fee_transport'] = Transport_fee::all();
        return view('frontend.tracking', $data, ['orders' => $orders]);
    }

    public function postComments(Request $request, $id)
    {
        $data['order_details'] = Orderdetails::where('id_order', $id)->get();
        foreach ($data['order_details'] as $products) {
            $comments = new Comments();
            $comments->id_product = $products->id_product;
            $comments->id_customer = Auth::guard('customer')->user()->id;
            $comments->comments = $request->comments[$products->id];
            $comments->rate = $request->rate[$products->id];
            $comments->id_order = $products->id_order;
            $comments->updated_at = date('Y-m-d');
            $comments->created_at = date('Y-m-d');
            $comments->save();
            Products::find($products->id_product)->update(['like' => round($comments->avg('rate'))]);
        }
        return redirect('/')->with('success', 'Thank you for rated');
    }

    public function buyAgain($id){
        $product = Orderdetails::where('id_order',$id)->get();
        foreach($product as $items){
            Cart::add([
                'id' => $items->products->id, 'name' => $items->products->name_product
                , 'weight' => 0, 'qty' => 1, 'price' => $items->price
                , 'options' => ['img' => $items->products->image1, 'brands' => $items->products->brands->name
                , 'categories' => $items->products->categories->name]
            ]);
        }
        
        return redirect('cart/show');
        // return dd($items);
    }
}
