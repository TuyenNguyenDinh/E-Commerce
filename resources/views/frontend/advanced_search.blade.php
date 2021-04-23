<?php
$sort = request()->get('sort');
$brand = request()->get('brand');
$rangePrice = request()->get('rangePrice');
?>
<div class="filter-status">
    <div class="filter-title">
        <a id="btnFilter" style="cursor: pointer;">
            <i class="far fa-filter"></i> Bộ lọc tìm kiếm
        </a>
    </div>
    <form id="form" method="get">
        @csrf
        @if($key!=null)
        <input type="hidden" name="key" value="{{request()->get('key')}}">
        @endif
        <div class="filter-group">
            <div class="filter-group_head">
                <p>Theo giá</p>
            </div>
            <div class="filter-checkbox">
                <select data-filter="make" id="sort" name="sort" class="filter-make filter form-control">
                    <option value="0" selected disabled>---Chọn sắp xếp---</option>
                    <option value="1" {{($sort==1)?'selected':""}}>Theo tên từ A - Z</option>
                    <option value="2" {{($sort==2)?'selected':""}}>Theo tên từ Z - A</option>
                    <option value="3" {{($sort==3)?'selected':""}}>Giá từ thấp đến cao</option>
                    <option value="4" {{($sort==4)?'selected':""}}>Giá từ cao đến thấp</option>
                </select>
            </div>
        </div>
        <div class="filter-group">
            <div class="filter-group_head">
                <p>Theo hãng</p>
            </div>
            <div class="filter-checkbox">
                @foreach($brands as $brand)

                <input type="checkbox" id="brands_{{$brand->id}}" name="brands" onchange="$('#form').submit();" value="{{$brand->id}}">
                <label for="{{$brand->id}}"> {{$brand->name}}</label><br>
                @endforeach
            </div>
        </div>
        <div class="filter-group">
            <div class="filter-group_head">
                <p>Theo giá</p>
            </div>
            <div class="filter-checkbox">
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="0" id="tatca" checked onchange="$('#form').submit();">
                    <span>Tất cả</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="1" id="duoi5tr" {{($rangePrice==1)?'checked':""}} onchange="$('#form').submit();">
                    <span>Dưới 5 triệu</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="2" id="5den10tr" {{($rangePrice==2)?'checked':""}} onchange="$('#form').submit();">
                    <span>5 - 10 triệu</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="3" id="10den15tr" {{($rangePrice==3)?'checked':""}} onchange="$('#form').submit();">
                    <span for="10den15tr">10 - 15 triệu</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="4" id="15den20tr" {{($rangePrice==4)?'checked':""}} onchange="$('#form').submit();">
                    <span for="15den20tr">15 - 20 triệu</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="5" id="tu20tr" {{($rangePrice==5)?'checked':""}} onchange="$('#form').submit();">
                    <span for="tu20tr">20 triệu trở lên</span>
                </label>
            </div>
        </div>
        <div class="filter-group">
            <div class="filter-group_head">
                <p>Đánh giá</p>
            </div>
            <div class="filter-checkbox">
                <div class="rating_stars_collection">
                    <div class="rating_stars_container">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="rating_stars_collection">
                    <div class="rating_stars_container">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        trở lên
                    </div>
                </div>
                <div class="rating_stars_collection">
                    <div class="rating_stars_container">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        trở lên
                    </div>
                </div>
                <div class="rating_stars_collection">
                    <div class="rating_stars_container">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        trở lên
                    </div>
                </div>
                <div class="rating_stars_collection">
                    <div class="rating_stars_container">
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        trở lên
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-button_submit">
            <input type="submit" name="" value="Lọc" style="height: 100%;" class="btn btn-secondary">
        </div>
    </form>
    <div id="responsive_filter">
        <div id="responsive-nav">
            <nav class="nav nav-filter">
                <div class="nav__links">
                    <form id="form_respone" method="get">
                        @csrf
                        @if($key!=null)
                        <input type="hidden" name="key" value="{{request()->get('key')}}">
                        @endif
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>Theo giá</p>
                            </div>
                            <div class="filter-checkbox">
                                <select data-filter="make" id="sort" name="sort" class="filter-make filter form-control">
                                    <option value="0" selected disabled>---Chọn sắp xếp---</option>
                                    <option value="1" {{($sort==1)?'selected':""}}>Theo tên từ A - Z</option>
                                    <option value="2" {{($sort==2)?'selected':""}}>Theo tên từ Z - A</option>
                                    <option value="3" {{($sort==3)?'selected':""}}>Giá từ thấp đến cao</option>
                                    <option value="4" {{($sort==4)?'selected':""}}>Giá từ cao đến thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>Theo hãng</p>
                            </div>
                            <div class="filter-checkbox">
                                @foreach($brands as $brand)
                                <input type="checkbox" id="brands_respone_{{$brand->id}}" name="brands" onchange="$('#form_respone').submit();" value="{{$brand->id}}">
                                <label for="{{$brand->id}}"> {{$brand->name}}</label><br>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>Theo giá</p>
                            </div>
                            <div class="filter-checkbox">
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="0" id="tatca_respon" checked onchange="$('#form_respone').submit();">
                                    <span>Tất cả</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="1" id="duoi5tr_respon" {{($rangePrice==1)?'checked':""}} onchange="$('#form_respone').submit();">
                                    <span>Dưới 5 triệu</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="2" id="5den10tr_respon" {{($rangePrice==2)?'checked':""}} onchange="$('#form_respone').submit();">
                                    <span>5 - 10 triệu</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="3" id="10den15tr_respon" {{($rangePrice==3)?'checked':""}} onchange="$('#form_respone').submit();">
                                    <span for="10den15tr">10 - 15 triệu</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="4" id="15den20tr_respon" {{($rangePrice==4)?'checked':""}} onchange="$('#form_respone').submit();">
                                    <span for="15den20tr">15 - 20 triệu</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="5" id="tu20tr_respon" {{($rangePrice==5)?'checked':""}} onchange="$('#form_respone').submit();">
                                    <span for="tu20tr">20 triệu trở lên</span>
                                </label>
                            </div>
                        </div>
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>Đánh giá</p>
                            </div>
                            <div class="filter-checkbox">
                                <div class="rating_stars_collection">
                                    <div class="rating_stars_container">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="rating_stars_collection">
                                    <div class="rating_stars_container">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        trở lên
                                    </div>
                                </div>
                                <div class="rating_stars_collection">
                                    <div class="rating_stars_container">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        trở lên
                                    </div>
                                </div>
                                <div class="rating_stars_collection">
                                    <div class="rating_stars_container">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        trở lên
                                    </div>
                                </div>
                                <div class="rating_stars_collection">
                                    <div class="rating_stars_container">
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        trở lên
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-button_submit filter-group_respon">
                            <input type="submit" name="" value="Lọc" style="height: 100%;" class="btn btn-secondary">
                        </div>
                    </form>
                </div>
                <div class="nav__overlay-filter"></div>
            </nav>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", () => {
        document.body.classList.remove("preload");
    });

    document.addEventListener("DOMContentLoaded", () => {
        const nav = document.querySelector(".nav-filter");

        document.querySelector("#btnFilter").addEventListener("click", () => {
            nav.classList.add("nav--open-filter");
        });

        document.querySelector(".nav__overlay-filter").addEventListener("click", () => {
            nav.classList.remove("nav--open-filter");
        });
    });
</script>