<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/frontend/styles.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>

</head>
<body>
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
                            <a class="dropdown-item" href="{{asset('user/account/profile')}}"> <i class="far fa-user"></i>My Account</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-file-invoice"></i>My order</a>
                        </div>
                    </li>
                    <li>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color: white;">
                            <i class="far fa-user"></i>
                            {{ __('Logout') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li>
                        <a href="#" data-toggle="modal" data-target="#loginModal">
                            <i class="far fa-user"></i>
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('/registercustomer')}}">
                            <i class="far fa-user"></i>
                            Register
                        </a>
                    </li>
                    @endif

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
                                        <h4>Login</h4>
                                    </div>
                                    <div class="d-flex flex-column text-center">
                                        <form method="post" action={{asset('/')}}>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Your email address...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Your password...">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <div class="text-center text-muted delimiter">or use a social network</div>
                                    <div class="d-flex justify-content-center social-buttons">
                                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </button>
                                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                                            <i class="fab fa-linkedin"></i>
                                        </button>
                                        </di>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <div class="signup-section">Not a member yet? <a href="{{asset('/registercustomer')}}" class="text-info"> Sign Up</a>.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            <!-- end login -->
            </ul>
        </div>
        </div>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{asset('image/logo.webp')}}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-search">
                            <form role="search" method="GET" class="full-width" action="{{asset('/product')}}">
                                <input class="input" type="search" placeholder="Search here" name="key" aria-label="Search" required>
                                <button type="submit" class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <div>
                                <a href="{{asset('wishlist.html')}}">
                                    <i class="fal fa-heart"></i>
                                    <span>Your Wishlist</span>
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
                                    <span>Your Cart</span>
                                    <div class="qty">{{Cart::count()}}</div>
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
                                            <li>
                                                <a href="#">Home</a>
                                            </li>
                                            <li>
                                                <a href="#">Hot Deals</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    Categories
                                                </a>
                                            </li>
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
                        <a class="nav-link" href="{{('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{('/category/'.$category->id.'.html')}}">{{$category->name}}</a>
                    </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </nav>
    @yield('main')
    <footer id="footer">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="footer">
                            <h3 class="footer-title">
                                About us
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
                                Categories
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
                                Information
                            </h3>
                            <div class="footer-links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            About us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Contact us</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Orders and Returns</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms & Corditions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="footer">
                            <h3 class="footer-title">
                                Service
                            </h3>
                            <div class="footer-links">
                                <ul>
                                    <li>
                                        <a href="#">My Account</a>
                                    </li>
                                    <li>
                                        <a href="#">View Cart</a>
                                    </li>
                                    <li>
                                        <a href="#">Tracking my order</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
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
                            <script type="text/javascript" async src="https://www.google-analytics.com/analytics.js"></script>
                            <script>
                                document.write(new Date().getFullYear());
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
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.products-slick').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                infinity: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            }),
            $('.logo-slick').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                arrows: false,
                infinity: true,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        $('.product-img_main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.product-img_slide',

        });
        $('.product-img_slide').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-img_main',
            centerMode: true,
            focusOnSelect: true,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            }, {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    </script>
    <script>
        window.addEventListener("load", () => {
            document.body.classList.remove("preload");
        });

        document.addEventListener("DOMContentLoaded", () => {
            const nav = document.querySelector(".nav");

            document.querySelector("#btnNav").addEventListener("click", () => {
                nav.classList.add("nav--open");
            });

            document.querySelector(".nav__overlay").addEventListener("click", () => {
                nav.classList.remove("nav--open");
            });
        });
    </script>
    @include('sweetalert::alert')
</body>


</html>