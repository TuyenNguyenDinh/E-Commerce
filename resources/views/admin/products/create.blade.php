@extends('layouts.admin')
@section('title','Add Product')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Create Products</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
					<li class="breadcrumb-item active">Create Products</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<form id="create_product" method="POST" data-route="{{ route('products.store') }}" enctype="multipart/form-data">
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
								<label>Brand</label>
								<select type="number" id="id_brand" name="id_brand" class="form-control">
									@foreach ($brands as $brand)
									<option value="{{ $brand->id}}">{{ $brand->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Name product</label>
								<input type="text" name="name_product" class="form-control input100 @error('name_product') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Image (max: 4 image)</label>
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
								<input type="number" name="price" class="form-control input100 @error('price') is-invalid @enderror">
							</div>

							<div class="form-group">
								<label>Attributes</label>
								<input type="number" name="quantity" class="form-control input100 @error('quantity') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" name="quantity" class="form-control input100 @error('quantity') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Weight</label>
								<input type="number" name="weight" class="form-control input100 @error('weight') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Lenght</label>
								<input type="text" name="lenght" class="form-control input100 @error('lenght') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Height</label>
								<input type="text" name="height" class="form-control input100 @error('height') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Width</label>
								<input type="text" name="width" class="form-control input100 @error('width') is-invalid @enderror">
							</div>
							<div class="form-group">
								<label>Description</label><br>
								<textarea name="description" id="summernote" class="input100 @error('description') is-invalid @enderror"></textarea>
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
				<a href="{{ route('products.index')}}" class="btn btn-secondary">Cancel</a>
				<input id="sub" type="submit" value="Create new brands" class="btn btn-success float-right">
			</div>
		</div>
	</form>
</section>
<script>
	$('#create_product').submit(function(event) {
		var route = $('#create_product').data('route');
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