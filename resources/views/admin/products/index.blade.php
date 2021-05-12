@extends('layouts.admin')
@section('title','Products')
@section('main')
<?php
$rangePriceAdmin = request()->get('rangePriceAdmin');
?>
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
                    <li class="breadcrumb-item active">List Products</li>
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
                        <h3 class="card-title">Filter</h3>

                        <table class="table">
                            <thead>
                                <tr class="filters">
                                    <th>Brands
                                        <form id="form_find" method="get">
                                            <select id="assigned-user-filter" name="id_brand" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                <option value="0" selected>Choose brand</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" style="display: none;">sub</button>
                                        </form>
                                    </th>
                                    <th>Price
                                        <form method="get">
                                            <select id="assigned-user-filter" name="rangePriceAdmin" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                <option value="0" selected>Choose range price</option>
                                                <option {{($rangePriceAdmin==1)?'selected':""}} value="1">
                                                    {{ __('All')}}
                                                </option>
                                                <option {{($rangePriceAdmin==2)?'selected':""}} value="2">
                                                    {{ __('Less 5.000.000 đ')}}
                                                </option>
                                                <option {{($rangePriceAdmin==3)?'selected':""}} value="3">
                                                    {{ __('5 - 10.000.000 đ')}}
                                                </option>
                                                <option {{($rangePriceAdmin==4)?'selected':""}} value="4">
                                                    {{ __('10 - 15.000.000 đ')}}
                                                </option>
                                                <option {{($rangePriceAdmin==5)?'selected':""}} value="5">
                                                    {{ __('15 -20.000.000 đ')}}
                                                </option>
                                                <option {{($rangePriceAdmin==6)?'selected':""}} value="6">
                                                    {{ __('20.000.000 đ more')}}
                                                </option>
                                            </select>
                                            <button type="submit" style="display: none;">sub</button>
                                        </form>
                                    </th>
                                    <th>Search
                                        <form class="d-flex flex-row" id="assigned-user-filter" name="searchAdmin" method="GET" action="{{asset('/admin/products')}}">
                                            <input class="form-control" type="search" placeholder="Search here" name="searchAdmin" aria-label="Search" required>
                                            <button type="submit" class="btn btn-primary search-btn">Search</button>
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(count($products) != 0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <th>Categories</th>
                                    <th>Brands</th>
                                    <th>Name Products</th>
                                    <th>Image</th>
                                    <th width='11%'>Price</th>
                                    <th>Old Price</th>
                                    <th>Quanity</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr style="text-align: center;">
                                    <td>{{ $product->id}}</td>
                                    <td>{{ $product->categories->name}}</td>
                                    <td>{{ $product->brands->name}}</td>
                                    <td>{{ $product->name_product}}</td>
                                    <td><img src="{{ asset('upload/'.$product->image1) }}" width="120" height="120" /></td>
                                    <td>{{number_format($product->price,0,',','.')}} đ</td>

                                    <td>{{number_format($product->old_price,0,',','.')}} đ</td>
                                    <td>{{ $product->quantity}}</td>
                                    <!-- <td class="label_title">
                                        <div id="description_content_{{$product->id}}">
                                        <?php echo $product->description ?>
                                        </div> -->
                                    </td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger" onclick="deletePr('{{$product->id}}')"><i class="fas fa-trash"></i></a>
                                            <form id="delete_product_{{$product->id}}" data-route="{{ route('products.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Categories</th>
                                    <th>Brands</th>
                                    <th>Name Products</th>
                                    <th>Image</th>
                                    <th width='11%'>Price</th>
                                    <th>Old Price</th>
                                    <th>Quanity</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="pagination" >
                            {{$products->links()}}
                        </div>
                        @else
                        <div class="error-page">
                            <div class="error-content">
                                <div class="wrapper">
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i>{{ __('Oops! Not found.')}}</h3>
                                </div>
                            </div>
                            <!-- /.error-content -->
                        </div>
                        @endif
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
<script>
    function deletePr(id) {
        var deletepr = document.getElementById('delete_product_' + id);
        var route = $('#delete_product_' + id).data('route');
        swal({
                title: "Delete?",
                text: "Are you sure delete this product?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'DELETE',
                        url: route,
                        processData: false, // Important!
                        contentType: false,
                        cache: false,
                        data: {
                            id: id
                        },
                        success: function(response) {
                            console.log(response)
                            swal({
                                closeOnClickOutside: false,
                                icon: "success",
                                title: 'Deleted product!',
                                showSpinner: true
                            });
                            setTimeout(function() {
                                $(location).attr("href", "{{asset('admin/products')}}");
                            }, 2000)
                        },
                        error: function(response) {
                            console.log(response)
                            swal({
                                closeOnClickOutside: false,
                                icon: "warning",
                                title: 'Error, please check again!',
                                showSpinner: true
                            });
                        }
                    })
                }
            });
    }
</script>
@endsection