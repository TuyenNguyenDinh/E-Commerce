@extends('layouts.admin')
@section('main')
@section('title','Edit Brands')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Brands</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Sửa brands</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('brands.update', $brands->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ $brands->name }}" class="form-control">
                                    @if ($errors->has('name'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('name')}}</strong></br>
									</span>
									@endif
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="image"  id="task-name" class="form-control">
										@if ($errors->has('image'))
										<span class="help-block">
											<strong style="color: red;"> {{ $errors->first('image')}}</strong>
										</span>
										@endif
                                </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                <a href="{{ route('brands.index')}}" class="btn btn-danger">Hủy bỏ</a>
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