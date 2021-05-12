@extends('layouts.admin')
@section('title','Add Category')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <form id="create_category" data-route="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
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

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputName">Name category</label>
                                <input required type="text" id="inputName" name="name" class="form-control">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name')}}</strong></br>
                                </span>
                                @endif
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
                <input type="submit" value="Create new categories" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
<script>
    $('#create_category').submit(function(event) {
        var route = $('#create_category').data('route');
        var form_data = $(this);
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
                    title: 'Success, create sussecfully!',
                    showSpinner: true
                });
                $(location).attr("href", "{{asset('admin/categories')}}");
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
@endsection