@extends('layouts.profile')
@section('profile')
<link rel="stylesheet" href="{{asset('css/rating.css')}}">
<div class="account-tabs col-lg-9 col-md-12">
    <div class="tab-overflow_x">
        <div class="row">
            <div class="tab-pills_order w-100">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">{{ __('content.All')}}</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">{{ __('content.Checking order')}}</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">{{ __('content.Waiting for the goods')}}</a>
                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">{{ __('content.Shipping')}}</a>
                        <a class="nav-item nav-link" id="nav-about-tab1" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">{{ __('content.Shipped')}}</a>
                        <a class="nav-item nav-link" id="nav-about-tab2" data-toggle="tab" href="#nav-about2" role="tab" aria-controls="nav-about2" aria-selected="false">{{ __('content.Cancel')}}</a>
                    </div>
                </nav>
                <div class="tab-content py-4 px-4 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @if(count($orders) == 0)
                        <h1>{{ __('content.Not found')}}</h1>
                        @else
                        @foreach($orders as $order)
                        <div class="purchase-list-page_checkout">
                            <div class="order-card_container">
                                <div class="order-card_content">
                                    <div class="order-content_header d-flex container-fluid">
                                        <div class="order-content_header_order" style="flex: 1">
                                            <div class="order-content_header_order_id">{{ __('content.Order')}} {{$order->id}}</div>
                                        </div>
                                        <div class="order-content_header_status_wrapper">
                                            <a href="#" class="order-content_header_order_delivery_status">
                                                <i class="fal fa-truck"></i>
                                                <span>{{ $order->status }}</span>
                                            </a>
                                        </div>
                                        <div class="order-content_header_status">
                                            @if(count(DB::table('comments')->where('id_order',$order->id)->get()) == 0)
                                            {{ __('content.Not rated')}}
                                            @else
                                            {{ __('content.Rated')}}
                                            @endif
                                        </div>
                                    </div>
                                    @foreach($order_details as $order_detail)
                                    @if($order_detail->id_order != $order->id)
                                    @else
                                    <div class="order-content_item-list container-fluid">
                                        <div class="order-content_item-list_wrapper">
                                            <div class="order-content_item">
                                                <div class="order-content_item_row">
                                                    <div class="order-content_item_details">
                                                        <div class="order-content_item_product">
                                                            <div class="order-content_item_image">
                                                                <div class="order-image_wrapper">
                                                                    <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="order-content_item_detail-content">
                                                                <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                <div class="order-content_item-quantity">x {{$order_detail->quantity}}</div>
                                                            </div>
                                                            <div class="order-content_item_price">
                                                                <div class="order-content_item_price_text">
                                                                    <div>
                                                                        {{number_format($order_detail->price,0,',','.')}}đ
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="order-card_button_container">
                                    <div class="purchase-card_button container-fluid">
                                        <div class="purchase-card_button_total-payment">
                                            <div class="purchase-card_button_label-price">
                                                <span>{{ __('content.Total')}}: </span>
                                            </div>
                                            <div class="purchase-card_button_total_price">
                                                <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                            </div>
                                        </div>
                                        @if($order->status == "Checking order" )
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">{{ __('content.Cancel order')}}</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                </a>
                                            </div>
                                        </div>
                                        @elseif($order->status == "Cancel")
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <a href="{{asset('cart/add_again/'.$order->id)}}">
                                                    <button class="btn btn-red text-white">{{ __('content.Buy again')}}</button>
                                                </a>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                </a>
                                            </div>
                                        </div>
                                        @elseif($order->status == "Shipped")
                                        @if(count(DB::table('comments')->where('id_order',$order->id)->get()) == 0)
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white" data-toggle="modal" data-target="#ratingOrder_{{$order->id}}">{{ __('content.Rate order')}}</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white" data-toggle="modal" data-target="#viewRating_{{$order->id}}">{{ __('content.View rated')}}</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                        @elseif($order->status == "Waiting for the goods")
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white" disabled>{{ __('content.Received')}}</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="cancelOrder_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-title text-left my-account-section__header">
                                            <h4>{{ __('content.Cancel order')}} {{$order->id}}</h4>
                                            <div class="my-account-section__header-subtitle">
                                                {{ __('content.Please choose reasons cancelled order')}}
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-baseline">
                                            <form action="{{ route('cancel_orders' ,$order->id)}}" method="post" style="width: 100%">
                                                {{csrf_field()}}
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <select name="reasons" id="reasons reasons_{{$order->id}}" class="form-control rounded-pill border-0 shadow-sm px-4">
                                                        <option value="Change delivery address" selected>{{ __('content.Change delivery address')}}</option>
                                                        <option value="Change products in order">{{ __('content.Change products in order')}}</option>
                                                        <option value="Don't want to buy">{{ __("content.Don't want to buy")}}</option>
                                                        <option value="Wrong/duplicate order">{{ __('content.Wrong/duplicate order')}}</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('content.Send request')}}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ratingOrder_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('postComments',$order->id)}}" method="post">
                                            {{csrf_field()}}
                                            <div class="form-title text-left my-account-section__header">
                                                <h4>{{ __('content.Rating order')}} {{$order->id}}</h4>
                                            </div>
                                            @foreach($order_details as $order_detail)
                                            @if($order_detail->id_order != $order->id)
                                            @else
                                            <div class="d-flex flex-column  align-items-baseline">
                                                <div class="order-content_item-list container-fluid" style="border-top: none;">
                                                    <div class="order-content_item-list_wrapper">
                                                        <div class="order-content_item">
                                                            <div class="order-content_item_row">
                                                                <div class="order-content_item_details">
                                                                    <div class="order-content_item_product">
                                                                        <div class="order-content_item_image">
                                                                            <div class="order-image_wrapper">
                                                                                <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="order-content_item_detail-content">
                                                                            <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100 text-center" style="padding-top: 10px;padding-bottom: 23px">
                                                    <!-- <input type="number" name="rate[{{$order_detail->id}}]"> -->
                                                    <div class="ratedd">
                                                        <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="1" />
                                                        <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="2" />
                                                        <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="3" />
                                                        <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="4" />
                                                        <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="5" />
                                                    </div>
                                                </div>
                                                <div class="comments-content w-100">
                                                    <textarea name="comments[{{$order_detail->id}}]" id="comments_{{$order_detail->id}}" cols="30" rows="10" maxlength="300" style="resize: none; width: 100%; ; height:136px" placeholder="{{ __('content.Please comment why product is not good')}}"></textarea>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('content.Send request')}}</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="viewRating_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-title text-left my-account-section__header">
                                            <h4>{{ __('content.View rated')}} {{ __('content.order')}} {{$order->id}}</h4>
                                        </div>
                                        @foreach($rating as $order_detail)
                                        @if($order_detail->id_order == $order->id)
                                        <div class="d-flex flex-column  align-items-baseline">
                                            <div class="order-content_item-list container-fluid" style="border-top: none;">
                                                <div class="order-content_item-list_wrapper">
                                                    <div class="order-content_item">
                                                        <div class="order-content_item_row">
                                                            <div class="order-content_item_details">
                                                                <div class="order-content_item_product">
                                                                    <div class="order-content_item_image">
                                                                        <div class="order-image_wrapper">
                                                                            <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="order-content_item_detail-content">
                                                                        <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="w-100 text-left" style="padding-top: 10px;padding-bottom: 23px; color: #d8c223">
                                                    @for($i = 1; $i <= $order_detail->rate; $i++)
                                                        <i class="fas fa-star"></i>
                                                        @endfor
                                                </div>
                                                <div class="comments-content w-100">
                                                    <p>{{$order_detail->comments}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        @endif
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($waiting_check) == 0)
                            <h1>{{ __('content.Not found')}}</h1>
                            @else
                            @foreach($waiting_check as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">{{ __('content.Order')}} {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                                {{ __('content.Not rated')}}
                                            </div>
                                        </div>
                                        @foreach($order_details as $order_detail)
                                        @if($order_detail->id_order != $order->id)
                                        @else
                                        <div class="order-content_item-list container-fluid">
                                            <div class="order-content_item-list_wrapper">
                                                <div class="order-content_item">
                                                    <div class="order-content_item_row">
                                                        <div class="order-content_item_details">
                                                            <div class="order-content_item_product">
                                                                <div class="order-content_item_image">
                                                                    <div class="order-image_wrapper">
                                                                        <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="order-content_item_detail-content">
                                                                    <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                    <div class="order-content_item-quantity">x {{$order_detail->quantity}}</div>
                                                                </div>
                                                                <div class="order-content_item_price">
                                                                    <div class="order-content_item_price_text">
                                                                        <div>
                                                                            {{number_format($order_detail->price,0,',','.')}}đ
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="order-card_button_container">
                                        <div class="purchase-card_button container-fluid">
                                            <div class="purchase-card_button_total-payment">
                                                <div class="purchase-card_button_label-price">
                                                    <span>{{ __('content.Total')}}: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Checking order" )
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder__{{$order->id}}">{{ __('content.Cancel order')}}</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="cancelOrder__{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-title text-left my-account-section__header">
                                                <h4>{{ __('content.Cancel order')}} {{$order->id}}</h4>
                                                <div class="my-account-section__header-subtitle">
                                                    {{ __('content.Please choose reasons cacelled order')}}
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-baseline">
                                                <form action="{{ route('cancel_orders' ,$order->id)}}" method="post" style="width: 100%">
                                                    {{csrf_field()}}
                                                    @method('PUT')
                                                    <div class="form-group mb-3">
                                                        <select name="reasons" id="reasons reasons_{{$order->id}}" class="form-control rounded-pill border-0 shadow-sm px-4">
                                                            <option value="Change delivery address" selected>{{ __('content.Change delivery address')}}</option>
                                                            <option value="Change products in order">{{ __('content.Change products in order')}}</option>
                                                            <option value="Don't want to buy">{{ __("content.Don't want to buy")}}</option>
                                                            <option value="Wrong/duplicate order">{{ __('content.Wrong/duplicate order')}}</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('content.Send request')}}</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($waiting_the_goods) == 0)
                            <h1>{{ __('content.Not found')}}</h1>
                            @else
                            @foreach($waiting_the_goods as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">{{ __('content.Order')}} {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                            {{ __('content.Not rated')}}
                                            </div>
                                        </div>
                                        @foreach($order_details as $order_detail)
                                        @if($order_detail->id_order != $order->id)
                                        @else
                                        <div class="order-content_item-list container-fluid">
                                            <div class="order-content_item-list_wrapper">
                                                <div class="order-content_item">
                                                    <div class="order-content_item_row">
                                                        <div class="order-content_item_details">
                                                            <div class="order-content_item_product">
                                                                <div class="order-content_item_image">
                                                                    <div class="order-image_wrapper">
                                                                        <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="order-content_item_detail-content">
                                                                    <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                    <div class="order-content_item-quantity">x {{$order_detail->quantity}}</div>
                                                                </div>
                                                                <div class="order-content_item_price">
                                                                    <div class="order-content_item_price_text">
                                                                        <div>
                                                                            {{number_format($order_detail->price,0,',','.')}}đ
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="order-card_button_container">
                                        <div class="purchase-card_button container-fluid">
                                            <div class="purchase-card_button_total-payment">
                                                <div class="purchase-card_button_label-price">
                                                    <span>{{ __('content.Total')}}: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>

                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>{{ __('content.Received')}}</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($shipping) == 0)
                            <h1>{{ __('content.Not found')}}</h1>
                            @else
                            @foreach($shipping as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">{{ __('content.Order')}} {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                            {{ __('content.Not rated')}}
                                            </div>
                                        </div>
                                        @foreach($order_details as $order_detail)
                                        @if($order_detail->id_order != $order->id)
                                        @else
                                        <div class="order-content_item-list container-fluid">
                                            <div class="order-content_item-list_wrapper">
                                                <div class="order-content_item">
                                                    <div class="order-content_item_row">
                                                        <div class="order-content_item_details">
                                                            <div class="order-content_item_product">
                                                                <div class="order-content_item_image">
                                                                    <div class="order-image_wrapper">
                                                                        <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="order-content_item_detail-content">
                                                                    <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                    <div class="order-content_item-quantity">x {{$order_detail->quantity}}</div>
                                                                </div>
                                                                <div class="order-content_item_price">
                                                                    <div class="order-content_item_price_text">
                                                                        <div>
                                                                            {{number_format($order_detail->price,0,',','.')}}đ
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="order-card_button_container">
                                        <div class="purchase-card_button container-fluid">
                                            <div class="purchase-card_button_total-payment">
                                                <div class="purchase-card_button_label-price">
                                                    <span>{{ __('content.Total')}}: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>{{ __('content.Received')}}</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about-tab1">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($shipped) == 0)
                            <h1>{{ __('content.Not found')}}</h1>
                            @else
                            @foreach($shipped as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">{{ __('content.Order')}} {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                                @if(count(DB::table('comments')->where('id_order',$order->id)->get()) == 0)
                                                {{ __('content.Not rated')}}
                                                @else
                                                {{ __('content.Rated')}}
                                                @endif
                                            </div>
                                        </div>
                                        @foreach($order_details as $order_detail)
                                        @if($order_detail->id_order != $order->id)
                                        @else
                                        <div class="order-content_item-list container-fluid">
                                            <div class="order-content_item-list_wrapper">
                                                <div class="order-content_item">
                                                    <div class="order-content_item_row">
                                                        <div class="order-content_item_details">
                                                            <div class="order-content_item_product">
                                                                <div class="order-content_item_image">
                                                                    <div class="order-image_wrapper">
                                                                        <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="order-content_item_detail-content">
                                                                    <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                    <div class="order-content_item-quantity">x {{$order_detail->quantity}}</div>
                                                                </div>
                                                                <div class="order-content_item_price">
                                                                    <div class="order-content_item_price_text">
                                                                        <div>
                                                                            {{number_format($order_detail->price,0,',','.')}}đ
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="order-card_button_container">
                                        <div class="purchase-card_button container-fluid">
                                            <div class="purchase-card_button_total-payment">
                                                <div class="purchase-card_button_label-price">
                                                    <span>{{ __('content.Total')}}`: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Shipped")
                                            @if(count(DB::table('comments')->where('id_order',$order->id)->get()) == 0)
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#ratingOrder_shipped_{{$order->id}}">{{ __('content.Rate order')}}</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#viewRating_shipped_{{$order->id}}">{{ __('content.View rated')}}</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="cancelOrder_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-title text-left my-account-section__header">
                                                <h4>{{ __('content.Cancel order')}} {{$order->id}}</h4>
                                                <div class="my-account-section__header-subtitle">
                                                {{ __('content.Please choose reasons cancelled order')}}
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-baseline">
                                                <form action="{{ route('cancel_orders' ,$order->id)}}" method="post" style="width: 100%">
                                                    {{csrf_field()}}
                                                    @method('PUT')
                                                    <div class="form-group mb-3">
                                                        <select name="reasons_{{$order->id}}" id="reasons_{{$order->id}}" class="form-control rounded-pill border-0 shadow-sm px-4">
                                                            <option value="Change delivery address" selected>{{ __('content.Change delivery address')}}</option>
                                                            <option value="Change products in order">{{ __('content.Change products in order')}}</option>
                                                            <option value="Don't want to buy">{{ __("content.Don't want to buy")}}</option>
                                                            <option value="Wrong/duplicate order">{{ __('content.Wrong/duplicate order')}}</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('content.Send request')}}</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="ratingOrder_shipped_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('postComments',$order->id)}}" method="post">
                                                {{csrf_field()}}
                                                <div class="form-title text-left my-account-section__header">
                                                    <h4>{{ __('content.Rating order')}} {{$order->id}}</h4>
                                                </div>
                                                @foreach($order_details as $order_detail)
                                                @if($order_detail->id_order != $order->id)
                                                @else
                                                <div class="d-flex flex-column  align-items-baseline">
                                                    <div class="order-content_item-list container-fluid" style="border-top: none;">
                                                        <div class="order-content_item-list_wrapper">
                                                            <div class="order-content_item">
                                                                <div class="order-content_item_row">
                                                                    <div class="order-content_item_details">
                                                                        <div class="order-content_item_product">
                                                                            <div class="order-content_item_image">
                                                                                <div class="order-image_wrapper">
                                                                                    <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="order-content_item_detail-content">
                                                                                <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 text-center" style="padding-top: 10px;padding-bottom: 23px">
                                                        <!-- <input type="number" name="rate[{{$order_detail->id}}]"> -->
                                                        <div class="ratedd">
                                                            <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="1" />
                                                            <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="2" />
                                                            <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="3" />
                                                            <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="4" />
                                                            <input type="radio" name="rate[{{$order_detail->id}}]" class="rated" value="5" />
                                                        </div>
                                                    </div>
                                                    <div class="comments-content w-100">
                                                        <textarea name="comments[{{$order_detail->id}}]" id="comments_{{$order_detail->id}}" cols="30" rows="10" maxlength="300" style="resize: none; width: 100%; ; height:136px" placeholder="{{ __('content.Please comment why product is not good')}}"></textarea>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('content.Send request')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="viewRating_shipped_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-title text-left my-account-section__header">
                                                <h4>{{ __('content.View rated')}} {{ __('content.order')}} {{$order->id}}</h4>
                                            </div>
                                            @foreach($rating as $order_detail)
                                            @if($order_detail->id_order == $order->id)
                                            <div class="d-flex flex-column  align-items-baseline">
                                                <div class="order-content_item-list container-fluid" style="border-top: none;">
                                                    <div class="order-content_item-list_wrapper">
                                                        <div class="order-content_item">
                                                            <div class="order-content_item_row">
                                                                <div class="order-content_item_details">
                                                                    <div class="order-content_item_product">
                                                                        <div class="order-content_item_image">
                                                                            <div class="order-image_wrapper">
                                                                                <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="order-content_item_detail-content">
                                                                            <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="w-100 text-left" style="padding-top: 10px;padding-bottom: 23px; color: #d8c223">
                                                        @for($i = 1; $i <= $order_detail->rate; $i++)
                                                            <i class="fas fa-star"></i>
                                                            @endfor
                                                    </div>
                                                    <div class="comments-content w-100">
                                                        <p>{{$order_detail->comments}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-about2" role="tabpanel" aria-labelledby="nav-about-tab2">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            @if(count($cancel) == 0)
                            <h1>{{ __('content.Not found')}}</h1>
                            @else
                            @foreach($cancel as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">{{ __('content.Order')}} {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                            {{ __('content.Not rated')}}
                                            </div>
                                        </div>
                                        @foreach($order_details as $order_detail)
                                        @if($order_detail->id_order != $order->id)
                                        @else
                                        <div class="order-content_item-list container-fluid">
                                            <div class="order-content_item-list_wrapper">
                                                <div class="order-content_item">
                                                    <div class="order-content_item_row">
                                                        <div class="order-content_item_details">
                                                            <div class="order-content_item_product">
                                                                <div class="order-content_item_image">
                                                                    <div class="order-image_wrapper">
                                                                        <img src="{{ asset('upload/'.$order_detail->products->image1) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="order-content_item_detail-content">
                                                                    <div class="order-content_item-name">{{$order_detail->products->name_product}}</div>
                                                                    <div class="order-content_item-quantity">x {{$order_detail->quantity}}</div>
                                                                </div>
                                                                <div class="order-content_item_price">
                                                                    <div class="order-content_item_price_text">
                                                                        <div>
                                                                            {{number_format($order_detail->price,0,',','.')}}đ
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="order-card_button_container">
                                        <div class="purchase-card_button container-fluid">
                                            <div class="purchase-card_button_total-payment">
                                                <div class="purchase-card_button_label-price">
                                                    <span>{{ __('content.Total')}}: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <a href="{{asset('cart/add_again/'.$order->id)}}">
                                                        <button class="btn btn-red text-white">{{ __('content.Buy again')}}</button>
                                                    </a>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">{{ __('content.Tracking orders')}}</button>
                                                    </a>
                                                </div>
                                            </div>
                                          

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- modal -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/rating.js')}}"></script>
<script>
    $('.ratedd').rating()
</script>
@stop