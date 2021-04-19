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
								<input type="file" name="image1" required id="image1" class="form-control" style="display:none">
								<input type="file" name="image2" required id="image2" class="form-control" style="display:none">
								<input type="file" name="image3" required id="image3" class="form-control" style="display:none">
								<input type="file" name="image4" required id="image4" class="form-control" style="display:none">
							</div>
							<div class="form-group">
								<label for="image1">
									<img id="blah1" src="{{ asset('image/add-image.png') }}" alt="your image" width="100px" height="100px" />
								</label>
								<label for="image2">
									<img id="blah2" src="{{ asset('image/add-image.png') }}" alt="your image" width="100px" height="100px" />
								</label>
								<label for="image3">
									<img id="blah3" src="{{ asset('image/add-image.png') }}" alt="your image" width="100px" height="100px" />
								</label>
								<label for="image4">
									<img id="blah4" src="{{ asset('image/add-image.png') }}" alt="your image" width="100px" height="100px" />
								</label>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="number" name="price" class="form-control input100 @error('price') is-invalid @enderror">
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
            		$(".print-error-msg").css('display','block');
				var err = JSON.parse(response.responseText);
				$.each(err.errors, function (key, value){
					$(".print-error-msg").find("ul").append('<li>'+value[0]+'</li>');
				})

			}
		})
		event.preventDefault();
	});
</script>
@endsection