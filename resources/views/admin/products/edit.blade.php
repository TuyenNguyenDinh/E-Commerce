@extends('layouts.admin')
@section('main')
@section('title','Edit Products')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa sản phẩm</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('products.update', $products->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                <div class="form-group">
									<label>Danh mục</label>
									<select type="number" name="id_category" class="form-control">
										@foreach ($categories as $category)
										<option @if($products->id_category == $category->id) selected @endif value="{{ $category->id}}">{{ $category->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Tên thương hiệu</label>
									<select type="number" name="id_brand" class="form-control">
										@foreach ($brands as $brand)
										<option @if($products->id_brand == $brand->id) selected @endif value="{{ $brand->id}}">{{ $brand->name}}</option>
										@endforeach
									</select>
								</div>
                                    <label>Tên</label>
                                    <input type="text" name="name_product" value="{{ $products->name_product }}" class="form-control">
                                    @if ($errors->has('name'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('name')}}</strong></br>
									</span>
									@endif
                                </div>
                                <div class="form-group">
									<label>Ảnh sản phẩm ()</label>
									<input type="file" name="image1" required="true" id="task-name" class="form-control" multiple>
									<input type="file" name="image2" required="true" id="task-name" class="form-control">
									<input type="file" name="image3" required="true" id="task-name" class="form-control">
									<input type="file" name="image4" required="true" id="task-name" class="form-control">
									@if ($errors->has('image1'))
									<span class="help-block">
										<strong style="color: red;"> {{ $errors->first('anh')}}</strong>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Giá sản phẩm</label>
									<input type="number" name="price" class="form-control" value="{{ $products->price}}">
									@if ($errors->has('price'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('price')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Số lượng</label>
									<input type="number" name="quantity" class="form-control" value="{{ $products->quantity}}">
									@if ($errors->has('quantity'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('quantity')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Trọng lượng</label>
									<input type="number" name="weight" class="form-control" value="{{ $products->weight}}">
									@if ($errors->has('weight'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('weight')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Độ dài</label>
									<input type="text" name="lenght" class="form-control" value="{{ $products->lenght}}">
									@if ($errors->has('lenght'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('lenght')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Độ cao</label>
									<input type="text" name="height" class="form-control" value="{{ $products->height}}">
									@if ($errors->has('height'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('height')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Độ rộng</label>
									<input type="text" name="width" class="form-control" value="{{ $products->width}}">
									@if ($errors->has('width'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('width')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Miêu tả</label><br>
									<textarea name="description" class="ckeditor"></textarea>
									@if ($errors->has('description'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('description')}}</strong></br>
									</span>
									@endif
								</div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                <a href="{{ route('categories.index')}}" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                        </>
                        <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@stop