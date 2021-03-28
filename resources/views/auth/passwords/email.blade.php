@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
            </div>
            <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
                @csrf

                <span class="login100-form-title">
                    Forgot Password
                </span>

                <span class="input-mail">Please input email address</span>
                <div class="wrap-input100 validate-input">
                    <input id="email" class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Send password reset link
                    </button>
                </div>
                @if (session('status'))
                <div class="text-center p-t-12" style="color: red; font-size:18px; ">
                    <span class="txt1">
                        Send mail success
                    </span>
                    <a class="txt2" href="{{ route('login') }}">
                        Login now
                    </a>
                </div>
                @endif
                @if (Route::has('register'))
                <div class="text-center p-t-136">
                    <a class="txt2" href="{{ route('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
