@extends('layouts.master')
@section('title','Product details')
@section('main')
<link rel="stylesheet" href="{{asset('css/frontend/product-details.css')}}">
<div class="section-no_padding">
    <div class="container">
        <div class="breadcrumb-bar">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
               
                <li><a href="#">{{$items->categories->name}}</a></li>
                <li>{{$items->name_product}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="section no_padding_top">
    <div class="container bg-white">
        <div class="product-details">
            <div class="no_wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-img_main">
                            <img src="{{asset('/upload/' .$items->image1)}}" alt="">
                            <img src="{{asset('/upload/' .$items->image2)}}" alt="">
                            <img src="{{asset('/upload/' .$items->image3)}}" alt="">
                            <img src="{{asset('/upload/' .$items->image4)}}" alt="">
                        </div>
                        <div class="product-img_slide">
                        <img src="{{asset('/upload/' .$items->image1)}}" alt="">
                            <img src="{{asset('/upload/' .$items->image2)}}" alt="">
                            <img src="{{asset('/upload/' .$items->image3)}}" alt="">
                            <img src="{{asset('/upload/' .$items->image4)}}" alt="">
                        </div>
                        <div id="slick-nav-1" class="products-slick-nav_left">
                            <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: inline-block;">
                                <i class="far fa-arrow-left"></i>
                            </button>

                        </div>
                        <div id="slick-nav-2" class="products-slick-nav">

                            <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: inline-block;">
                                <i class="far fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details_title text-uppercase">
                            <h3>{{$items->name_product}}</h3>
                        </div>
                        <div class="star-reviews-rating">
                            <div class="star_rating">
                                <div class="star_rating_number">
                                    {{$items->like}}
                                </div>
                                <div class="star-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="product_price">
                            <div class="product_price_current">
                                {{$items->price}}
                            </div>
                            <div class="product_price_old">
                                <del>$999</del>
                            </div>
                        </div>
                        <div class="product-details_sku text-uppercase">
                            
                        </div>
                        <div class="product_track_side d-flex">
                            <h5>OEM track side:</h5>
                            <span>{{$items->size}}</span>
                        </div>
                        <div class="transport d-flex flex-column">
                            <div class="flex_nowrapper d-flex ">
                                <div class="transport_title">
                                    <p>Vận chuyển</p>
                                </div>
                                <div class="transport_method">
                                    <div class="transport_free_shipping">
                                        <div class="free_shipping_content">
                                            <div class="img_free_shipping d-flex align-items-center">
                                                <img src="{{asset('image/icon-free-shipping.png')}}" alt="" width="25px" height="18px"> Miễn phí vận chuyển
                                            </div>
                                            <div class="gRuynh">
                                                Miễn Phí Vận Chuyển khi đơn đạt giá trị tối thiểu
                                            </div>
                                        </div>
                                    </div>

                                    <div class="transport_method_wrapper d-flex flex-row">
                                        <div class="transport_method_icon">
                                            <i class="fal fa-truck"></i>
                                        </div>
                                        <div class="flex item-center">
                                            <div class="transport_method_title d-flex">
                                                <p>Vận chuyển tới</p>
                                                <div class="d-flex">
                                                    <div class="address d-flex item-center">
                                                        <span>Huyện Quảng Điền, Thừa Thiên Huế</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="trasnsport_fee d-flex">
                                                <div class="transport_method_title d-flex">
                                                    <p>Phí vận chuyển</p>
                                                    <div class="d-flex">
                                                        <div class="currency d-flex item-center">
                                                            <span>₫19.000 - ₫29.000</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product_quant">
                            <div class="product-quant_title">
                                <p>Số lượng</p>
                            </div>
                            <div class="product_quant_input">
                                <div style="margin-right: 15px">
                                    <div class="button_quant_input">
                                        <button class="_quant">-</button>
                                        <input class="_quant input_quant" type="text" value="1">
                                        <button class="_quant">+</button>
                                    </div>
                                </div>
                                <p>Sản phẩm có sẵn</p>
                            </div>
                        </div>
                        <div class="button-add_cart">
                            <button type="button" class="btn btn-primary add_wishlist">
                                <i class="fal fa-cart-plus"></i>
                                Thêm vào giỏ hàng</button>
                            <button type="button" class="btn btn-primary">Mua ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container bg-white">
        <div class="row">
            <div class="product_details">
                <div class="product_details_title text-uppercase">
                    <h4>chi tiết sản phẩm</h4>
                </div>
                <div class="product_details_content">
                    <div class="details_content_category d-flex">
                        <label class="label_title">Danh mục</label>
                        <div>
                            <ol>
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$items->categories->name}}</li>
                            </ol>
                        </div>
                    </div>
                    <div class="details_content_brand d-flex">
                        <label class="label_title">Thương hiệu</label>
                        <div>
                            <a href="">{{$items->brands->name}}</a>
                        </div>
                    </div>
                    <div class="details_content_store d-flex">
                        <label class="label_title">Kho hàng</label>
                        <div>
                            <a href="">22</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_description">
                <div class="product_description_title text-uppercase">
                    <h4>mô tả sản phẩm</h4>
                </div>
                <div class="product_description_content">
                    <p><?php echo $items->description ?></p>

                </div>
            </div>
            <div class="product_benefits">
                <div class="product_benefits_title text-uppercase">
                    <h4>benefits</h4>
                </div>
                <div class="product_benefits_content">
                    <div class="container bg-white">
                        <ul>
                            <li><i class="fal fa-cogs"></i>
                                <b>Lắp đặt miễn phí</b>
                                lúc giao hàng
                            </li>
                            <li><i class="far fa-undo-alt"></i>
                            Hư gì đổi nấy 
                            <b>12 tháng</b>
                            tận nhà (miễn phí tháng đầu) </li>
                            <li><i class="fad fa-mobile-android-alt"></i>
                            Đổi trả và bảo hành cực dễ
                            <b>chỉ cần số điện thoại</b></li>
                            <li>
                            <i class="fad fa-shield-check"></i>
                            Bảo hành <b>chính hãng 2 năm</b>, có người đến tận nhà</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container bg-white">
        <div class="row">
            <div class="product_reviews">
                <div class="product_reviews_head">
                    <div class="product_reviews_title text-uppercase">
                        <h4>đánh giá sản phẩm</h4>
                    </div>
                    <div class="product_reviews_content">
                        @foreach ($comments as $comment)
                        <div class="reviews_wrapper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-2">
                                        <div class="logo_acc">
                                            <div>
                                                <img src="Capture.PNG" height="50px" width="50px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-7">
                                        <div class="user_acc d-flex align-items-center">
                                            <div class="row">
                                                <div class="username_acc">
                                                    <span>{{$comment->customers->name}}</span>
                                                </div>
                                                <div class="datetime_post d-flex align-items-center">
                                                    <span>March 19 20201, 09:40PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3">
                                        <div class="user_rating">
                                            <div class="star-icon">
                                            @for($i = 1; $i <= $comment->rate; $i++)
                                                <i class="fas fa-star"></i>
                                                
                                            @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user_reviews_content">
                                    <p>{{$comment->comments}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop