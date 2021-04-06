@extends('layouts.admin')
@section('title','Discount')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách sản phẩm được giảm giá</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="col-lg-6 right">
                                <div style="margin-top:20px; margin-bottom:20px">
                                    <a href="{{ route('discount.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
                                </div>

                                <!-- add modal -->

                            </div>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Phần trăm(%) giảm giá</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($discount as $product_discount)
                                    <tr style="text-align: center;">
                                        <td>{{ $product_discount->id}}</td>
                                        <td>{{ $product_discount->products->name_product}}</td>
                                        <td><img src="{{asset('upload/'. $product_discount->products->image1)}}" width="120px" height="120px"></td>
                                        
                                        <td>{{ $product_discount->discount_percent}}</td>
                                        <td>
                                            <div class="row action-button" style="padding-left: 10px; padding-right:10px">
                                                <!-- edit button -->
                                                <div class="action-edit">
                                                    <p><a href="{{ route('discount.edit', $product_discount->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a></p>

                                                </div>
                                                <!-- delete button -->
                                                <div class="action-delete">
                                                    <form action="{{ route('discount.destroy', $product_discount->id) }}" method="post">
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
@stop