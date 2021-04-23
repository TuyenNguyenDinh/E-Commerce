@extends('layouts.profile')
@section('profile')
<link rel="stylesheet" href="{{asset('css/frontend/tracking.css')}}">
<div class="account-tabs col-lg-9 col-md-12">
<div class="container container-tracking">
@if($orders->id_customer != Auth::guard('customer')->user()->id)
<h1>Not found order</h1>
@else
@if($orders->status == "Cancel")
<article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order ID: {{$orders->id}}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Customer:</strong> <br> {{$orders->customers->name}} </div>
                    <div class="col"> <strong>Address:</strong> <br> {{$orders->customers->phone}} <br> {{$orders->delivery_address}} </div>
                    <div class="col"> <strong>Status:</strong> <br> {{$orders->status}} </div>
                    <div class="col"> <strong>Reasons to cancel order</strong> <br> {{$orders->reasons_cancel_order}} </div>
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fal fa-exclamation"></i> </span> <span class="text"> Cancel order</span> </div>
            </div>
            <hr>
            <ul class="row">
            @foreach($order_details as $order_detail)
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ asset('upload/'.$order_detail->products->image1) }}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$order_detail->products->name_product}}</p><span class="text-muted">x {{$order_detail->quantity}}</span> <br>
                            <span class="text-muted">{{ number_format($order_detail->products->price,0,'.','.') }} VND</span>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
            </ul>
            <table class="table table-bordered tabler-hover">
                                    <thead>
                                        <tr>
                                            <th>Total price</th>
                                            <th>{{number_format($orders->total_price,0,'.','.')}}</th>
                                        </tr>
                                        <tr></tr>
                                    </thead>
                                </table>
            <hr>

            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
@else
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h6>Order ID: {{$orders->id}}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Status:</strong> <br> {{$orders->status}} </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                </div>
            </article>
            <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div>
            <hr>
            <ul class="row">
            @foreach($order_details as $order_detail)
                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ asset('upload/'.$order_detail->products->image1) }}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">{{$order_detail->products->name_product}}</p> <span class="text-muted">{{ number_format($order_detail->products->price,0,'.','.') }} VND</span>
                        </figcaption>
                    </figure>
                </li>
                @endforeach
            </ul>
            <hr>
            <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
@endif
@endif
    
</div>
</div>
@stop