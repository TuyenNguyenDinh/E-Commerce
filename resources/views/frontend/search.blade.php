@extends('layouts.master')
@section('title','Search')
@section('main')
<?php
$key = request()->get('key');
?>

<link rel="stylesheet" href="{{asset('css/frontend/search.css')}}">
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3 class="title">Kết quả tim kiếm cho từ khóa: </h3>
                </div>
            </div>
            <div class="col-lg-2 filter_respon">
                @include('frontend.advanced_search')
            </div>
            <div class="col-lg-10">
                <div class="container">
                    <div class="products-tabs">
                        @if(count($listProduct) != 0)
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane face show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="products ">
                                    <div class="row">
                                        @foreach ($listProduct as $item)
                                        <div class="product col-lg-3 col-md-6 col-sm-6">
                                            <div class="product-img">
                                                <img src="{{asset('upload/'. $item->image1)}}" alt="">
                                                <div class="product-label">
                                                    <span class="new">new</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$item->categories->name}}</p>
                                                <h3 class="product-name">
                                                    <a href="#">{{$item->name_product}}</a>
                                                </h3>
                                                <h4 class="product-price">
                                                    {{number_format($item->price,0,',','.')}} đ
                                                    <del class="product-old-price">{{number_format($item->price,0,',','.')}} đ</del>
                                                </h4>
                                                <div class="product-rating">
                                                    @for ($i = 1; $i <= $item->like; $i++)
                                                        <i class="fas fa-star"></i>
                                                        @endfor
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-compare">
                                                        <a href="{{asset('wishlist/add/'.$item->id.'.html')}}">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span class="tooltipp"> add to wishlist</span>
                                                        </a>
                                                    </button>
                                                    <button class="details">
                                                        <a href="{{asset('details/'.$item->id.'.html')}}" style="color: black;">
                                                            <i class="fas fa-eye"></i>
                                                            <span class="tooltipp">details</span>
                                                        </a>
                                                    </button>
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
                        @else
                        <div class="error-page">
                            <div class="error-content">
                                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Not found.</h3>
                            </div>
                            <!-- /.error-content -->
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            {{$listProduct->withQueryString()->links()}}
        </div>
    </div>
</div>
@endsection