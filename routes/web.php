<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/category/{id}.html', 'FrontendController@getCategory');
Route::get('details/{id}.html', 'FrontendController@getDetail');
Route::get('search','FrontendController@getSearch');

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
    });
});

//Authen customer
Route::get('/', 'CustomerController@getLogin');
Route::post('/', 'CustomerController@postLogin');