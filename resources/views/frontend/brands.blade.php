@extends('layouts.master')
@section('title','Brands')
@section('main')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{$brands->name}}</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="container">
                    <div class="products-tabs">
                        <div class="tab-content" id="myTabContent">
                                <div class="products">
                                    <div class="row">
                                    @foreach($products_brand as $product)
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
                                                    <del class="product-old-price">{{$product->old_price}} đ</del>
                                                </h4>
                                                <div class="product-rating">
                                                @for($i = 1; $i <= $product->like; $i++)
                                                    <i class="fas fa-star"></i>
                                                   @endfor 
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                        <span class="tooltipp"> add to compare</span>
                                                    </button>
                                                    <button class="details">
                                                    <a href="{{asset('details/'.$product->id.'.html')}}" style="color: black;">
                                                        <i class="fas fa-eye"></i>
                                                        <span class="tooltipp">details</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn">
                                                    <i class="far fa-shopping-cart">
                                                    </i>
                                                    add to cart
                                                </button>
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
@stop