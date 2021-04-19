@extends('layouts.master')
@section('title','Checkout')
@section('main')
<link rel="stylesheet" href="{{asset('css/frontend/checkout.css')}}">
<div class="section">
    <div class="container">
        <div class="breadcrumb-bar">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>

                <li><a href="#">Cart</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <div class=" container-fluid my-4 ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <form method="post">
                {{csrf_field()}}
                    <div class="card shadow-lg ">
                        <div class="row justify-content-around">
                            <div class="col-md-5">
                                <div class="card border-0">
                                    <div class="card-header pb-0">
                                        <h2 class="card-title space ">Checkout</h2>
                                        <p class="card-text text-muted mt-4 space">SHIPPING DETAILS</p>
                                        <hr class="my-0">
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-auto mt-0">
                                                <p><b>{{ $cus->name}}</b></p>
                                                <p>{{ $cus->phone }}</p>
                                                <p style="flex:1">{{ $cus->address }}</p>
                                            </div>
                                            <div class="col-auto mt-0">
                                                <a data-toggle="modal" data-target="#changeAddress" style="cursor:pointer">
                                                    Change (if use another address)
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="text-muted mb-2">PAYMENT METHODS</p>
                                                <hr class="mt-0">
                                                <select name="payment_methods" id="payment_methods">
                                                    <option value="COD">COD</option>
                                                    <option value="debit_cart">Debit card</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="text-muted mb-2">NOTES</p>
                                                <hr class="mt-0">
                                                <textarea name="notes" id="notes" cols="50" rows="2" style="height: 50px; resize: none;"></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="row mt-4">
                                        <div class="col">
                                            <p class="text-muted mb-2">SHIPPING UNIT</p>
                                            <hr class="mt-0">
                                            <div class="shipping-unit_wrapper d-flex">
                                                <div class="d-flex align-items-baseline flex-column">
                                                    <div class="shipping_unit-name-group">
                                                        <input type="checkbox" name="shipping-unit-name" id="shipping-unit-name">
                                                        <label for="shipping-unit-name">
                                                            <div class="shipping-unit_wrapper-name">
                                                                <h5>Giao hàng tiết kiệm</h5>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="shipping_unit-name-group">
                                                        <input type="checkbox" name="shipping-unit-name" id="shipping-unit-name">
                                                        <label for="shipping-unit-name">
                                                            <div class="shipping-unit_wrapper-name">
                                                                <h5>Giao hàng tiết kiệm</h5>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card border-0 ">
                                    <div class="card-header card-2">
                                        <p class="card-text text-muted mt-md-4 mb-2 space">YOUR ORDER <span class=" small text-muted ml-2 cursor-pointer">EDIT SHOPPING BAG</span> </p>
                                        <hr class="my-2">
                                    </div>
                                    <div class="card-body pt-0">
                                        @foreach ($items as $item)
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row"> <img class=" img-fluid" src="{{ asset('upload/'.$item->options->img) }}" width="62" height="62">
                                                    <div class="media-body my-auto">
                                                        <div class="row ">
                                                            <div class="col-auto">
                                                                <p class="mb-0"><b>{{ $item->name }}</b></p><small class="text-muted">{{ $item->options->categories }}<b>&</b>{{ $item->options->brands }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto my-auto">
                                                <p class="boxed-1">{{ $item->qty }}</p>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                                <p><b>{{number_format($item->price * $item->qty ,0,',','.')}} đ</b></p>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        @endforeach
                                        <div class="row mt-4 ">
                                            <div class="flex-column flex-sm-row" style="flex:1">
                                                <p><b>Transport fee</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto my-auto">
                                                <p><b>{{$total}}</b></p>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="flex-column flex-sm-row" style="flex:1">
                                                <p><b>Transport fee for province</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto my-auto">
                                                <p><b>{{$total}}</b></p>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row ">
                                            <div class="flex-column flex-sm-row" style="flex:1">
                                                <p><b>Total</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto my-auto">
                                                <p><b>{{$total}}</b></p>
                                            </div>
                                        </div>
                                        <div class="row mb-md-5">
                                            <div class="col"> 
                                            <button type="submit" name="purchase" id="purchase" class="btn btn-lg btn-block ">PURCHASE</button>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="changeAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-left my-account-section__header">
                        <h4>Shipping address</h4>
                        <div class="my-account-section__header-subtitle">
                            Để cập nhật email mới, vui lòng xác nhận bằng cách nhập mật khẩu
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse align-items-baseline">
                        <label for="address_default" style="padding-left: 2px;">{{ $cus->address }}</label>
                        <input type="checkbox" name="" id="address_default">
                    </div>
                    <div class="d-flex flex-column align-items-baseline">
                        @if((count($ship_addrs) == 0))
                        <label></label>
                        @else
                        @foreach ($ship_addrs as $shipping)
                        @if($shipping->id_customer == Auth::guard('customer')->user()->id)
                        <div class="d-flex flex-column align-items-baseline">
                            <div class="d-flex align-items-baseline">
                                <input type="checkbox" name="" id="address_default_{{$shipping->id}}">
                                <label for="address_default_{{$shipping->id}}" style="padding-left: 2px;">{{ $shipping->address_detail }}</label>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    <div class="d-flex flex-row align-items-baseline">
                        <button type="button" data-toggle="modal" data-target="#addAddress" data-dismiss="modal" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" style="width: 50%;">Add another address</button>
                        <button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" style="width: 50%;">Add new address</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-title text-left my-account-section__header">
                        <h4>Add shipping address</h4>
                        <div class="my-account-section__header-subtitle">
                            Để cập nhật email mới, vui lòng xác nhận bằng cách nhập mật khẩu
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-baseline">
                        <form id="addaddress" data-route="{{ route('addAddress') }}" method="post" style="width: 100%">
                            {{csrf_field()}}
                            <div class="form-group mb-3">
                                <select name="province" id="provinceAdd" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    <option value="0" selected disabled>---Chọn tỉnh---</option>
                                    @foreach($pr as $province)
                                    <option value="{{$province->id}}">{{ucfirst($province->province)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <select name="district" id="districtAdd" class="form-control rounded-pill border-0 shadow-sm px-4" placeholder="Select Sub Category">
                                    <option value="0" selected disabled>---Chọn Quận(Huyện)---</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="address_detail" id="address_detail" max=100 class="form-control" placeholder="Input you address">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Add new address</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#provinceAdd').select2({
            theme: 'bootstrap4',
        })

        $('#districtAdd').select2({
            theme: 'bootstrap4',
        });
    })

    $(document).ready(function() {
        $('#provinceAdd').on('change', function() {
            let id = $(this).val();
            $('#districtAdd').empty();
            $('#districtAdd').append(`<option value="0" disabled selected>Processing...</option>`);
            $.ajax({
                type: 'GET',
                url: "{{asset('GetSubCatAgainstMainCatEdit')}}" + '/' + id,
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#districtAdd').empty();
                    response.forEach(element => {
                        $('#districtAdd').append(`<option value="${element['id']}">${element['district_name']}</option>`);
                    });
                }
            });
        });
    });

    $('#addaddress').on('submit', function(event) {
        var route = $('#addaddress').data('route');
        var form_data = $(this);
        province = $('#provinceAdd').val();
        district = $('#districtAdd').val();
        address_detail = $('#address_detail').val();
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success: function(response) {
                swal({
                    closeOnClickOutside: false,
                    icon: "Success",
                    title: 'Add address successfully!',
                    showSpinner: true
                });
            },
            error: function(response) {
                swal({
                    closeOnClickOutside: false,
                    icon: "Warning",
                    title: 'Error, please try again',
                    showSpinner: true
                });
            },
        })
        event.preventDefault();
    });
</script>
@stop