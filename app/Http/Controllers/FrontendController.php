<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getHome(){
        $data['brands_image'] = Brands::all();
        return view('frontend.index',$data);
    }
}
