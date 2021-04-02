@extends('layouts.admin')
@section('title','Add Brands')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thương hiệu</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm thương hiệu</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Tên thương hiệu</label>
                                    <input required type="text" name="name" class="form-control">
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('name')}}</strong></br>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Ảnh thương hiệu</label>
                                    <input type="file" name="image" required="true" id="task-name" class="form-control">
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong style="color: red;"> {{ $errors->first('image')}}</strong>
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
                </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection