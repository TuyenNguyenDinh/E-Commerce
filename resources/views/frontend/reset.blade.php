@extends('layouts.master')
@section('title','Forgot password')
@section('main')
<div class="container">
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('content.Reset Password')}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{asset('/reset-password')}}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('content.Email address')}}</label>
                                <div class="col-md-6">
                                    <input id="email_reset" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus readonly>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('content.Password')}}</label>
                                <div class="col-md-6 input-group">
                                    <input id="password-reset" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    <div class="input-group-append" style="cursor: pointer;" onclick="showhide('password-reset')">
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

                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">C.{{ __('content.Password')}}</label>
                                <div class="col-md-6 input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    <div class="input-group-append" style="cursor: pointer;" onclick="showhide('password-confirm')">
                                        <div class="input-group-text">
                                            <span class="fas fa-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('content.Reset Password')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop