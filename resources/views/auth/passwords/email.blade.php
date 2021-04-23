@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control input100 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                </div>
                <!-- /.col -->
            </div>
            @if (session('status'))
            <div class="text-center p-t-12" style="color: red; font-size:18px; ">
                <span class="txt1">
                    Send mail success
                </span>
            </div>
            @endif
        </form>

        <p class="mt-3 mb-1">
            <a href="{{route('login')}}">Login</a>
        </p>
        <!-- @if (Route::has('register'))
        <p class="mb-0">
            <a href="{{route('register')}}" class="text-center">Register a new membership</a>
        </p>
        @endif -->
    </div>
    <!-- /.login-card-body -->
</div>
@endsection