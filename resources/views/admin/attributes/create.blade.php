@extends('layouts.admin')
@section('title','Add Attributes')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Attributes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Attributes</a></li>
                    <li class="breadcrumb-item active">Add attributes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <form id="createAttr" method="POST" data-route="{{ route('attributes.store') }}">
        {{ csrf_field() }}
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
                                <label>Category</label>
                                <select type="number" id="id_category" name="id_category" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Attributes (max: 4 attributes)</label>
                            </div>
                            <div class="form-group">
                                <input required type="text" id="attributes1" name="attributes_1" class="form-control">
                                <br>
                                <input required type="text" id="attributes2" name="attributes_2" class="form-control">
<br>
                                <input type="text" id="attributes3" name="attributes_3" class="form-control">
<br>
                                <input type="text" id="attributes4" name="attributes_4" class="form-control">

                            </div>
                            <div class="alert alert-danger print-error-msg" style="display:none">
                                <ul></ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
        <div class="row">
            <div class="col-12">
                <a href="{{ route('attributes.index')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new attribues" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
<script>
    $('#createAttr').submit(function(event) {
        var route = $('#createAttr').data('route');
        var form_data = $(this);
        $.ajax({
            method: 'POST',
            url: route,
            processData: false, // Important!
            contentType: false,
            cache: false,
            data: new FormData(this),
            success: function(response) {

                console.log(response)
                swal({
                    closeOnClickOutside: false,
                    icon: "success",
                    title: 'Success, created successfully!',
                    showSpinner: true
                });
                $(location).attr("href","http://localhost/ecommerce/E-Commerce/public/admin/attributes")
            },
            error: function(response) {
                console.log(response);
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