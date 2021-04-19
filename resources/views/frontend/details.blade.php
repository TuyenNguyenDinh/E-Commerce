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
                                @if( round($comments->avg('rate')) == 0)
                                <div class="star_rating_number">
                                    Chưa có đánh giá
                                </div>
                                @else
                                <div class="star_rating_number">
                                    {{round($comments->avg('rate'))}}
                                </div>
                                <div class="star-icon">
                                    @for($i = 1; $i <= round($comments->avg('rate')); $i++)
                                        <i class="fas fa-star"></i>
                                        @endfor
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="product_price">
                            <div class="product_price_current">
                                {{number_format($items->price,0,',','.')}} đ
                            </div>
                            @if($items->price == $items->old_price)
                            @else
                            <div class="product_price_old">
                                <del>{{number_format($items->old_price,0,',','.')}} đ</del>
                            </div>
                            <div class="product_discount">
                                -{{$items->discount}}%
                            </div>
                            @endif
                        </div>
                        <div class="product-details_sku text-uppercase">

                        </div>
                        <div class="product_track_side d-flex">
                            <h5>Kích thước:</h5>
                            <span> Dài {{$items->lenght}} cm</span>
                            <span> Dài {{$items->weight}} cm</span>
                            <span> Dài {{$items->height}} cm</span>
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
                                                        @if(Auth::guard('customer')->check())
                                                        <span>{{Auth::guard('customer')->user()->district->district_name}}</span>
                                                        <span>,</span>
                                                        <span> <span>{{Auth::guard('customer')->user()->province->province}}</span></span>
                                                        @else
                                                        <select class="sl_province" name="province" id="province">
                                                            <option value="0" selected disabled>Chọn tỉnh</option>
                                                            @foreach($provinces as $province)
                                                            <option value="{{$province->id}}">{{ucfirst($province->province)}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span>, </span>
                                                        <select class="sl_district" name="district" id="district">
                                                            <option value="0" selected disabled>Chọn Quận(Huyện)</option>
                                                        </select>
                                                        @endif
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
                                        <button class="_quant_minus" onclick="decrement()">-</button>
                                        <input class="_quant input_quant" type="number" id="qty_number" name="qty_number" value="1" min=1 max={{$items->quantity}}>
                                        <button class="_quant_plus" onclick="increment()">+</button>
                                    </div>
                                </div>
                                <p>{{$items->quantity}}Sản phẩm có sẵn</p>
                            </div>
                        </div>
                        <div class="button-add_cart">
                            <a href="{{asset('cart/add/'.$items->id)}}">
                                <button type="button" class="btn btn-primary add_wishlist">
                                    <i class="fal fa-cart-plus"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </a>
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
                <div id="product_description_content" class="product_description_content">
                    <?php echo $items->description ?>
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
                                tận nhà (miễn phí tháng đầu)
                            </li>
                            <li><i class="fad fa-mobile-android-alt"></i>
                                Đổi trả và bảo hành cực dễ
                                <b>chỉ cần số điện thoại</b>
                            </li>
                            <li>
                                <i class="fad fa-shield-check"></i>
                                Bảo hành <b>chính hãng 2 năm</b>, có người đến tận nhà
                            </li>
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
                    @if(round($comments->avg('rate')) == 0)

                    <h1>Chưa có đánh giá</h1>
                    @else
                    <div class="product_reviews_content">
                        @foreach ($comments as $comment)
                        @for($i = 1; $i <= round($comment->avg('rate')); $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                            <div class="reviews_wrapper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-2">
                                        <div class="logo_acc">
                                            <div>
                                                <img src="{{ asset('upload/'.$comment->customers->image_acc) }}" height="50px" width="50px">
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
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{ asset('js/frontend/showmore/jquery.show-more.js') }}"></script>
<script type="text/javascript">
    (function($, window) {
        var arrowWidth = 25;

        $.fn.sl_province = function(settings) {
            return this.each(function() {

                $(this).change(function() {
                    var $this = $(this);

                    // create test element
                    var text = $this.find("option:selected").text();

                    var $test = $("<span>").html(text).css({
                        "font-size": $this.css("font-size"), // ensures same size text
                        "visibility": "hidden" // prevents FOUC
                    });


                    // add to body, get width, and get out
                    $test.appendTo($this.parent());
                    var width = $test.width();
                    $test.remove();

                    // set select width
                    $this.width(width + arrowWidth);

                    // run on start
                }).change();

            });
        };

        // run by default
        $("select.sl_province").sl_province();

    })(jQuery, window);


    function increment() {
        document.getElementById('qty_number').stepUp();
    }

    function decrement() {
        document.getElementById('qty_number').stepDown();
    }

    function select() {
        var d = document.getElementById('abc');
        d.style.display = 'block';
        var did = d.options[d.selectedIndex].text;
        document.getElementById('span').value = did;
    }

    $('#product_description_content').showMore({
        minheight: 500,
        animationspeed: 250,
        buttontxtmore: "read more",
        buttontxtless: "read less",

    })



    $(function() {
        $(document).ready(function() {
            $('#province').on('change', function() {
                let id = $(this).val();
                $('#district').empty();
                $('#district').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                    type: 'GET',
                    url: "{{asset('GetSubCatAgainstMainCatEdit')}}/" + id,
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#district').empty();
                        response.forEach(element => {
                            $('#district').append(`<option value="${element['id']}">${element['district_name']}</option>`);
                        });
                    }
                });
            });
        });
    })
</script>

@stop