@extends('layouts.profile')
@section('profile')
<link rel="stylesheet" href="{{asset('css/frontend/tracking.css')}}">
<div class="account-tabs col-lg-9 col-md-12">
    <div class="container container-tracking">
        @if($orders->id_customer != Auth::guard('customer')->user()->id)
        <h1>{{ __('content.Not found')}}</h1>
        @else
        @if($orders->status == "Cancel")
        <article class="card">
            <header class="card-header"> {{ __('content.My Orders')}} / {{ __('content.Tracking')}} </header>
            <div class="card-body">
                <h6>{{ __('content.Order')}} ID: {{$orders->id}}</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>{{ __('content.Customer')}}:</strong> <br> {{$orders->customers->name}} </div>
                        <div class="col"> <strong>{{ __('content.Address')}}:</strong> <br> {{$orders->customers->phone}} <br> {{$orders->delivery_address}} </div>
                        <div class="col"> <strong>{{ __('content.Status')}}:</strong> <br> {{$orders->status}} </div>
                        <div class="col"> <strong>{{ __('content.Reasons to cancel order')}}</strong> <br> {{$orders->reasons_cancel_order}} </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{ __('content.Order confirmed')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fal fa-exclamation"></i> </span> <span class="text"> {{ __('content.Cancel order')}}</span> </div>
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
                            @foreach($fee_transport as $fee)
                            @if($fee->id_province == $orders->id_province)
                            <th>{{ __('content.Fee transport')}}</th>
                            <th>{{number_format($fee->transport_fee,0,'.','.')}} đ</th>
                            @else
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <th>{{ __('content.Total price')}}</th>
                            <th style="font-size: 33px; color:#D10024">{{number_format($orders->total_price,0,'.','.')}} đ</th>
                        </tr>
                        <tr></tr>
                    </thead>
                </table>
                <hr>

                <hr>
                <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> {{ __('content.Back to orders')}}</a>
            </div>
        </article>
        @else
        <article class="card">
            <header class="card-header"> {{ __('content.My Orders')}} / {{ __('content.Tracking')}} </header>
            <div class="card-body">
                <h6>{{ __('content.Order')}} ID: {{$orders->id}}</h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>{{ __('content.Estimated Delivery time')}}:</strong> <br>{{$orders->ship_date}} </div>
                        <div class="col"> <strong>{{ __('content.Address')}}:</strong> <br> {{$orders->customers->phone}} <br> {{$orders->delivery_address}} </div>
                        <div class="col"> <strong>{{ __('content.Status')}}:</strong> <br> {{$orders->status}} </div>
                    </div>
                </article>
                <div class="track">
                    @if($orders->status == "Checking order")
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{ __('content.Order confirmed')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> {{ __('content.Picked by courier')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> {{ __('content.On the way')}} </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{ __('content.Ready for pickup')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-star"></i> </span> <span class="text">{{ __('content.Picked')}}</span> </div>

                    @elseif($orders->status == "Confirmed by the seller")
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{ __('content.Order confirmed')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> {{ __('content.Picked by courier')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> {{ __('content.On the way')}} </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{ __('content.Ready for pickup')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-star"></i> </span> <span class="text">{{ __('content.Picked')}}</span> </div>

                    @elseif($orders->status == "Waiting for the goods")
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{ __('content.Order confirmed')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> {{ __('content.Picked by courier')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> {{ __('content.On the way')}} </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{ __('content.Ready for pickup')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-star"></i> </span> <span class="text">{{ __('content.Picked')}}</span> </div>

                    @elseif($orders->status == "Shipping")
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{ __('content.Order confirmed')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> {{ __('content.Picked by courier')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> {{ __('content.On the way')}} </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{ __('content.Ready for pickup')}}</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-star"></i> </span> <span class="text">{{ __('content.Picked')}}</span> </div>

                    @elseif($orders->status == "Shipped")
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">{{ __('content.Order confirmed')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> {{ __('content.Picked by courier')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> {{ __('content.On the way')}} </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">{{ __('content.Ready for pickup')}}</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-star"></i> </span> <span class="text">{{ __('content.Picked')}}</span> </div>
                    @endif
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
                <table class="table table-bordered tabler-hover">
                    <thead>
                        <tr>
                            @foreach($fee_transport as $fee)
                            @if($fee->id_province == $orders->id_province)
                            <th>{{ __('content.Fee transport')}}</th>
                            <th>{{number_format($fee->transport_fee,0,'.','.')}} đ</th>
                            @else
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <th>{{ __('content.Total price')}}</th>
                            <th style="font-size: 33px; color:#D10024">{{number_format($orders->total_price,0,'.','.')}} đ</th>
                        </tr>
                        <tr></tr>
                    </thead>
                </table>
                <hr>
                <a href="{{asset('user/account/orders')}}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> {{ __('content.Back to orders')}}</a>
            </div>
        </article>
        @endif
        @endif

    </div>
</div>
@stop