@extends('layouts.admin')
@section('title','Add Product')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Thêm sản phẩm</div>
				<div class="panel-body">
					<form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group">
									<label>Danh mục</label>
									<select type="number" name="id_category" class="form-control">
										@foreach ($categories as $category)
										<option value="{{ $category->id}}">{{ $category->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Tên thương hiệu</label>
									<select type="number" name="id_brand" class="form-control">
										@foreach ($brands as $brand)
										<option value="{{ $brand->id}}">{{ $brand->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Tên sản phẩm</label>
									<input type="text" name="name_product" class="form-control">
									@if ($errors->has('name_product'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('ten')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Ảnh sản phẩm ()</label>
									<input type="file" name="image1" required="true" id="task-name" class="form-control" multiple>
									<input type="file" name="image2" required="true" id="task-name" class="form-control">
									<input type="file" name="image3" required="true" id="task-name" class="form-control">
									<input type="file" name="image4" required="true" id="task-name" class="form-control">
									@if ($errors->has('image1'))
									<span class="help-block">
										<strong style="color: red;"> {{ $errors->first('anh')}}</strong>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Giá sản phẩm</label>
									<input type="number" name="price" class="form-control">
									@if ($errors->has('price'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('price')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Số lượng</label>
									<input type="number" name="quantity" class="form-control">
									@if ($errors->has('quantity'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('quantity')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Trọng lượng</label>
									<input type="number" name="weight" class="form-control">
									@if ($errors->has('weight'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('weight')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Độ dài</label>
									<input type="text" name="lenght" class="form-control">
									@if ($errors->has('lenght'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('lenght')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Độ cao</label>
									<input type="text" name="height" class="form-control">
									@if ($errors->has('height'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('height')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Độ rộng</label>
									<input type="text" name="widht" class="form-control">
									@if ($errors->has('widht'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('widht')}}</strong></br>
									</span>
									@endif
								</div>
								<div class="form-group">
									<label>Miêu tả</label><br>
									<textarea name="description" class="ckeditor"></textarea>
									@if ($errors->has('description'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('description')}}</strong></br>
									</span>
									@endif
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="{{ route('products.index')}}" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection