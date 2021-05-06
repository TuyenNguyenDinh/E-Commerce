@extends('layouts.admin')
@section('title','Admin')
@section('main')
<?php
$paymentMethod = request()->get('paymentMethod');
$totalPrice = request()->get('totalPrice');
$statusOrder = request()->get('statusOrder');
?>
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
                        <h3 class="card-title">Filter</h3>
                        <table class="table">
                            <thead>
                                <tr class="filters">
                                    <th>Payment Method
                                        <form method="get">
                                            <select id="assigned-user-filter" name="paymentMethod" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                <option value="0" selected>Choose payment method</option>
                                                <option {{($paymentMethod==1)?'selected':""}} value="1">
                                                    {{ __('All')}}
                                                </option>
                                                <option {{($paymentMethod==2)?'selected':""}} value="2">
                                                    {{ __('COD')}}
                                                </option>
                                                <option {{($paymentMethod==3)?'selected':""}} value="3">
                                                    {{ __('Debit Card')}}
                                                </option>
                                            </select>
                                            <button type="submit" style="display: none;">sub</button>
                                        </form>
                                    </th>
                                    <th>Total Price
                                        <form method="get">
                                            <select id="assigned-user-filter" name="totalPrice" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                <option value="0" selected>Choose range price</option>
                                                <option {{($totalPrice==1)?'selected':""}} value="1">
                                                    {{ __('All')}}
                                                </option>
                                                <option {{($totalPrice==2)?'selected':""}} value="2">
                                                    {{ __('Less 10.000.000 đ')}}
                                                </option>
                                                <option {{($totalPrice==3)?'selected':""}} value="3">
                                                    {{ __('10 - 15.000.000 đ')}}
                                                </option>
                                                <option {{($totalPrice==4)?'selected':""}} value="4">
                                                    {{ __('15 - 20.000.000 đ')}}
                                                </option>
                                                <option {{($totalPrice==5)?'selected':""}} value="5">
                                                    {{ __('20 -25.000.000 đ')}}
                                                </option>
                                                <option {{($totalPrice==6)?'selected':""}} value="6">
                                                    {{ __('25.000.000 đ more')}}
                                                </option>
                                                <button type="submit" style="display: none;">sub</button>
                                        </form>
                                    </th>
                                    <th>Status
                                        <form method="get">
                                            <select id="assigned-user-filter" name="statusOrder" class="form-control" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                <option value="0" selected>Choose status</option>
                                                <option {{($statusOrder==1)?'selected':""}} value="1">
                                                    {{ __('All')}}
                                                </option>
                                                <option {{($statusOrder==2)?'selected':""}} value="2">
                                                    {{ __('Waiting checking')}}
                                                </option>
                                                <option {{($statusOrder==3)?'selected':""}} value="3">
                                                    {{ __('Confirmed by the seller')}}
                                                </option>
                                                <option {{($statusOrder==4)?'selected':""}} value="4">
                                                    {{ __('Waiting for the goods')}}
                                                </option>
                                                <option {{($statusOrder==5)?'selected':""}} value="5">
                                                    {{ __('Shipping')}}
                                                </option>
                                                <option {{($statusOrder==6)?'selected':""}} value="6">
                                                    {{ __('Shipped')}}
                                                </option>
                                                <option {{($statusOrder==7)?'selected':""}} value="7">
                                                    {{ __('Cancel orders')}}
                                                </option>
                                            </select>
                                            <button type="submit" style="display: none;">sub</button>
                                        </form>
                                    </th>
                                </tr>
                                </thread>
                        </table>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(count($orders) != 0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-center">
                                    <th>ID</th>
                                    <td>Customer name</td>
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
                                    <td>{{ $order->customers->name }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ number_format($order->total_price,0,',','.') }} đ</td>
                                    <td>{{ $order->notes}}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->order_date}}</td>
                                    <td>{{ $order->ship_date}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{route('orderdetails.show', $order->id)}}" class="btn btn-info"><i class="fas fa-info"></i></a>
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