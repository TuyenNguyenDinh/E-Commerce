@extends('layouts.admin')
@section('title','Admin')
@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Order details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                    <li class="breadcrumb-item">Orders</li>
                    <li class="breadcrumb-item active">Order details</li>
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
                        <h3 class="card-title">Order details for {{$orders->customers->name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-order d-flex flex-row">
                            <div class="col-md-6">
                                <table class="table table-bordered tabler-hover">
                                    <thead>
                                        <tr>
                                            <th>Customer name</th>
                                            <th>{{$orders->customers->name}}</th>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <th>{{$orders->customers->address}}</th>
                                        </tr>
                                        <tr>
                                            <th>Address ship</th>
                                            <th>{{$orders->delivery_address}}</th>
                                        </tr>
                                        <tr>
                                            <th>Total price</th>
                                            <th>{{ number_format($orders->total_price,0,',','.') }} đ</th>
                                        </tr>
                                        <tr>
                                            <th>Payment method</th>
                                            <th>{{ $orders->payment_method }}</th>
                                        </tr>
                                        <tr>
                                            <th>Notes</th>
                                            <th>{{ $orders->notes }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('orders.update', $orders->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row" style="margin-bottom:40px">
                                        <div class="col-xs-8">
                                            <div class="form-group">
                                                <label>Tình trạng</label>
                                                <select type="text" name="status" class="form-control">
                                                    <option value="Checking order">Waiting checking</option>
                                                    <option value="Confirmed by the seller">Confirmed by the seller</option>
                                                    <option value="Waiting for the goods">Waiting for the goods</option>
                                                    <option value="Shipping">Shipping</option>
                                                    <option value="Shipped">Shipped</option>
                                                    <option value="Cancel">Cancel orders</option>
                                                    <option value="Refund">Refund</option>
                                                </select>
                                            </div>
                                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Products name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_details as $order_detail)
                                <tr style="text-align: center;">
                                    <td>{{ $order_detail->id }}</td>
                                    <td>{{ $order_detail->orders->id }}</td>
                                    <td>{{ $order_detail->products->name_product}}</td>
                                    <td>{{ $order_detail->quantity }}</td>
                                    <td>{{ $order_detail->price}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Products name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </tfoot>
                        </table>
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
@stop