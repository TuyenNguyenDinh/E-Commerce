@extends('layouts.admin')
@section('main')
@section('title','Edit Products')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Edit Product</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
					<li class="breadcrumb-item active">Edit Products</li>
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
						<form action="{{ route('discount.update', $discount->id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							@method('PUT')
							<div class="form-group">
								<label>Name product</label>
								<input type="text" name="name_product" value="{{ $discount->name_product }}" class="form-control" readonly>
							</div>
                            <div class="form-group">
                                <label>Old price</label>
                                <input class="form-control" type="text" name="old_price" value="{{ $discount->old_price }}" readonly>
                            </div>
                            <div class="form-group">
								<label>Price (for previous discount)</label>
								<input type="text" name="price" value="{{ $discount->price }}" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label>Discount percent</label>
								<!-- <select name="discount" id="discount">
									@for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}</option>
										@endfor
								</select> -->
								<input type="text" id="discount" name="discount" value="{{ $discount->discount}}">
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
@stop