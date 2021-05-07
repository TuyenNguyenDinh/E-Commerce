<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/frontend/styles.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- Flag -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{asset('js/frontend/jquery.number.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body>
    <div id="body-no_wrapper">
        <header>
            <div id="top-header">
                <div class="container">
                    <ul class="header-links float-left">
                        <li>
                            <a href="#">
                                <i class="far fa-phone-alt"></i> 0856014749
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-envelope"></i> tuyennguyendinh1608@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-map-marker-alt"></i> 1734 Stonecoal Road
                            </a>
                        </li>
                    </ul>
                    <ul class="header-links float-right">
                        @if (Auth::guard('customer')->check())
                        <li>
                            <a href="#" id="dropdownAccount" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('upload/'.Auth::guard('customer')->user()->image_acc) }}" alt="" style="width: 22px;height: 22px;border-radius: 50%;">
                                {{Auth::guard('customer')->user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownAccount">
                                <a class="dropdown-item" href="{{asset('user/account/profile')}}"> <i class="far fa-user"></i>{{ __('content.My Account')}}</a>
                                <a class="dropdown-item" href="{{asset('user/account/orders')}}"><i class="fas fa-file-invoice"></i>{{ __('content.My Order')}}</a>
                            </div>
                        </li>
                        <li>
                            <a href="{{route('logoutCus')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: white;">
                                <i class="far fa-user"></i>
                                {{ __('content.Logout') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logoutCus') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <li>
                            <a href="#" data-toggle="modal" data-target="#loginModal">
                                <i class="far fa-user"></i>
                                {{ __('content.Login')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{asset('/registercustomer')}}">
                                <i class="far fa-user"></i>
                                {{ __('content.Register')}}
                            </a>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            @if( app()->getLocale() == 'en')
                            <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> ENG</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="{{ route('user.change-language', ['vn']) }}"><span class="flag-icon flag-icon-vn"> </span> Vietnam</a>
                            </div>
                            @else
                            <a class="nav-link dropdown-toggle" href="" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-vn"> </span> VN</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="{{ route('user.change-language', ['en']) }}"><span class="flag-icon flag-icon-us"> </span> English</a>
                            </div>
                            @endif
                        </li>

                        <!-- login with modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-title text-center">
                                            <h4>{{ __('content.Login')}}</h4>
                                        </div>
                                        <div class="d-flex flex-column text-center">
                                            <form method="post" action={{asset('/')}}>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="Your email address...">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Your password...">
                                                </div>
                                                <button type="submit" class="btn btn-info btn-block btn-round">{{ __('content.Login')}}</button>
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                        <div class="text-center text-muted delimiter">{{ __('content.or use a social network')}}</div>
                                        <div class="d-flex justify-content-center social-buttons">
                                            <a href="{{ route('login.google') }}">
                                                <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                                                    <i class="fab fa-google"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('login.facebook') }}">
                                                <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                                                    <i class="fab fa-facebook"></i>
                                                </button>
                                            </a>

                                            </di>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <div class="signup-section">{{ __('content.Not register yet?')}} <a href="{{asset('/registercustomer')}}" class="text-info"> {{ __('content.Register')}}</a>.</div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <div class="signup-section"><a href="{{asset('/forget-password')}}" class="text-info">{{ __('content.Forgot password')}}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                <!-- end login -->
                </ul>
            </div>

            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="{{asset('/')}}" class="logo">
                                    <img src="{{asset('image/logo.webp')}}" alt="logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="header-search">
                                <form role="search" method="GET" class="full-width" action="{{asset('/product')}}">
                                    <input class="input" type="search" placeholder="Search here" name="key" aria-label="Search" required>
                                    <button type="submit" class="search-btn">{{ __('content.Search')}}</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 clearfix">
                            <div class="header-ctn">
                                <div>
                                    <a href="{{asset('wishlist.html')}}">
                                        <i class="fal fa-heart"></i>
                                        <span>{{ __('content.Your Wishlist')}}</span>
                                        @if(Auth::guard('customer')->check())
                                        <div class="qty">{{Auth::guard('customer')->user()->wishlist->count()}}</div>
                                        @else
                                        <div class="qty">0</div>
                                        @endif
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ asset('cart/show') }}">
                                        <i class="far fa-shopping-cart"></i>
                                        <span>{{ __('content.Your Cart')}}</span>
                                        <div id="qty_cart" class="qty">{{Cart::count()}}</div>
                                    </a>
                                </div>
                                <div class="menu-toggle" id="btnNav">
                                    <a href="#">
                                        <i class="far fa-bars"></i>
                                        <span>Menu</span>
                                    </a>
                                </div>
                                <div id="responsive-nav">
                                    <nav class="nav">
                                        <div class="nav__links">
                                            <ul class="main-nav nav navbar-nav">
                                                @foreach($categories as $category)
                                                <li>
                                                    <a href="{{asset('category/'.$category->id.'.html')}}">{{$category->name}}</a>
                                                </li>
                                                @endforeach
                                                @if(Request::is('user/account/profile') || Request::is('user/account/orders'))
                                                <li>
                                                    <a href="{{ asset('user/account/orders') }}">{{ __('content.Profile')}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ asset('user/account/orders') }}">{{ __('content.Orders')}}</a>
                                                </li>
                                                @endif
                                            </ul>

                                        </div>
                                        <div class="nav__overlay"></div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav id="navigation" class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="main-nav navbar-nav nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/')}}">{{ __('content.Home')}} <span class="sr-only">(current)</span></a>
                        </li>
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('category/'.$category->id.'.html')}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>

            </div>
        </nav>
        <button id="backtotop" title="Go to top" class="btn" style="display: block;"><i class="fa fa-arrow-up"></i></button>
        @yield('main')
        <footer id="footer">
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="footer">
                                <h3 class="footer-title">
                                    {{ __('content.About us')}}
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                                <ul class="footer-links">
                                    <li>
                                        <a href="#">
                                            <i class="far fa-phone-alt"></i> 0856014749
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-envelope"></i> tuyennguyendinh1608@gmail.com
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-map-marker-alt"></i> 1734 Stonecoal Road
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer">
                                <h3 class="footer-title">
                                    {{ __('content.Categories')}}
                                </h3>
                                <div class="footer-links">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li>
                                            <a href="{{asset('category/'.$category->id)}}">{{$category->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix visible-xs"></div>
                        <div class="col-md-3 col-sm-6">
                            <div class="footer">
                                <h3 class="footer-title">
                                    {{ __('content.Information')}}
                                </h3>
                                <div class="footer-links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                {{ __('content.About us')}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"> {{ __('content.Contact us')}}</a>
                                        </li>
                                        <li>
                                            <a href="#"> {{ __('content.Privacy Policy')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('content.Orders and Returns')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('content.Terms & Corditions')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="footer">
                                <h3 class="footer-title">
                                    {{ __('content.Service')}}
                                </h3>
                                <div class="footer-links">
                                    <ul>
                                        <li>
                                            <a href="#">{{ __('content.My Account')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('content.View Cart')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('content.Tracking my order')}}</a>
                                        </li>
                                        <li>
                                            <a href="#">{{ __('content.Help')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bottom-footer" class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="footer-payments">
                                <li>
                                    <a href="#">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    </a>
                                </li>
                            </ul>
                            <span class="copyright">
                                Copyright@
                                <span id="year"></span>
                                <script type="text/javascript" async src="https://www.google-analytics.com/analytics.js"></script>
                                <script>
                                    document.getElementById('year').append(new Date().getFullYear());
                                </script>
                                All rights reserved | This template is made with
                                <i class="far fa-heart"></i>
                                by
                                <a href="#">Tuyên Nguyễn Đình</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('js/frontend/select2.full.min.js') }}"></script>
    <script src="{{asset('js/frontend/starrr.js')}}"></script>
    <script src="{{asset('js/frontend/jquery.number.min.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/frontend/frontend.js')}}"></script>
    @include('sweetalert::alert')
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#backtotop').fadeIn();
            } else {
                $('#backtotop').fadeOut();
            }
        });

        $("#backtotop").click(function() {
            //1 second of animation time
            //html works for FFX but not Chrome
            //body works for Chrome but not FFX
            //This strange selector seems to work universally
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });

        $(function() {
            $(document).ready(function() {
                $('#province').on('change', function() {
                    let id = $(this).val();
                    $('#district').empty();
                    $('#district').append(`<option value="0" disabled selected>Processing...</option>`);
                    $.ajax({
                        type: 'GET',
                        url: "{{asset('GetSubCatAgainstMainCatEdit')}}" + '/' + id,
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
</body>

</html>