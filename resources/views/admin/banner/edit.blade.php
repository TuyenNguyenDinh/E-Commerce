@extends('layouts.admin')
@section('main')
@section('title','Edit Image')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Products</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
                    <li class="breadcrumb-item active">Edit Image</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <form id="edit-img" method="POST" data-route="{{ route('banner.update', $image->id) }}">
        {{ csrf_field() }}
        @method('PUT')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">General</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Image current</label>
                            </div>
                            <div class="form-group">
                                <img src="{{asset('upload/'. $image->image)}}" alt="" width="690" height="300">
                            </div>
                            <div class="form-group">
                                <label>Image </label>
                            </div>
                            <div class="form-group d-flex">
                                <div class="image-upload-wrap image1">
                                    <input class="file-upload-input upload1" name="image" id="img1" type='file' accept="image/*" onchange="readURL(this, $('.image-upload1'), $('.image1'), $('.content1'))" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content content1">
                                    <img class="file-upload-image image-upload1" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload($('.upload1'), $('.content1'), $('.image1'))" class="remove-image" class="remove-image">Remove </button>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
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
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Done" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
<script>
    $('#edit-img').submit(function(event) {
        var route = $('#edit-img').data('route');
        var form_date = $(this)
        $.ajax({
            method: 'POST',
            url: route,
            processData: false, // Important!
            contentType: false,
            cache: false,
            data: new FormData(this),
            success: function(response) {
                swal({
                    closeOnClickOutside: false,
                    icon: "success",
                    title: 'Success, edit sussecfully!',
                    showSpinner: true
                });
                $(location).attr("href", "http://localhost/ecommerce/E-Commerce/public/admin/banner");
            },
            error: function(response) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                var err = JSON.parse(response.responseText);
                $.each(err.errors, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value[0] + '</li>');
                })

            }
        })
        event.preventDefault();
    });
</script>
@stop