@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
            </div>
            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
                    Register
                </span>
                <div class="wrap-input100 validate-input">
                <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input">
                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong> {{ $message }}</strong>
                    </span>
                    @enderror

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input">
                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                    @error('password')
                    <span class="invaldid-feedback" role="alert">
                        <strong> {{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input">
                <input id="password-confirm" type="password" class="input100" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">

                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Already have an account?
                    </span>
                    <a class="txt2" href="{{ route('login') }}">
                        Login now
                    </a>
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-136">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
