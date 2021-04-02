@extends('layouts.admin')
@section('title','Brands')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách thương hiệu</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="col-lg-6 right">
                                <div style="margin-top:20px; margin-bottom:20px">
                                    <a href="{{ route('brands.create') }}" class="btn btn-primary">Thêm thương hiệu</a>
                                </div>
                                <!-- add modal -->

                            </div>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Tên thương hiệu</th>
                                        <th>Ảnh</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr style="text-align: center;">
                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td><img src="{{asset('upload/'.$brand->image)}}" alt="" width="120px" height="120px"></td>
                                        <td>
                                            <div class="row action-button" style="padding-left: 10px;">
                                                <!-- edit button -->
                                                <div class="action-edit">
                                                    <p><a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a></p>
                                                </div>
                                                <!-- delete button -->
                                                <div class="action-delete">
                                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <p><input class="btn btn-danger" type="submit" value="Xóa"></p>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
@endsection