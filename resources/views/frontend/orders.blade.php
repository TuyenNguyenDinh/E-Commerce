@extends('layouts.profile')
@section('profile')
<div class="account-tabs col-lg-9 col-md-12">
    <div class="tab-overflow_x">
        <div class="row">
            <div class="tab-pills_order w-100">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Chờ xác nhận</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Chờ lấy hàng</a>
                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Đang giao</a>
                        <a class="nav-item nav-link" id="nav-about-tab1" data-toggle="tab" href="#nav-about1" role="tab" aria-controls="nav-about1" aria-selected="false">Đã giao</a>
                        <a class="nav-item nav-link" id="nav-about-tab2" data-toggle="tab" href="#nav-about2" role="tab" aria-controls="nav-about2" aria-selected="false">Đã hủy</a>
                    </div>
                </nav>
                <div class="tab-content py-4 px-4 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @if(count($orders) == 0)
                        <h1>không có hóa đơn</h1>
                        @else
                        @foreach($orders as $order)
                        <div class="purchase-list-page_checkout">
                            <div class="order-card_container">
                                <div class="order-card_content">
                                    <div class="order-content_header d-flex container-fluid">
                                        <div class="order-content_header_order" style="flex: 1">
                                            <div class="order-content_header_order_id">Order {{$order->id}}</div>
                                        </div>
                                        <div class="order-content_header_status_wrapper">
                                            <a href="#" class="order-content_header_order_delivery_status">
                                                <i class="fal fa-truck"></i>
                                                <span>{{ $order->status }}</span>
                                            </a>
                                        </div>
                                        <div class="order-content_header_status">
                                            @foreach($rating as $rate)
                                                @if($rate->id_order == $order->id)
                                                    Rated
                                                @else
                                                    Not rated
                                                @endif
                                                
                                            @endforeach
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
                                                <span>Total: </span>
                                            </div>
                                            <div class="purchase-card_button_total_price">
                                                <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                            </div>
                                        </div>
                                        @if($order->status == "Checking order" )
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">Cancel order</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
                                                </a>
                                            </div>
                                        </div>
                                        @elseif($order->status == "Cancel")
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white">Buy again</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
                                                </a>
                                            </div>
                                        </div>
                                        @elseif($order->status == "Shipped")
                                        @foreach($rating as $rate)
                                            @if($rate->id_order == $order->id)
                                            <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white">Review rated</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
                                                </a>
                                            </div>
                                        </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white">Rate order</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
                                                </a>
                                            </div>
                                        </div>
                                            @endif
                                                
                                        @endforeach

                                        @else
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white" disabled>Received</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
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
                                            <h4>Cancel order {{$order->id}}</h4>
                                            <div class="my-account-section__header-subtitle">
                                                Please choose reasons cacelled order
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-baseline">
                                            <form action="{{ route('cancel_orders' ,$order->id)}}" method="post" style="width: 100%">
                                                {{csrf_field()}}
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <select name="reasons_{{$order->id}}" id="reasons_{{$order->id}}" class="form-control rounded-pill border-0 shadow-sm px-4">
                                                        <option value="Change delivery address" selected>Change delivery address</option>
                                                        <option value="Change products in order">Change products in order</option>
                                                        <option value="Don't want to buy">Don't want to buy</option>
                                                        <option value="Wrong/duplicate order">Wrong/duplicate order</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Send request</button>
                                            </form>
                                        </div>

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
                            <h1>không có hóa đơn</h1>
                            @else
                            @foreach($waiting_check as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">Order {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                                Chưa đánh giá
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
                                                    <span>Total: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Checking order" )
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">Cancel order</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Cancel")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Buy again</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Shipped")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

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
                            <h1>không có hóa đơn</h1>
                            @else
                            @foreach($waiting_the_goods as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">Order {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                                Chưa đánh giá
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
                                                    <span>Total: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Checking order" )
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">Cancel order</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Cancel")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Buy again</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Shipped")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

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
                            <h1>không có hóa đơn</h1>
                            @else
                            @foreach($shipping as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">Order {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                                Chưa đánh giá
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
                                                    <span>Total: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Checking order" )
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">Cancel order</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Cancel")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Buy again</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Shipped")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

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
                            <h1>không có hóa đơn</h1>
                            @else
                            @foreach($shipped as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">Order {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                            
                                           
                                            @foreach($rating as $rate)
                                                @if($rate->id_order == $order->id)
                                                    Rated
                                                @else
                                                    Not rated
                                                @endif
                                                
                                            @endforeach
                                            
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
                                                    <span>Total: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Checking order" )
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">Cancel order</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Cancel")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Buy again</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Shipped")
                                            @foreach($rating as $rate)
                                            @if($rate->id_order == $order->id)
                                            <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white">Review rated</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
                                                </a>
                                            </div>
                                        </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white">Rate order</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <a href="{{route('tracking_orders', $order->id)}}">
                                                    <button class="btn btn-light">Tracking orders</button>
                                                </a>
                                            </div>
                                        </div>
                                            @endif
                                                
                                        @endforeach
                                            @else
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
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
                            <h1>không có hóa đơn</h1>
                            @else
                            @foreach($cancel as $order)
                            <div class="purchase-list-page_checkout">
                                <div class="order-card_container">
                                    <div class="order-card_content">
                                        <div class="order-content_header d-flex container-fluid">
                                            <div class="order-content_header_order" style="flex: 1">
                                                <div class="order-content_header_order_id">Order {{$order->id}}</div>
                                            </div>
                                            <div class="order-content_header_status_wrapper">
                                                <a href="#" class="order-content_header_order_delivery_status">
                                                    <i class="fal fa-truck"></i>
                                                    <span>{{ $order->status }}</span>
                                                </a>
                                            </div>
                                            <div class="order-content_header_status">
                                                Chưa đánh giá
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
                                                    <span>Total: </span>
                                                </div>
                                                <div class="purchase-card_button_total_price">
                                                    <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                                </div>
                                            </div>
                                            @if($order->status == "Checking order" )
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" data-toggle="modal" data-target="#cancelOrder_{{$order->id}}">Cancel order</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Cancel")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Buy again</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @elseif($order->status == "Shipped")
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white">Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @else
                                            <div class="purchase-card_button_container">
                                                <div class="purchase-card_button-show">
                                                    <button class="btn btn-red text-white" disabled>Received</button>
                                                </div>
                                                <div class="purchase-card_button-show">
                                                    <a href="{{route('tracking_orders', $order->id)}}">
                                                        <button class="btn btn-light">Tracking orders</button>
                                                    </a>
                                                </div>
                                            </div>
                                            @endif

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
@stop