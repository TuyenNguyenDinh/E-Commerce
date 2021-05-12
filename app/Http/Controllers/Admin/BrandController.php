<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\BrandRequest;
use App\Repositories\BrandEloquentRepository;
class BrandController extends Controller
{

    protected $brands;
     public function __construct(BrandEloquentRepository $brands)
     {
        $this->brands = $brands;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 10;
        $brands = $this->brands->getAll();
        $brands = Brands::paginate($paginate);
        return view('admin.brands.index', array('brands' => $brands));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $fileName = $this->brands->doUpload($request->file('image'));
        $data = $this->brands->create(array_merge($request->all(),['image' => $fileName]));
        return response()->json($data);        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = $this->brands->find($id);
        return view('admin.brands.edit', array('brands' => $brands));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        
        $fileName = $this->brands->doUpload($request->file('image'));
        $result = $this->brands->update($id, array_merge($request->all(), ['image' => $fileName]));
       
        return response()->json($result);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->brands->unlinkfile($id, 'image');
        $this->brands->delete($id);
        return response()->json("ok");
    }
}


