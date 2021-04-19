@extends('layouts.admin')
@section('main')
@section('title','Edit Brands')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Brands</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
                    <li class="breadcrumb-item active">Edit Brands</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <form method="POST" action="{{ route('brands.update', $brands->id) }}" enctype="multipart/form-data">
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
                                <label>Name brands</label>
                                <br>
                                <input required type="text" id="name" name="name" value="{{ $brands->name }}" class="form-control">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('name')}}</strong></br>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <label for="image">
                                    <img id="blah" src="{{ asset('image/add-image.png') }}" alt="your image" width="100px" height="100px" />
                                </label>
                                <input type="file" id="image" name="image" required="true" class="form-control" style="display:none">
                                @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong style="color: red;"> {{ $errors->first('image')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label><br>
                                <textarea name="description" id="summernote">
                                    <?php echo $brands->description ?>
                                </textarea>
                                @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('description')}}</strong></br>
                                </span>
                                @endif
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
                <input type="submit" value="Update" class="btn btn-success float-right" onsubmit="updateBrands('{{$brands->id}}')">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->
<script>



 $("#image").change(function() {
        readURL(this,$('#blah'));
    });
</script>
@stop