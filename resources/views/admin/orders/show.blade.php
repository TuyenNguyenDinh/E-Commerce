@extends('layouts.admin')
@section('title','Admin')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Orders</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Customers</li>
                    <li class="breadcrumb-item">{{$customers->name}}</li>
                    <li class="breadcrumb-item active">Orders</li>
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
                        <h3 class="card-title">Order for {{ $customers->name }}</h3>
                    </div>
                    <!-- /.card-header -->
                    @if(count($orders) != 0)
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <th>Total products</th>
                                    <th>Payment method</th>
                                    <th>Total price</th>
                                    <th style="width: 20%">Notes</th>
                                    <th>Status</th>
                                    <th>Order date</th>
                                    <th>Ship date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr style="text-align: center;">
                                    <td>{{ $order->id }}</td>
                                    <td>{{\DB::table('orderdetails')->where('id_order',$order->id)->count()}}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ number_format($order->total_price,0,',','.') }} đ</td>
                                    <td>{{ $order->notes}}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->order_date}}</td>
                                    <td>{{ $order->ship_date}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('orderdetails.show', $order->id) }}" class="btn btn-info"><i class="fas fa-info"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Total products</th>
                                    <th>Payment method</th>
                                    <th>Total price</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <th>Order date</th>
                                    <th>Ship date</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="pagination">
                            {{$orders->links()}}
                        </div>
                    </div>
                    @else
                    <div class="error-page">
                            <div class="error-content">
                                <div class="wrapper">
                                    <h3><i class="fas fa-exclamation-triangle text-warning"></i>{{ __('Oops! Not found.')}}</h3>
                                </div>
                            </div>
                            <!-- /.error-content -->
                        </div>
                    @endif
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
@stop