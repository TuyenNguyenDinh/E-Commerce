@extends('layouts.admin')
@section('title','Banner')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">Banner</li>
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
                        <h3 class="card-title">
                            <a href="{{ route('banner.create') }}">
                                <button type="button" class="btn btn-primary">Add image</button>
                            </a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <nav class="nav nav-pills" style="margin-bottom: 20px;">
                            <a data-toggle="tab" href="#image" class="nav-item nav-link active">
                                Slide mode
                            </a>
                            <a data-toggle="tab" href="#list" class="nav-item nav-link">
                                List mode
                            </a>
                        </nav>
                        <div class="tab-content">
                            <div id="image" class="tab-pane fade in active show">
                                <div class="img_main" style="padding-bottom: 20px;">
                                    @foreach($image as $images)
                                    <img src="{{asset('upload/'.$images->image)}}" alt="">
                                    @endforeach
                                </div>
                                <div class="img_slide">
                                    @foreach($image as $img)
                                    <img src="{{asset('upload/'. $img->image)}}" alt="" style="padding-right: 20px;">
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav_left">
                                    <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: inline-block;">
                                        <i class="fas fa-arrow-left"></i>
                                    </button>

                                </div>
                                <div id="slick-nav-2" class="products-slick-nav">
                                    <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: inline-block;">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="list" class="tab-pane fade">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="bg-primary text-center">
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($image as $img)
                                        <tr style="text-align: center;">
                                            <td>{{ $img->id}}</td>
                                            <td><img src="{{ asset('upload/'.$img->image) }}" width="" height="120" /></td>
                                            <td class="text-center py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('banner.edit', $img->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                    <a class="btn btn-danger" onclick="deleteImg('{{$img->id}}')" style="cursor: pointer;"><i class="fas fa-trash"></i></a>
                                                    <form id="delete_img_{{$img->id}}" data-route="{{ route('banner.destroy', $img->id) }}" method="post">
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
                                            <th>Image</th>
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

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
    function deleteImg(id) {
        var deleteimg = document.getElementById('delete_img_' + id);
        var route = $('#delete_img_' + id).data('route');
        swal({
                title: "Delete?",
                text: "Are you sure delete this image?",
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
                                title: 'Deleted image!',
                                showSpinner: true
                            });
                            setTimeout(function() {
                                $(location).attr("href", "http://localhost/ecommerce/E-Commerce/public/admin/banner");
                            },2000)
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