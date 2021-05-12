@extends('layouts.admin')
@section('title','Admin')
@section('main')
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__shake" src="{{asset('image/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Dashboard</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Dashboard v1</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{DB::table('orders')->count()}}</h3>
						<p>Orders</p>
					</div>
					<div class="icon">
						<i class="ion ion-bag"></i>
					</div>
					<a href="{{ asset('admin/orders') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>{{round((DB::table('comments')->count() / DB::table('customers')->count()) * 100)}}<sup style="font-size: 20px">%</sup></h3>
						<p>Rate</p>
					</div>
					<div class="icon">
						<i class="ion ion-stats-bars"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>{{DB::table('customers')->count()}}</h3>

						<p>Customer Registrations</p>
					</div>
					<div class="icon">
						<i class="ion ion-person-add"></i>
					</div>
					<a href="{{ asset('admin/customers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>{{number_format(DB::table('orders')->where('status','shipped')->sum('total_price'),0,'.','.')}} <sup style="font-size: 20px">đ</sup></h3>
						<p>Total revenue</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="{{ asset('admin/orders?totalPrice=0&statusOrder=6') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<section class="col-lg-7 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-chart-pie mr-1"></i>
							Sales
						</h3>
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="card-body">
							<div class="row">
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('customers')->count()}}" data-width="90" data-height="90" data-fgColor="#3c8dbc">

									<div class="knob-label">New Visitors</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('products')->where('like', '=', 5)->count()}}" data-width="90" data-height="90" data-fgColor="#f56954">

									<div class="knob-label">Products rated 5 *</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('products')->where('like', '=', 1)->count()}}" data-width="90" data-height="90" data-fgColor="#00a65a">
									<div class="knob-label">Undderrated</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('products')->where('quantity', '=',0)->count()}}" data-width="90" data-height="90" data-fgColor="#00c0ef">
									<div class="knob-label">Sell out</div>
								</div>
								<!-- ./col -->
							</div>
							<!-- /.row -->

							<div class="row">
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('orders')->where('status', 'Waiting for the goods')->count()}}" data-width="90" data-height="90" data-fgColor="#932ab6">
									<div class="knob-label">Watting the goods</div>
								</div>
								<!-- ./col -->
								<div class="col-6 col-md-3 text-center">
									<input type="text" class="knob" value="{{DB::table('orders')->where('status','Request to cancel the order')->count()}}" data-width="90" data-height="90" data-fgColor="#39CCCC">
									<div class="knob-label">Refund/ Refunds pending </div>
								</div>
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('orders')->where('status', 'Checking order')->count()}}" data-width="90" data-height="90" data-fgColor="#00c0ef">
									<div class="knob-label">Watting check</div>
								</div>
								<div class="col-6 col-md-3 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('orders')->where('status', 'Cancel')->count()}}" data-width="90" data-height="90" data-fgColor="#00c0ef">
									<div class="knob-label">Orders cancel</div>
								</div>
								<!-- ./col -->
							</div>
							<div class="row">
								<div class="col-12 text-center">
									<input type="text" readonly class="knob" value="{{DB::table('orders')->where('status', 'Shipped')->count()}}" data-width="90" data-height="90" data-fgColor="#00c0ef">
									<div class="knob-label">Orders completed</div>
								</div>
							</div>
							<!-- /.row -->
						</div>
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->


				<!-- /.card -->
			</section>
			<!-- /.Left col -->
			<!-- right col (We are only adding the ID to make the widgets sortable)-->
			<section class="col-lg-5 connectedSortable">

				<!-- Map card -->
				<div class="card bg-gradient-primary">
					<!-- /.card-body-->
					<div class="card-footer bg-transparent">
						<div class="row">
							<div class="col-4 text-center">
								<div id="sparkline-1"></div>
								<div class="text-white">Visitors</div>
							</div>
							<!-- ./col -->
							<div class="col-4 text-center">
								<div id="sparkline-2"></div>
								<div class="text-white">Online</div>
							</div>
							<!-- ./col -->
							<div class="col-4 text-center">
								<div id="sparkline-3"></div>
								<div class="text-white">Sales</div>
							</div>
							<!-- ./col -->
						</div>
						<!-- /.row -->
					</div>
				</div>
				<!-- /.card -->



				<!-- Calendar -->
				<div class="card bg-gradient-success">
					<div class="card-header border-0">
						<h3 class="card-title">
							<i class="far fa-calendar-alt"></i>
							Calendar
						</h3>
						<!-- tools card -->
						<div class="card-tools">
							<!-- button with a dropdown -->
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
									<i class="fas fa-bars"></i>
								</button>
								<div class="dropdown-menu" role="menu">
									<a href="#" class="dropdown-item">Add new event</a>
									<a href="#" class="dropdown-item">Clear events</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item">View calendar</a>
								</div>
							</div>
							<button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
								<i class="fas fa-times"></i>
							</button>
						</div>
						<!-- /. tools -->
					</div>
					<!-- /.card-header -->
					<div class="card-body pt-0">
						<!--The calendar -->
						<div id="calendar" style="width: 100%"></div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</section>
			<!-- right col -->
		</div>
		<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection