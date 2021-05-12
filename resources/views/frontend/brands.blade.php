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
                    @if(count($products_brand) != 0)
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
                                                <a href="{{asset('details/'.$product->id.'.html')}}">{{$product->name_product}}</a>
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
                                                        <i class="fas fa-heart"></i>
                                                        <span class="tooltipp"> {{ __('content.Add to wishlist')}}</span>
                                                    </a>
                                                </button>
                                                <button class="details">
                                                    <a href="{{asset('details/'.$product->id.'.html')}}" style="color: black;">
                                                        <i class="fas fa-eye"></i>
                                                        <span class="tooltipp">{{ __('content.details')}}</span>
                                                    </a>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            @if($product->quantity != 0)
                                            <a href="{{asset('cart/add/'.$product->id.'/1')}}">
                                                <button class="add-to-cart-btn">
                                                    <i class="far fa-shopping-cart">
                                                    </i>
                                                    {{ __('content.add to cart')}}
                                                </button>
                                            </a>
                                            @else
                                            <button class="add-to-cart-btn">
                                                <i class="far fa-shopping-cart">
                                                </i>
                                                {{ __('content.out of stock')}}
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="pagination">
                                {{$products_brand->links()}}
                            </div>
                        </div>

                    </div>
                    @else
                    <div class="error-page">
                        <div class="error-content">
                            <div class="wrapper">
                                <h3><i class="fas fa-exclamation-triangle text-warning"></i>Oops! {{ __('content.Not found.')}}</h3>
                            </div>
                        </div>
                        <!-- /.error-content -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop