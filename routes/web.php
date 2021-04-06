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
Route::get('/','FrontendController@getHome');
Route::get('category/{id}.html', 'FrontendController@getCategory');
Route::get('brands/{id}.html','FrontendController@getBrand');
Route::get('details/{id}.html', 'FrontendController@getDetail');
Route::get('product','FrontendController@getSearch');


// Wishlist
Route::group(['middleware' => 'checklogin'], function(){
    // Alert::alert('Logout', 'Logout success', 'success');
    Route::get('wishlist.html','FrontendController@getWishlist');
    Route::get('wishlist/add/{id}.html','FrontendController@addWishlist');
    Route::get('wishlist/delete/{id}.html','FrontendController@deleteWishItems');
});

;

//Backend
Route::group(['namespace' => 'Admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('index');
        Route::resource('categories', 'CategoryController');
        Route::resource('brands','BrandController');
        Route::resource('products', 'ProductController');
        Route::resource('users', 'UserController');
        Route::resource('customers', 'CustomerController');
        Route::resource('discount', 'DiscountController');
    });
});

//Authentication customer
Route::post('/', 'FrontendController@postLogin');
// Route::get('/','FrontendController@getLogin');
Route::get('registercustomer','CustomerController@getRegister');
Route::post('registercustomer', 'CustomerController@register');
Route::get('GetSubCatAgainstMainCatEdit/{id}','CustomerController@GetSubCatAgainstMainCatEdit');

Route::group(['middleware' => 'checklogin', 'prefix' => 'user/account'], function(){
    Route::get('profile','CustomerController@getInfo');
    Route::post('change_profile','CustomerController@changeProfile')->name('changeProfile');
    Route::post('verify_email', 'CustomerController@verifyEmail')->name('verifyemail');
    Route::get('change_email', 'CustomerController@getChangeEmail')->name('changeEmail');
    Route::post('change_email','CustomerController@changeEmail');
    Route::post('verify_phone','CustomerController@verifyPhone')->name('verifyphone');
    Route::get('change_phone', 'CustomerController@getChangePhone')->name('changePhone');
    Route::post('change_phone','CustomerController@changePhone');
    Route::get('GetDistrict/{id}','CustomerController@GetSubCatAgainstMainCatEdit');
    Route::post('changeProvinceDistrict','CustomerController@changeProvinceDistrict')->name('changeProvinceDistrict');
});

Route::group(['middleware' => 'checklogin', 'prefix' => 'cart'], function(){
    Route::get('add/{id}', 'CartController@getAddCart');
    Route::get('show','CartController@getShowCart');
    Route::get('delete/{id}', 'CartController@getDeleteCart');
    Route::get('update', 'CartController@getUpdateCart');
    Route::post('show', 'CartController@postComplete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
