@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form method="POST" action="{{ route('login')}}">
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
            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control input100 @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                <div class="input-group-append" style="cursor: pointer;" onclick="showhide()">
                    <div class="input-group-text">
                        <span class="fas fa-eye"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember_token" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        @if (Route::has('password.request'))
        <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
        @endif
    </div>
    <!-- /.login-card-body -->
</div>
@endsection