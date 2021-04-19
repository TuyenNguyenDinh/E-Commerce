@extends('layouts.admin')
@section('title','Products')
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
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
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
                                    <td><img src="../upload/{{ $product->image1 }}" width="120" height="120" /></td>
                                    <td>{{number_format($product->price,0,',','.')}} đ</td>

                                    <td>{{number_format($product->old_price,0,',','.')}} đ</td>
                                    <td>{{ $product->quantity}}</td>
                                    <!-- <td class="label_title">
                                        <div id="description_content_{{$product->id}}">
                                        <?php echo $product->description ?>
                                        </div>
                                    </td> -->
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
                                <tr>
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
                title: "Xóa?",
                text: "Bạn có muốn xóa sản phẩm này?",
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
                                title: 'Thành công, xóa thành công!',
                                showSpinner: true
                            });
                        },
                        error: function(response) {
                            console.log(response)
                            swal({
                                closeOnClickOutside: false,
                                icon: "warning",
                                title: 'Có lỗi, vui lòng kiểm tra lại!',
                                showSpinner: true
                            });
                        }
                    })
                }
            });
    }
</script>
@endsection