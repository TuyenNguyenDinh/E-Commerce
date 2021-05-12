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
                        <h3>Tivi<br>{{ __('content.Collection')}}</h3>
                        <a href="{{asset('category/1.html')}}" class="cta-btn text-uppercase">shop now
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
                        <h3>{{ __('content.Perfect')}}<br>{{ __('content.Quality')}}</h3>
                        <a class="cta-btn text-uppercase" style="cursor:pointer">shop now
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
                        <h3>{{ __('content.More')}}<br>{{ __('content.Brands')}}</h3>
                        <a class="cta-btn text-uppercase" style="cursor:pointer">shop now
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
                    <h3 class="title">{{ __('content.Products')}}</h3>
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
                                                </button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hot-deal" class="section">
    <div class="container">
        <div class="hot-deal">
            @foreach($banner as $img)
            <img src="{{asset('upload/'.$img->image)}}" alt="">
            @endforeach
        </div>
    </div>
</div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{ __('content.Product Selling')}}</h3>
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
                                                </button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{asset('cart/add/'.$product->id)}}">
                                                <button class="add-to-cart-btn">
                                                    <i class="far fa-shopping-cart">
                                                    </i>
                                                    {{ __('content.add to cart')}}
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
                    <h6>{{ __('content.Free Shipping')}}</h6>
                    <p>{{ __('content.For all order over 30.000.000 đ')}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit">
                <div class="sb-icon">
                    <img src="{{asset('image/icon-2.png')}}" alt="">
                </div>
                <div class="sb-text">
                    <h6>{{ __('content.Delivery on time')}}</h6>
                    <p>{{ __('content.If there is no problem')}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="single-benefit border-none">
                <div class="sb-icon">
                    <img src="{{asset('image/us-dollar-48.png')}}" alt="">
                </div>
                <div class="sb-text">
                    <h6>{{ __('content.Secure payment')}}</h6>
                    <p>{{ __('content.100% secure payment')}}</p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="partent-logo">
    <div class="container">
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">{{ __('content.Brands')}}</h3>
                <div class="section-nav">
                    <div class="section-tab-nav tab-nav">
                    </div>
                </div>
            </div>
        </div>
        <div class="logo-slick">
            @foreach($brands_image as $brand)
            <div>
                <a href="{{asset('brands/'.$brand->id.'.html')}}">
                    <img src="{{asset('upload/'.  $brand->image)}}" alt="Click details"></a>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop