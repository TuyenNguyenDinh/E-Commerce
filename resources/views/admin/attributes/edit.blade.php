@extends('layouts.admin')
@section('title','Edit Attributes')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Attributes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Attributes</a></li>
                    <li class="breadcrumb-item active">Edit attributes</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <form method="POST" action="{{ route('attributes.update', $attr->id) }}">
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
                                <label>Category</label>
                                <select type="number" id="id_category" name="id_category" class="form-control">
                                    @foreach ($categories as $category)
                                    <option @if($attr->id_category == $category->id) selected @endif value="{{ $category->id}}">{{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Attributes (max: 4 attributes)</label>
                                <input required type="text" id="attributes1" name="attributes_1" class="form-control" value="{{$attr->attributes_1}}">

                                <input required type="text" id="attributes2" name="attributes_2" class="form-control" value="{{$attr->attributes_2}}">

                                <input type="text" id="attributes3" name="attributes_3" class="form-control" value="{{$attr->attributes_3}}">

                                <input type="text" id="attributes4" name="attributes_4" class="form-control" value="{{$attr->attributes_4}}">

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
                <input type="submit" value="Done" class="btn btn-success float-right">
            </div>
        </div>
    </form>
</section>
<!-- /.content -->

@endsection