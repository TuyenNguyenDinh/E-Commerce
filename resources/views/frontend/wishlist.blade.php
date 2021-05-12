@extends('layouts.master')
@section('title','Wishlist')
@section('main')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Wishlist</h3>
                </div>
            </div>
            <div class="col-md-12">
                @if(DB::table('wishlist')->where('id_customer',Auth::guard('customer')->user()->id)->count() == 0)
                <div class="wrapper">
                    <h3>{{ __('content.Not found')}}</h3>
                </div>
                @else
                <div class="container">
                    <div class="products-tabs">
                        <div class="products">
                            <div class="row">
                                @foreach($wishlist as $product_list)
                                <div class="product col-lg-3 col-md-6 col-sm-6">
                                    <div class="product-img">
                                        <img src="{{asset('upload/'. $product_list->products->image1)}}" alt="">
                                        <div class="product-label">
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{$product_list->products->categories->name}}</p>
                                        <h3 class="product-name">
                                            <a href="{{asset('details/'.$product_list->products->id.'.html')}}">{{$product_list->products->name_product}}</a>
                                        </h3>
                                        <h4 class="product-price">
                                            {{number_format($product_list->products->price,0,',','.')}} đ
                                            @if($product_list->products->price == $product_list->products->old_price)
                                            @else
                                            <del class="product-old-price">{{number_format($product_list->products->old_price,0,',','.')}} đ</del>
                                            @endif
                                        </h4>
                                        <div class="product-rating">
                                            @for($i = 1; $i <= $product_list->products->like; $i++)
                                                <i class="fas fa-star"></i>
                                                @endfor
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-compare">
                                                <a href="{{asset('wishlist/add/'.$product_list->products->id.'.html')}}">
                                                    <i class="fas fa-heart"></i>
                                                    <span class="tooltipp"> {{ __('content.Add to wishlist')}}</span>
                                                </a>
                                            </button>
                                            <button class="details">
                                                <a href="{{asset('details/'.$product_list->products->id.'.html')}}" style="color: black;">
                                                    <i class="fas fa-eye"></i>
                                                    <span class="tooltipp">{{ __('content.details')}}</span>
                                                </a>
                                            </button>
                                            <button class="delete">
                                                <a href="{{asset('wishlist/delete/'.$product_list->id.'.html')}}" style="color: black;">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <span class="tooltipp">{{ __('content.delete')}}</span>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        @if($product_list->products->quantity != 0)
                                        <a href="{{asset('cart/add/'.$product_list->products->id.'/1')}}">
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
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@stop