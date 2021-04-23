@extends('layouts.master')
@section('title','Forgot password')
@section('main')
<link rel="stylesheet" href="{{asset('css/frontend/profile.css')}}">
<div class="section">
    <div class="container">
        <div class="my-account-section d-flex">
            <div class="my-account-section__header d-flex">
                <div class="my-account-section__header-left">
                    <div class="my-account-section__header-title">Quên mật khẩu</div>
                    <div class="my-account-section__header-subtitle">
                        Vui lòng nhập địa chỉ email đăng ký tài khoản, một email khôi phục mật khẩu sẽ được gửi đi
                    </div>
                </div>
            </div>
            <div class="forgot-password">
                <div class="my-account-profile__left">
                    <form action="{{asset('forget-password') }}" method="POST" style="padding-top: 30px;">
                        {{ csrf_field() }}
                        <div class="input-with-label" style="margin-bottom: 30px;">
                            <div class="input-with-label__wrapper">
                                <div class="input-with-label__label">
                                    <label>Địa Chỉ Email</label>
                                </div>
                                <div class="input-with-label__content">
                                    <div class="input-with-validator-wrapper">
                                        <div class="input-with-validator">
                                            <input id="email" type="text" name="email" placeholder maxlength="255" class="form-control input100 @error('email') is-invalid @enderror">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-account-page__submit">
                            <button type="submit" class="btn btn-primary" aria-disabled="false">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@stop