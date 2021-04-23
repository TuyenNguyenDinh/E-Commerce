@extends('layouts.master')
@section('title','Electro')
@section('main')

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('image/lg-43nano79tnd-2-org.jpg')}}">
                    </div>
                    <div class="shop-body">
                        <h3>Tivi<br>Collection</h3>
                        <a href="#" class="cta-btn text-uppercase">shop now
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('image/panasonic-nr-ba229pkvn-1-1-org.jpg')}}">
                    </div>
                    <div class="shop-body">
                        <h3>Perfect<br>Quality</h3>
                        <a href="#" class="cta-btn text-uppercase">shop now
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{asset('image/shop01.webp')}}">
                    </div>
                    <div class="shop-body">
                        <h3>More<br>Brands</h3>
                        <a href="#" class="cta-btn text-uppercase">shop now
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="products-tabs">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane face show active" id="product" role="tabpanel" aria-labelledby="home-tab">
                                <div class="products-slick ">
                                    @foreach ($products as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{asset('upload/'.$product->image1)}}" alt="">
                                            <div class="product-label">
                                                @if($product->discount == 0)
                                                <span class="new">new</span>
                                                @else
                                                <span class="sale">-{{$product->discount}}%</span>
                                                <span class="new">new</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->categories->name}}</p>

                                            <h3 class="product-name">
                                                <a href="#">{{$product->name_product}}</a>
                                            </h3>
                                            <h4 class="product-price">
                                                {{number_format($product->price,0,',','.')}} đ
                                                @if($product->price == $product->old_price)
                                                @else
                                                <del class="product-old-price">{{number_format($product->old_price,0,',','.')}} đ</del>
                                                @endif
                                            </h4>
                                            <div class="product-rating">
                                                @for($i = 1; $i <= $product->like; $i++)
                                                    <i class="fas fa-star"></i>
                                                    @endfor
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-compare">
                                                    <a href="{{asset('wishlist/add/'.$product->id.'.html')}}">
                                                        <i class="fas fa-exchange-alt"></i>
                                                        <span class="tooltipp"> add to wishlist</span>
                                                    </a>
                                                </button>
                                                <button class="details">
                                                    <a href="{{asset('details/'.$product->id.'.html')}}" style="color: black;">
                                                        <i class="fas fa-eye"></i>
                                                        <span class="tooltipp">details</span>
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{asset('cart/add/'.$product->id)}}">
                                                <button class="add-to-cart-btn">
                                                    <i class="far fa-shopping-cart">
                                                    </i>
                                                    add to cart
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hot-deal" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>Minute</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>seconds</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p style="color: #FFF;">New collection up to 50% OFF</p>
                    <a href="#" class="btn btn-primary cta-btn text-uppercase">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Product Selling</h3>
                    <div class="section-nav">
                        <div class="section-tab-nav tab-nav">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="products-tabs">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane face show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="products-slick ">
                                    @foreach($products_selling as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{asset('upload/'.$product->image1)}}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-{{$product->discount}}%</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->categories->name}}</p>
                                            <h3 class="product-name">
                                                <a href="#">{{$product->name_product}}</a>
                                            </h3>
                                            <h4 class="product-price">
                                                {{number_format($product->price,0,',','.')}} đ
                                                @if($product->price == $product->old_price)
                                                @else
                                                <del class="product-old-price">{{number_format($product->old_price,0,',','.')}} đ</del>
                                                @endif
                                            </h4>
                                            <div class="product-rating">
                                                @for($i = 1; $i <= $product->like; $i++)
                                                    <i class="fas fa-star"></i>
                                                    @endfor
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-compare">
                                                    <a href="{{asset('wishlist/add/'.$product->id.'.html')}}">
                                                        <i class="fas fa-exchange-alt"></i>
                                                        <span class="tooltipp"> add to wishlist</span>
                                                    </a>
                                                </button>
                                                <button class="details">
                                                    <a href="{{asset('details/'.$product->id.'.html')}}" style="color: black;">
                                                        <i class="fas fa-eye"></i>
                                                        <span class="tooltipp">details</span>
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{asset('cart/add/'.$product->id)}}">
                                                <button class="add-to-cart-btn">
                                                    <i class="far fa-shopping-cart">
                                                    </i>
                                                    add to cart
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="benefit-items" class="container">

    <div class="row">
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{asset('image/icon-1.png')}}" alt="">
                </div>
                <div class="sb-text">
                    <h6>Free Shipping</h6>
                    <p>For all order over 99$</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{asset('image/icon-2.png')}}" alt="">
                </div>
                <div class="sb-text">
                    <h6>Delivery on time</h6>
                    <p>If good have problems</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit border-none">
                <div class="sb-icon">
                    <img src="{{asset('image/us-dollar-48.png')}}" alt="">
                </div>
                <div class="sb-text">
                    <h6>Secure payment</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="partent-logo">
    <div class="container">
        <div class="logo-slick">
            @foreach($brands_image as $brand)
            <div>
                <a href="{{asset('brands/'.$brand->id.'.html')}}">
                    <img src="{{asset('upload/'.  $brand->image)}}" alt=""></a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop