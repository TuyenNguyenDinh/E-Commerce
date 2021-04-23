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
                                        <div class="row justify-content-between flex-column">
                                            <div class="col-auto mt-0 addrs-respon">
                                                <p><b>{{ $cus->name}}</b></p>
                                                <p>{{ $cus->phone }}</p>
                                                <select class="delivery_address" name="delivery_address" id="delivery_address">
                                                    <option value="{{$cus->province->id}}" >{{$cus->address}}</option>
                                                    @foreach($ship_addrs as $addrs)
                                                    <option  value="{{$addrs->province->id}}">{{$addrs->address_detail}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-auto mt-0" style="padding-top: 23px;">
                                                <a data-toggle="modal" data-target="#addAddress" style="cursor:pointer">
                                                    Add another address
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <p class="text-muted mb-2">PAYMENT METHODS</p>
                                                <hr class="mt-0">
                                                <p><b>Choose one of the payment methods</b></p>
                                                <select name="payment_methods" id="payment_methods" class="form-control">
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
                                                    <div class="media-body my-auto" style="padding-left: 5px;">
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
                                                <p><b>Total</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto my-auto">
                                                <p><b>{{number_format($total,0,'.','.')}} đ</b></p>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="flex-column flex-sm-row" style="flex:1">
                                                <p><b>Transport fee for province</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto my-auto">
                                                @foreach(DB::table('transport_fee')->where('id_province', $cus->id_province)->get() as $fee)
                                                <select name="fee_fetch" class="fee_fetch" id="fee_fetch" style='font-weight:bolder; font-size:13px'>
                                                    <option value="{{$fee->transport_fee}}"> {{number_format($fee->transport_fee,0,'.','.')}} đ</option>
                                                </select>
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <div class="row ">
                                            <div class="flex-column flex-sm-row" style="flex:1">
                                                <p><b>Sub total</b></p>
                                            </div>
                                            <div class="flex-sm-col col-auto my-auto subtotal">
                                            @foreach(DB::table('transport_fee')->where('id_province', $cus->id_province)->get() as $fee)
                                                <select name="total_fetch" class="total_fetch" id="total_fetch" style='font-weight:bolder; font-size:13px'>
                                                    <option value="{{$total+$fee->transport_fee}}"> {{number_format($total+$fee->transport_fee,0,'.','.')}} đ</option>
                                                </select>
                                                @endforeach
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
        $('#delivery_address').on('change', function() {
            let id = $(this).val();
            console.log(id);
            $.ajax({
                type: 'GET',
                url: "{{asset('cart/getFeeFromProvince')}}" + '/' + id,
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);
                    response.forEach(element => {
                        $('#fee_fetch').number(true,2).append(`<option value="${element['transport_fee']}"> ${number_format(element['transport_fee'],0,',','.')}  đ</option>`);
                        var sub = <?php echo Cart::total(0,"","")?>;
                        var total = (element['transport_fee']) + sub;
                        $('.total_fetch').number(true,2).append(`<option value="${total}"> ${number_format(total,0,',','.')} đ</option>`);
                        
                    });
                }
            });
      });
    });

    function number_format(number, decimals, decPoint, thousandsSep){
    decimals = decimals || 0;
    number = parseFloat(number);

    if(!decPoint || !thousandsSep){
        decPoint = '.';
        thousandsSep = ',';
    }

    var roundedNumber = Math.round( Math.abs( number ) * ('1e' + decimals) ) + '';
    var numbersString = decimals ? roundedNumber.slice(0, decimals * -1) : roundedNumber;
    var decimalsString = decimals ? roundedNumber.slice(decimals * -1) : '';
    var formattedNumber = "";

    while(numbersString.length > 3){
        formattedNumber += thousandsSep + numbersString.slice(-3)
        numbersString = numbersString.slice(0,-3);
    }

    return (number < 0 ? '-' : '') + numbersString + formattedNumber + (decimalsString ? (decPoint + decimalsString) : '');
}

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
                    showSpinner: true,
                });
                window.location.reload();
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