@extends('layouts.admin')
@section('main')
@section('title','Edit Products')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Sửa sản phẩm</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('products.index') }}">Sản phẩm</a></li>
					<li class="breadcrumb-item active">Sửa sản phẩm</li>
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
						<form action="{{ route('products.update', $products->id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							@method('PUT')
							<div class="form-group">
								<label>Danh mục</label>
								<select type="number" id="id_category" name="id_category" class="form-control">
									@foreach ($categories as $category)
									<option @if($products->id_category == $category->id) selected @endif value="{{ $category->id}}">{{ $category->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Tên thương hiệu</label>
								<select type="number" id="id_brand" name="id_brand" class="form-control">
									@foreach ($brands as $brand)
									<option @if($products->id_brand == $brand->id) selected @endif value="{{ $brand->id}}">{{ $brand->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Tên sản phẩm</label>
								<input type="text" name="name_product" value="{{ $products->name_product }}" class="form-control">
								@if ($errors->has('name_product'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('ten')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Ảnh sản phẩm (tối đa 4 ảnh)</label>
								<input type="file" name="image1" required="true" id="image1" class="form-control" style="display:none">
								<input type="file" name="image2" required="true" id="image2" class="form-control" style="display:none">
								<input type="file" name="image3" required="true" id="image3" class="form-control" style="display:none">
								<input type="file" name="image4" required="true" id="image4" class="form-control" style="display:none">
								@if ($errors->has('image1'))
								<span class="help-block">
									<strong style="color: red;"> {{ $errors->first('anh')}}</strong>
								</span>
								@endif
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
								<label>Giá sản phẩm</label>
								<input type="number" name="price" value="{{ $products->price}}" class="form-control">
								@if ($errors->has('price'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('price')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Phần trăm giảm giá (nếu có)</label>
								<!-- <select name="discount" id="discount">
									@for ($i = 0; $i <= 100; $i++) <option value="{{$i}}">{{$i}}</option>
										@endfor
								</select> -->
								<input type="text" id="discount" name="discount" value="{{ $products->discount}}">
							</div>
							<div class="form-group">
								<label>Số lượng</label>
								<input type="number" name="quantity" value="{{ $products->quantity }}" class="form-control">
								@if ($errors->has('quantity'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('quantity')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Trọng lượng</label>
								<input type="number" name="weight" value="{{ $products->weight }}" class="form-control">
								@if ($errors->has('weight'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('weight')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Độ dài</label>
								<input type="text" name="lenght" value="{{ $products->lenght }}" class="form-control">
								@if ($errors->has('lenght'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('lenght')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Độ cao</label>
								<input type="text" name="height" value="{{ $products->height }}" class="form-control">
								@if ($errors->has('height'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('height')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Độ rộng</label>
								<input type="text" name="width" value="{{ $products->width }}" class="form-control">
								@if ($errors->has('width'))
								<span class="help-block">
									<strong style="color: red;">{{ $errors->first('width')}}</strong></br>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label>Miêu tả</label><br>
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