@extends('layouts.admin')
@section('title','Admin')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rated</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Rated</li>
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
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <th style="width:10%">Product</th>
                                    <th style="width: 10%;">Customer</th>
                                    <th>Order ID</th>
                                    <th style="width: 32%;">Comments</th>
                                    <th>Rate</th>
                                    <th>View order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rated as $rate)
                                <tr class="text-center">
                                    <td>{{ $rate->id }}</td>
                                    <td>{{ $rate->products->name_product }}</td>
                                    <td>{{ $rate->customers->name }}</td>
                                    <td>{{ $rate->id_order }}</td>
                                    <td>{{ $rate->comments }}</td>
                                    <td>
                                        @for($i = 1; $i <= $rate->rate; $i++)
                                            <i class="fas fa-star" style="color: #D51A3A;"></i>
                                            @endfor
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('orders.show', $rate->customers->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Customer</th>
                                    <th>Order ID</th>
                                    <th>Comments</th>
                                    <th>Rate</th>
                                    <th>Vier order</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="pagination" >
                            {{$rated->links()}}
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
</section>
<!-- /.content -->

@endsection