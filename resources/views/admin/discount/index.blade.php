@extends('layouts.admin')
@section('title','Products Discount')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List products</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <th>Name product</th>
                                    <th>Image</th>
                                    <th>Current price</th>
                                    <th>Discount percent</th>
                                    <th>New price</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr style="text-align: center;">
                                    <td>{{ $product->id}}</td>
                                    <td>{{ $product->name_product}}</td>
                                    <td><img src="../upload/{{ $product->image1 }}" width="120" height="120" /></td>
                                    <td>{{number_format($product->old_price,0,',','.')}} đ</td>
                                    <td>{{ $product->discount }}%</td>
                                    <td>{{number_format($product->price,0,',','.')}} đ</td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('discount.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                <th>ID</th>
                                    <th>Name product</th>
                                    <th>Image</th>
                                    <th>Current price</th>
                                    <th>Discount percent</th>
                                    <th>New price</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="pagination">
                            {{$products->links()}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection