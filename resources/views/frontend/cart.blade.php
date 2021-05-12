@extends('layouts.master')
@section('title','Cart')
@section('main')
<section class="pt-5 pb-5">
    <div id="listCart" class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2 text-center">{{ __('content.Shopping Cart')}}</h3>
                <p class="mb-5 text-center">
                    <i id="cart_count" class="text-info font-weight-bold">{{Cart::count()}}</i> {{ __('content.items in your cart')}}

                </p>
                @if(Cart::count()>=1)
                <table class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th style="width:60%">{{ __('content.Product')}}</th>
                            <th style="width:12%">{{ __('content.Price')}}</th>
                            <th style="width:10%">{{ __('content.Quantity')}}</th>
                            <th style="width:16%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $product)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-md-3 text-left">
                                        <img src="{{ asset('upload/'.$product->options->img) }}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                    </div>
                                    <div class="col-md-9 text-left mt-sm-2">
                                        <h4>{{ $product->name }}</h4>
                                        <p class="font-weight-light">{{ $product->options->brands }} &amp; {{ $product->options->categories }}</p>
                                    </div>
                                </div>
                            </td>
                            <td id="price" data-th="Price">{{number_format($product->price*$product->qty,0,',','.')}} đ</td>
                            <td data-th="Quantity">
                                <input type="number" name="qty" id="qty" class="form-control form-control-lg text-center" value="{{ $product->qty }}" onchange="btUpdate(this.value, '{{$product->rowId}}')">
                            </td>
                            <td class="actions" data-th="">
                                <div class="text-right">
                                    <a onclick="deleteCart('{{$product->rowId}}')" style="cursor: pointer">
                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right">
                    <button type="button" id="bt" class="btn btn-white border-secondary bg-white btn-md mb-2">
                        <i class="fas fa-sync"></i>
                    </button>
                </div>
                <div id="subtotal" class="float-right text-right">
                    <h4>{{ __('content.Total')}}:</h4>
                    <h1>{{$total}} đ</h1>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
                <a href="{{ route('checkout') }}" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">{{ __('content.Checkout')}}</a>
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="{{asset('/')}}">
                    <i class="fas fa-arrow-left mr-2"></i> {{ __('content.Continue Shopping')}}</a>
            </div>
        </div>
        @endif
    </div>
</section>
<script type="text/javascript">
    function btUpdate(qty, rowId) {
        if (qty < 1) {
            deleteCart(rowId)
        } else {
            var url = "{{asset('cart/update')}}";
            $.ajax({
                method: 'get',
                url: url,
                data: {
                    qty: qty,
                    rowId: rowId
                },
                success: function(response) {
                    console.log(response);

                    // location.reload();
                }
            });
        }

    };

    $('#bt').click(function() {
        alert('upload success');
        $('#listCart').load("{{route('cartdata')}}");
        $('#qty_cart').load("{{route('cartdata')}} #cart_count")
    })

    function deleteCart(rowId) {
        if("{{app()->getLocale() == 'en'}}"){
            swal({
                    title: "Delete?",
                    text: "Are you sure delete this products?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    var url = "{{asset('cart/delete')}}" + '/' + rowId;
                    $.ajax({
                        method: 'get',
                        url: url,
                        data: {
                            rowId: rowId
                        },
                        success: function(response) {
                            swal({
                                text: "Delete successfully, page will redirect after 1s",
                                icon: "success",
                                buttons: false,
                            })
                            setTimeout(function() {
                                $(location).attr("href", "{{asset('cart/show')}}");
                            },1000)
                        }
                    });
                }else{
                    $(location).attr("href", "{{asset('cart/show')}}");
                }
            });
        }else{
            swal({
                    title: "Xóa?",
                    text: "Bạn có muốn xóa sản phẩm này?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    var url = "{{asset('cart/delete')}}" + '/' + rowId;
                    $.ajax({
                        method: 'get',
                        url: url,
                        data: {
                            rowId: rowId
                        },
                        success: function(response) {
                            swal({
                                text: "Xóa thành công, Trang sẽ chuyển hướng sau 1s",
                                icon: "success",
                                buttons: false,
                            })
                            setTimeout(function() {
                                $(location).attr("href", "{{asset('cart/show')}}");
                            },1000)
                        }
                    });
                }else{
                    $(location).attr("href", "{{asset('cart/show')}}");
                }
            });
        }
    
    }
</script>
@stop