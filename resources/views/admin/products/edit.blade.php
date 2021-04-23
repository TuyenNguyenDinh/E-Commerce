@extends('layouts.admin')
@section('main')
@section('title','Edit Products')
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
					<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
					<li class="breadcrumb-item active">Edit products</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<form action="{{ route('products.update', $products->id) }}" method="post" enctype="multipart/form-data">
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
									<option @if($products->id_category == $category->id) selected @endif value="{{ $category->id}}">{{ $category->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Brand</label>
								<select type="number" id="id_brand" name="id_brand" class="form-control">
									@foreach ($brands as $brand)
									<option @if($products->id_brand == $brand->id) selected @endif value="{{ $brand->id}}">{{ $brand->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Name product</label>
								<input type="text" name="name_product" value="{{ $products->name_product }}" class="form-control">
								@if ($errors->has('name_product'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('ten')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Image (max: 4 image) </label>
								<div class="image-upload-wrap image1">
									<input class="file-upload-input upload1" name="image1" id="img1" type='file' accept="image/*" onchange="readURL(this, $('.image-upload1'), $('.image1'), $('.content1'))" />
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
								<!--  -->
								<div class="image-upload-wrap image2">
									<input class="file-upload-input upload2" name="image2" id="img2" type='file' accept="image/*" onchange="readURL(this, $('.image-upload2'), $('.image2'), $('.content2'))" />
									<div class="drag-text">
										<h3>Drag and drop a file or select add Image</h3>
									</div>
								</div>
								<div class="file-upload-content content2">
									<img class="file-upload-image image-upload2" src="#" alt="your image" />
									<div class="image-title-wrap">
										<button type="button" onclick="removeUpload($('.upload2'), $('.content2'), $('.image2'))" class="remove-image">Remove </button>
									</div>
								</div>
								<!--  -->
								<div class="image-upload-wrap image3">
									<input class="file-upload-input upload3" name="image3" id="img3" type='file' accept="image/*" onchange="readURL(this, $('.image-upload3'), $('.image3'), $('.content3'))" />
									<div class="drag-text">
										<h3>Drag and drop a file or select add Image</h3>
									</div>
								</div>
								<div class="file-upload-content content3">
									<img class="file-upload-image image-upload3" src="#" alt="your image" />
									<div class="image-title-wrap">
										<button type="button" onclick="removeUpload($('.upload3'), $('.content3'), $('.image3'))" class="remove-image">Remove </button>
									</div>
								</div>
							</div>
							<!--  -->
							<div class="image-upload-wrap image4">
								<input class="file-upload-input upload4" name="image4" id="img4" type='file' accept="image/*" onchange="readURL(this, $('.image-upload4'), $('.image4'), $('.content4'))" />
								<div class="drag-text">
									<h3>Drag and drop a file or select add Image</h3>
								</div>
							</div>
							<div class="file-upload-content content4">
								<img class="file-upload-image image-upload4" src="#" alt="your image" />
								<div class="image-title-wrap">
									<button type="button" onclick="removeUpload($('.upload4'), $('.content4'), $('.image4'))" class="remove-image">Remove </button>
								</div>
							</div>
							<!--  -->
							<div class="form-group">
								<label>Price</label>
								<input type="number" name="price" value="{{ $products->price}}" class="form-control">
								@if ($errors->has('price'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('price')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" name="quantity" value="{{ $products->quantity }}" class="form-control">
								@if ($errors->has('quantity'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('quantity')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Weight</label>
								<input type="number" name="weight" value="{{ $products->weight }}" class="form-control">
								@if ($errors->has('weight'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('weight')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Lenght</label>
								<input type="text" name="lenght" value="{{ $products->lenght }}" class="form-control">
								@if ($errors->has('lenght'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('lenght')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Height</label>
								<input type="text" name="height" value="{{ $products->height }}" class="form-control">
								@if ($errors->has('height'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('height')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Width</label>
								<input type="text" name="width" value="{{ $products->width }}" class="form-control">
								@if ($errors->has('width'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('width')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Description</label><br>
								<textarea name="description" id="summernote">
								<?php echo $products->description ?>
								</textarea>
								@if ($errors->has('description'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('description')}}</strong></br>
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
				<input type="submit" value="Done" class="btn btn-success float-right">
			</div>
		</div>
	</form>
</section>
<!-- /.content -->
@stop