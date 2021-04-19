@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-group mb-3">
                <input id="email" class="form-control input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly>
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

            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control input100 @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                <div class="input-group-append" style="cursor: pointer;" onclick="showhide()">
                    <div class="input-group-text">
                        <span class="fa icon-eye-open fa-eye"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Change password</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{route('login')}}">Login</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>

@endsection