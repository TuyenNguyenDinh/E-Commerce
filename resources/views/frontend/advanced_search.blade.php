<?php
$sort = request()->get('sort');
$brand = request()->get('brand');
$rangePrice = request()->get('rangePrice');
$sort_rate = request()->get('sort_rate');
?>
<div class="filter-status">
    <div class="filter-title filter_block">
        <a style="cursor: pointer;">
            <i class="far fa-filter"></i> {{ __('Filter search')}}
        </a>
    </div>
    <div class="filter-title filter_response">
        <a id="btnFilter" style="cursor: pointer;">
            <i class="far fa-filter"></i> {{ __('Filter search')}}
        </a>
    </div>
    <form id="form" method="get">
        @csrf
        @if($key!=null)
        <input type="hidden" name="key" value="{{request()->get('key')}}">
        @endif
        <div class="filter-group">
            <div class="filter-group_head">
                <p>{{ __('Sort')}}</p>
            </div>
            <div class="filter-checkbox">
                <select data-filter="make" id="sort" name="sort" class="filter-make filter form-control">
                    <option value="0" selected disabled>---{{ __('Choose sort')}}---</option>
                    <option value="1" {{($sort==1)?'selected':""}}>{{ __('Name to A - Z')}}</option>
                    <option value="2" {{($sort==2)?'selected':""}}>{{ __('Name to Z - A')}}</option>
                    <option value="3" {{($sort==3)?'selected':""}}>{{ __('Price from low to hight')}}</option>
                    <option value="4" {{($sort==4)?'selected':""}}>{{ __('Price from hight to low')}}</option>
                </select>
            </div>
        </div>
        <div class="filter-group">
            <div class="filter-group_head">
                <p>{{ __('Brands')}}</p>
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
                <p>{{ __('Price') }}</p>
            </div>
            <div class="filter-checkbox">
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="0" id="tatca" checked onchange="$('#form').submit();">
                    <span>{{ __('All')}}</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="1" id="duoi5tr" {{($rangePrice==1)?'checked':""}} onchange="$('#form').submit();">
                    <span>{{ __('Less 5.000.000 đ')}}</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="2" id="5den10tr" {{($rangePrice==2)?'checked':""}} onchange="$('#form').submit();">
                    <span>{{ __('5 - 10.000.000 đ')}}</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="3" id="10den15tr" {{($rangePrice==3)?'checked':""}} onchange="$('#form').submit();">
                    <span for="10den15tr">{{ __('10 - 15.000.000 đ')}}</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="4" id="15den20tr" {{($rangePrice==4)?'checked':""}} onchange="$('#form').submit();">
                    <span for="15den20tr">{{ __('15 -20.000.000 đ')}}</span>
                </label>
                <label class="border rounded">
                    <input type="radio" name="rangePrice" value="5" id="tu20tr" {{($rangePrice==5)?'checked':""}} onchange="$('#form').submit();">
                    <span for="tu20tr">{{ __('20.000.000 đ more')}}</span>
                </label>
            </div>
        </div>
        <div class="filter-group">
            <div class="filter-group_head">
                <p>{{ __('Rates')}}</p>
            </div>
            <div class="filter-checkbox">
                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                    <input type="radio" name="sort_rate" value="5" id="sort_rate_5" {{$sort_rate==5?'checked':""}} onchange="$('#form').submit()">
                    <span for=sort_rate_5>
                        <div class="rating_stars_container">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </span>
                </div>
                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                    <input type="radio" name="sort_rate" value="4" id="sort_rate_4" {{$sort_rate==4?'checked':""}} onchange="$('#form').submit()">
                    <span for="sort_rate_4">
                        <div class="rating_stars_container">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            {{ __('above')}}
                        </div>
                    </span>
                </div>
                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                    <input type="radio" name="sort_rate" value="3" id="sort_rate_3" {{$sort_rate==3?'checked':""}} onchange="$('#form').submit()">
                    <span for="sort_rate_3">
                        <div class="rating_stars_container">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            {{ __('above')}}
                        </div>
                    </span>
                </div>
                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                    <input type="radio" name="sort_rate" value="2" id="sort_rate_2" {{$sort_rate==2?'checked':""}} onchange="$('#form').submit()">
                    <span for="sort_rate_2">
                        <div class="rating_stars_container">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            {{ __('above')}}
                        </div>

                    </span>
                </div>
                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                    <input type="radio" name="sort_rate" value="1" id="sort_rate_1" {{$sort_rate==1?'checked':""}} onchange="$('#form').submit()">
                    <span for="sort_rate_1">
                        <div class="rating_stars_container">
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            {{ __('above')}}
                        </div>

                    </span>
                </div>
            </div>
        </div>
        <div class="filter-button_submit">
            <input type="submit" name="" value="Submit" style="height: 100%;" class="btn btn-secondary">
        </div>
    </form>
    <div id="responsive_filter">
        <div id="responsive-nav">
            <nav class="nav nav-filter">
                <div class="nav__links">
                    <form id="form_response" method="get">
                        @csrf
                        @if($key!=null)
                        <input type="hidden" name="key" value="{{request()->get('key')}}">
                        @endif
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>{{ __('Sort')}}</p>
                            </div>
                            <div class="filter-checkbox">
                                <select data-filter="make" id="sort-respone" name="sort" class="filter-make filter form-control">
                                    <option value="0" selected disabled>---{{ __('Choose sort')}}---</option>
                                    <option value="1" {{($sort==1)?'selected':""}}>{{ __('Name to A - Z')}}</option>
                                    <option value="2" {{($sort==2)?'selected':""}}>{{ __('Name to Z - A')}}</option>
                                    <option value="3" {{($sort==3)?'selected':""}}>{{ __('Price form low to hight')}}</option>
                                    <option value="4" {{($sort==4)?'selected':""}}>{{ __('Price form hight to low')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>{{ __('Brands')}}</p>
                            </div>
                            <div class="filter-checkbox">
                                @foreach($brands as $brand)
                                <input type="checkbox" id="brands_respone_{{$brand->id}}" name="brands" onchange="$('#form_response').submit();" value="{{$brand->id}}">
                                <label for="{{$brand->id}}"> {{$brand->name}}</label><br>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>{{ __('Price')}}</p>
                            </div>
                            <div class="filter-checkbox">
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="0" id="tatca_respon" checked onchange="$('#form_response').submit();">
                                    <span>{{ __('All')}}</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="1" id="duoi5tr_respon" {{($rangePrice==1)?'checked':""}} onchange="$('#form_response').submit();">
                                    <span>{{ __('Less 5.000.000 đ')}}</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="2" id="5den10tr_respon" {{($rangePrice==2)?'checked':""}} onchange="$('#form_response').submit();">
                                    <span>{{ __('5 - 10.000.000 đ')}}</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="3" id="10den15tr_respon" {{($rangePrice==3)?'checked':""}} onchange="$('#form_response').submit();">
                                    <span for="10den15tr">{{ __('10 - 15.000.000 đ')}}</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="4" id="15den20tr_respon" {{($rangePrice==4)?'checked':""}} onchange="$('#form_response').submit();">
                                    <span for="15den20tr">{{ __('15 -20.000.000 đ')}}</span>
                                </label>
                                <label class="border rounded">
                                    <input type="radio" name="rangePrice" value="5" id="tu20tr_respon" {{($rangePrice==5)?'checked':""}} onchange="$('#form_response').submit();">
                                    <span for="tu20tr">{{ __('20.000.000 đ more')}}</span>
                                </label>
                            </div>
                        </div>
                        <div class="filter-group filter-group_respon">
                            <div class="filter-group_head">
                                <p>{{ __('Rates')}}</p>
                            </div>
                            <div class="filter-checkbox">
                                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                                    <input type="radio" name="sort_rate" value="5" id="sort_rate_res_5" {{$sort_rate==5?'checked':""}} onchange="$('#form_response').submit()">
                                    <span for=sort_rate_res_5>
                                        <div class="rating_stars_container">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </span>
                                </div>
                                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                                    <input type="radio" name="sort_rate" value="4" id="sort_rate_res_4" {{$sort_rate==4?'checked':""}} onchange="$('#form_response').submit()">
                                    <span for="sort_rate_res_4">
                                        <div class="rating_stars_container">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            {{ __('above')}}
                                        </div>
                                    </span>
                                </div>
                                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                                    <input type="radio" name="sort_rate" value="3" id="sort_rate_res_3" {{$sort_rate==3?'checked':""}} onchange="$('#form_response').submit()">
                                    <span for="sort_rate_res_3">
                                        <div class="rating_stars_container">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            {{ __('above')}}
                                        </div>
                                    </span>
                                </div>
                                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                                    <input type="radio" name="sort_rate" value="2" id="sort_rate_res_2" {{$sort_rate==2?'checked':""}} onchange="$('#form_response').submit()">
                                    <span for="sort_rate_res_2">
                                        <div class="rating_stars_container">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            {{ __('above')}}
                                        </div>

                                    </span>
                                </div>
                                <div class="rating_stars_collection" style="display: flex;align-items: center;">
                                    <input type="radio" name="sort_rate" value="1" id="sort_rate_res_1" {{$sort_rate==1?'checked':""}} onchange="$('#form_response').submit()">
                                    <span for="sort_rate_res_1">
                                        <div class="rating_stars_container">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            {{ __('above')}}
                                        </div>

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="filter-button_submit filter-group_respon">
                            <input type="submit" name="" value="Submit" style="height: 100%;" class="btn btn-secondary">
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