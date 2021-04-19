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
                        @foreach($orders as $order)
                        @if(isset($order->id_customer) || $order->ic_customer == Auth::guard('customer')->user()->id)
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
                                    @foreach($orders_details as $orders_detail)
                                    <div class="order-content_item-list container-fluid">
                                        <div class="order-content_item-list_wrapper">
                                            <div class="order-content_item">
                                                <div class="order-content_item_row">
                                                    <div class="order-content_item_details">
                                                        <div class="order-content_item_product">
                                                            <div class="order-content_item_image">
                                                                <div class="order-image_wrapper">
                                                                    <img src="{{ asset('upload/'.$orders_detail->products->image1) }}" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="order-content_item_detail-content">
                                                                <div class="order-content_item-name">{{$orders_detail->products->name_product}}</div>
                                                                <div class="order-content_item-quantity">x {{$orders_detail->quantity}}</div>
                                                            </div>
                                                            <div class="order-content_item_price">
                                                                <div class="order-content_item_price_text">
                                                                    <div>
                                                                        {{number_format($orders_detail->price,0,',','.')}}đ
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="order-card_button_container">
                                    <div class="purchase-card_button container-fluid">
                                        <div class="purchase-card_button_total-payment">
                                            <div class="purchase-card_button_label-price">
                                                <span>Tổng thanh toán: </span>
                                            </div>
                                            <div class="purchase-card_button_total_price">
                                                <h3>{{number_format($order->total_price,0,',','.')}}đ</h3>
                                            </div>
                                        </div>
                                        <div class="purchase-card_button_container">
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-red text-white">Mua lần nữa</button>
                                            </div>
                                            <div class="purchase-card_button-show">
                                                <button class="btn btn-light">Chi tiết đơn hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <h1>không có hóa đơn</h1>                        
                        @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-about1" role="tabpanel" aria-labelledby="nav-about-tab1">
                        Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-about2" role="tabpanel" aria-labelledby="nav-about-tab2">
                        2 Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop