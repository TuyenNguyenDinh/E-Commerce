@extends('layouts.master')
@section('title','Categories')
@section('main')

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{$cate_name->name}}</h3>
                    <div class="section-nav">
                        <div class="section-tab-nav tab-nav">
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-product">
                                    <a class=" active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-product">
                                    <a id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-product">
                                    <a id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="products-tabs">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane face show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="products- ">
                                    <div class="row">
                                        @foreach($products as $product)
                                        <div class="product col-lg-3 col-md-6 col-sm-6">
                                            <div class="product-img">
                                                <img src="{{asset('upload/'. $product->image1)}}" alt="">
                                                <div class="product-label">
                                                    <span class="new">new</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$product->categories->name}}</p>
                                                <h3 class="product-name">
                                                    <a href="#">{{$product->name_product}}</a>
                                                </h3>
                                                <h4 class="product-price">
                                                    {{number_format($product->price,0,',','.')}} đ
                                                    <del class="product-old-price">{{number_format($product->old_price,0,',','.')}} đ</del>
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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                ...</div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                ...</div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop