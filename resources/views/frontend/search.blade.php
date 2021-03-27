@extends('layouts.master')
@section('title','Search')
@section('main')
<link rel="stylesheet" href="{{asset('css/frontend/search.css')}}">
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3 class="title">Kết quả tim kiếm cho từ khóa: {{$keyword}}</h3>
                </div>
            </div>
            <div class="col-lg-2 filter_respon">
                <div class="filter-status">
                    <div class="filter-title">
                        <a href="#" id="btnFilter">
                            <i class="far fa-filter"></i> Bộ lọc tìm kiếm
                        </a>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group_head">
                            <p>Theo danh mục</p>
                        </div>
                        <div class="filter-checkbox">
                            <form action="/action_page.php">
                                <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                <label for="chbx1"> Checkbox</label><br>
                                <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                <label for="chbx1"> Checkbox</label><br>
                                <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                <label for="chbx1"> Checkbox</label><br>

                            </form>
                        </div>
                    </div>
                    <div class="filter-group">
                        <div class="filter-group_head">
                            <p>Theo hãng</p>
                        </div>
                        <div class="filter-checkbox">
                            <form action="/action_page.php">
                                <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                <label for="chbx1"> Checkbox</label><br>
                                <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                <label for="chbx1"> Checkbox</label><br>
                                <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                <label for="chbx1"> Checkbox</label><br>

                            </form>
                        </div>
                    </div>
                    <div class="filter-button_submit">
                        <button type="button" class="btn btn-primary">Primary</button>
                    </div>
                    <div id="responsive_filter">
                        <nav class="nav_filter">
                            <div class="nav_filter__links">
                                <div class="filter-group_respon">
                                    <div class="filter-group_head_respon">
                                        <p>Theo danh mục</p>
                                    </div>
                                    <div class="filter-checkbox_respon">
                                        <form action="/action_page.php">
                                            <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                            <label for="chbx1"> Checkbox</label><br>
                                            <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                            <label for="chbx1"> Checkbox</label><br>
                                            <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                            <label for="chbx1"> Checkbox</label><br>

                                        </form>
                                    </div>
                                </div>
                                <div class="filter-group_respon">
                                    <div class="filter-group_head_respon">
                                        <p>Theo hãng</p>
                                    </div>
                                    <div class="filter-checkbox_respon">
                                        <form action="/action_page.php">
                                            <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                            <label for="chbx1"> Checkbox</label><br>
                                            <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                            <label for="chbx1"> Checkbox</label><br>
                                            <input type="checkbox" id="chbx1" name="chbx1" value="chbk1">
                                            <label for="chbx1"> Checkbox</label><br>

                                        </form>
                                    </div>
                                </div>
                                <div class="filter-button_submit_respon">
                                    <button type="button" class="btn btn-primary">Primary</button>
                                </div>
                            </div>
                            <div class="nav_filter__overlay"></div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="container">
                    <div class="products-tabs">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane face show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="products ">
                                    <div class="row">
                                        @foreach ($items as $item)
                                        <div class="product col-lg-3 col-md-6 col-sm-6">
                                            <div class="product-img">
                                                <img src="{{asset('upload/'. $item->image1)}}" alt="">
                                                <div class="product-label">
                                                    <span class="new">new</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name">
                                                    <a href="#">{{$item->name_product}}</a>
                                                </h3>
                                                <h4 class="product-price">
                                                    {{$item->price}}
                                                    <del class="product-old-price">{{$item->old_price}}</del>
                                                </h4>
                                                <div class="product-rating">
                                                @for ($i = 1; $i <= $item->like; $i++)
                                                    <i class="fas fa-star"></i>
                                                   @endfor 
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                        <span class="tooltipp"> add to compare</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop