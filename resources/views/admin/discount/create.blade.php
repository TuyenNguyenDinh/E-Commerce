@extends('layouts.admin')
@section('title','Discount')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm giảm giá</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Thêm sản phẩm</div>
				<div class="panel-body">
					<form method="post" action="{{ route('discount.store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group">
									<label>Sản phẩm</label>
									<select type="number" name="id_product" class="form-control">
										@foreach ($products as $product)
										<option value="{{ $product->id}}">{{ $product->name_product}}</option>
										@endforeach
									</select>
								</div>
                                <div class="form-group">
									<label>Phần trăm (%)</label>
									<input type="text" name="discount_percent" class="form-control">
									@if ($errors->has('discount_percent'))
									<span class="help-block">
										<strong style="color: red;">{{ $errors->first('discount_percent')}}</strong></br>
									</span>
									@endif
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="{{ route('discount.index')}}" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop