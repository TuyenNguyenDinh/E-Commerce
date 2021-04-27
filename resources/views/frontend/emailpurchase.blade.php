<link rel="stylesheet" href="{{asset('css/frontend/emailpurchase.css')}}">
<div id="wrap-inner">
    <div id="customer">
        <h3>Customer information</h3>
        <p>
            <span class="info">Name: </span> {{Auth::guard('customer')->user()->name}}
        </p>
        <p>
            <span class="info">Email: </span> {{Auth::guard('customer')->user()->email}}
        </p>
        <p>
            <span class="info">Phone number: </span> {{Auth::guard('customer')->user()->phone}}
        </p>
        <p>
            <span class="info">Address: </span> {{Auth::guard('customer')->user()->address}}
        </p>
    </div>
    <div id="order">
        <h3>Orders</h3>
        <table class="table-bordered table-responsive" border="1">
            <tr class="bold">
                <td width="30%">Name product</td>
                <td width="20%">Quantity</td>
                <td width="15%">Price</td>
                <td>Sub total</td>
            </tr>
            @foreach($cart as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td class="price">{{number_format($product->price,0,'.','.')}} VNĐ</td>
                <td>{{$product->qty}}</td>
                <td class="price">{{number_format(($product->price*$product->qty),0,'.','.')}} VNĐ</td>
            </tr>
            @endforeach
            <tr>
            <td colspan="3">Transport fee</td>
                <td class="transport_fee">{{number_format($fee_fetch,0,'.','.')}}</td>
            </tr>
            <tr>
                <td colspan="3">Total</td>
                <td class="total-price">{{number_format($total,0,'.','.')}}VNĐ</td>
            </tr>
        </table>
    </div>
    <div id="xac-nhan">
        <br>
        <p align="justify">
            
            <b><br />Thank you for purchasing at Electro!</b>
        </p>
    </div>
</div>