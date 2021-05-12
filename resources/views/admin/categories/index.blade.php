@extends('layouts.admin')
@section('title','Categories')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">List Category</li>
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
                                    <th>Name category</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr class="text-center">
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-danger"  onclick="deleteCt('{{$category->id}}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a>
                                            <form id="delete_ct_{{$category->id}}" data-route="{{ route('categories.destroy', $category->id) }}" method="post">
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
                                    <th>Name category</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="pagination">
                            {{$categories->links()}}
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
    function deleteCt(id) {
        var deletect = document.getElementById('delete_ct_' + id);
        var route = $('#delete_ct_' + id).data('route');
        swal({
                title: "Delete?",
                text: "Are you sure delete this category?",
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
                                title: 'Deleted category!',
                                showSpinner: true
                            });
                            setTimeout(function() {
                                $(location).attr("href", "{{asset('admin/categories')}}");
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