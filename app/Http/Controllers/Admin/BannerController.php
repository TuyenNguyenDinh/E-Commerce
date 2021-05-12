<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Banner::all();
        return view('admin.banner.index', ['image' => $image]);
    }


    public function uploadMultiple(Request $request)
    {

        if ($request->hasFile('file')) {
            // Upload path
            $destinationPath = 'upload/';

            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            // Valid extensions
            $validextensions = array("jpeg", "jpg", "png",);

            // Check extension
            if (in_array(strtolower($extension), $validextensions)) {

                // Rename file 
                $fileName = $request->file('file')->getClientOriginalName() . time() . '.' . $extension;
                // Uploading file to given path
                $request->file('file')->move($destinationPath, $fileName);

                $banner = new Banner();
                $banner->image = $fileName;
                $banner->save();
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Banner::find($id);
        return view('admin.banner.edit', ['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $image = $this->doUpload($request);
        $id = Banner::find($id)->update(['image' => $image]);
        return response()->json('OK');
    }


    public function doUpload(BannerRequest $request)
    {

        $fileName = "";
        //Kiểm tra file
        if ($request->file('image')->isValid()) {
            // File này có thực, bắt đầu đổi tên và move
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            // Bắt đầu chuyển file vào thư mục
            $request->file('image')->move($uploadPath, $fileName);
        } else {
        }
        return $fileName;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if (file_exists('upload/' . $banner->image))
            unlink('upload/' . $banner->image);
        $banner->delete();
        return response()->json('OK');
    }
}
