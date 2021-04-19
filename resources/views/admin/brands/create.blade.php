@extends('layouts.admin')
@section('title','Add Brands')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm thương hiệu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Thương hiệu</a></li>
                    <li class="breadcrumb-item active">Thêm thương hiệu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <form id="create" method="POST" data-route="{{ route('brands.store') }}" enctype="multipart/form-data">
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
                                <label>Tên thương hiệu</label>
                                
                                <input required type="text" id="name" name="name" class="form-control input100 @error('name') is-invalid @enderror">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name')}}</strong></br>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Ảnh thương hiệu</label>
                                <label for="image">
                                    <img id="blah" src="{{ asset('image/add-image.png') }}" alt="your image" width="100px" height="100px" />
                                </label>
                                <input type="file" id="image" name="image" required="true" class="form-control input100 @error('image') is-invalid @enderror" style="display:none">
                                @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong style="color: red;"> {{ $errors->first('image')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Miêu tả</label>
                                <textarea name="description" id="summernote" class="input100 @error('description') is-invalid @enderror">Place <em>some</em> <u>text</u> <strong>here</strong></textarea>
                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('description')}}</strong>
                                </span>
                                @endif
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
                <a href="{{ route('categories.index')}}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Create new brands" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
<script>
    $('#create').submit(function(event) {
        var route = $('#create').data('route');
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
                    title: 'Thành công, tạo thành công!',
                    showSpinner: true
                });
            },
            error: function(response) {
                console.log(response);
                $(".print-error-msg").find("ul").html('');
            		$(".print-error-msg").css('display','block');
				    var err = JSON.parse(response.responseText);
				$.each(err.errors, function (key, value){
					$(".print-error-msg").find("ul").append('<li>'+value[0]+'</li>');
				})
            }
        })
        event.preventDefault();
    });

    $("#image").change(function() {
        readURL(this,$('#blah'));
    });
</script>
@endsection