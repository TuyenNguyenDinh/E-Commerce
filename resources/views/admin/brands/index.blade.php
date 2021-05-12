@extends('layouts.admin')
@section('title','Brands')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Brands</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">List Brands</li>
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
                                    <th>Name brands</th>
                                    <th>Image</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                <tr class="text-center">
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td><img src="{{asset('upload/'.$brand->image)}}" alt="" width="120px" height="120px"></td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger" onclick="deleteBr('{{ $brand->id }}')"><i class="fas fa-trash"></i></a>
                                            <form id="delete_brand_{{$brand->id}}" data-route="{{ route('brands.destroy', $brand->id) }}" method="post">
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
                                    <th>Name brands</th>
                                    <th>Image</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="pagination">
                            {{$brands->links()}}
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
<script>
    function deleteBr(id) {
        var deletebr = document.getElementById('delete_brand_' + id);
        var route = $('#delete_brand_' + id).data('route');
        swal({
                title: "Delete?",
                text: "Are you sure delete this brand?",
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
                                title: 'Success, Delete successfully!',
                                showSpinner: true
                            });
                        },
                        error: function(response) {
                            console.log(response)
                            swal({
                                closeOnClickOutside: false,
                                icon: "warning",
                                title: 'Error found, Please check again!',
                                showSpinner: true
                            });
                        }
                    })
                }
            });
    }
</script>
@endsection