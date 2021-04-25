<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend
Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', 'FrontendController@changeLanguage')->name('user.change-language');
    Route::get('/', 'FrontendController@getHome');
    Route::get('category/{id}.html', 'FrontendController@getCategory');
    Route::get('brands/{id}.html', 'FrontendController@getBrand');
    Route::get('details/{id}.html', 'FrontendController@getDetail');
    Route::get('getFeeProvince/{id}', 'FrontendController@getFeeProvince');
    Route::get('product', 'FrontendController@getSearch');
    Route::get('forget-password', 'CustomerController@getEmail');
    Route::post('forget-password', 'CustomerController@postEmail');
    Route::get('/reset-password/{token}/{email}', 'ResetPasswordController@getPassword');
    Route::post('/reset-password', 'ResetPasswordController@updatePassword');

    // Wishlist
    Route::group(['middleware' => 'checklogin'], function () {
        // Alert::alert('Logout', 'Logout success', 'success');
        Route::get('wishlist.html', 'FrontendController@getWishlist');
        Route::get('wishlist/add/{id}.html', 'FrontendController@addWishlist');
        Route::get('wishlist/delete/{id}.html', 'FrontendController@deleteWishItems');
    });

    //Authentication customer
    Route::post('/', 'FrontendController@postLogin');
    // Route::get('/','FrontendController@getLogin');
    Route::get('registercustomer', 'CustomerFrontendController@getRegister');
    Route::post('registercustomer', 'CustomerFrontendController@register');
    Route::get('GetSubCatAgainstMainCatEdit/{id}', 'CustomerFrontendController@GetSubCatAgainstMainCatEdit');

    Route::group(['middleware' => 'checklogin', 'prefix' => 'user/account'], function () {
        Route::get('profile', 'CustomerFrontendController@getInfo');
        Route::get('orders', 'CustomerFrontendController@getOrders');
        Route::put('orders/{id}', 'CustomerFrontendController@postCancelOrders')->name('cancel_orders');
        Route::get('orders/tracking/{id}', 'CustomerFrontendController@trackingOrders')->name('tracking_orders');
        Route::post('change_profile', 'CustomerFrontendController@changeProfile')->name('changeProfile');
        Route::post('verify_email', 'CustomerFrontendController@verifyEmail')->name('verifyemail');
        Route::get('change_email', 'CustomerFrontendController@getChangeEmail')->name('changeEmail');
        Route::post('change_email', 'CustomerFrontendController@changeEmail');
        Route::post('verify_phone', 'CustomerFrontendController@verifyPhone')->name('verifyphone');
        Route::get('change_phone', 'CustomerFrontendController@getChangePhone')->name('changePhone');
        Route::post('change_phone', 'CustomerFrontendController@changePhone');
        Route::get('GetDistrict/{id}', 'CustomerFrontendController@GetSubCatAgainstMainCatEdit');
        Route::post('changeProvinceDistrict', 'CustomerFrontendController@changeProvinceDistrict')->name('changeProvinceDistrict');
    });

    Route::group(['middleware' => 'checklogin', 'prefix' => 'cart'], function () {
        Route::get('add/{id}', 'CartController@getAddCart');
        Route::get('show', 'CartController@getShowCart')->name('cartshow');
        Route::get('delete/{id}', 'CartController@getDeleteCart');
        Route::get('update', 'CartController@getUpdateCart');
        Route::get('cartdata', 'CartController@cartdata')->name('cartdata');
        Route::get('checkout', 'CartController@getCheckout')->name('checkout');
        Route::post('checkout', 'PurchaseController@postPurchase')->name('purchase');
        Route::post('add-address', 'CartController@addAddress')->name('addAddress');
        Route::get('getFeeFromProvince/{id}', 'CartController@getFeeFromProvince');
    });

    Route::get('complete', 'PurchaseController@getComplete')->name('complete');
});





// Backend
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('products', 'ProductController');
    Route::resource('users', 'UserController');
    Route::resource('customers', 'CustomerController');
    Route::resource('discount', 'DiscountController');
    Route::resource('orders', 'OrderController');
    Route::resource('orderdetails', 'OrderDetailController');
});


// Authenticate

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');
    Route::resource('customers', 'CustomerController');
    Route::resource('discount', 'DiscountController');
    Route::get('customers/{id}/orders', 'OrderController@getOrders');
    Route::resource('orders', 'OrderController');
    // Route::get('orders/{$id}/details', 'OrderDetailController@show');
    Route::resource('orderdetails', 'OrderDetailController');
});


Auth::routes();
Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');

Route::get('/admin', 'HomeController@index')->name('admin');
