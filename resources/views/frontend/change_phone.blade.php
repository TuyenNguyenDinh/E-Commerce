@extends('layouts.profile')
@section('profile')
<div class="account-tabs col-lg-9">
    <div class="my-account-section d-flex">
        <div class="my-account-section__header d-flex">
            <div class="my-account-section__header-left">
                <div class="my-account-section__header-title">Đổi số điện thoại</div>
                <div class="my-account-section__header-subtitle">
                    Vui lòng nhập số điện thoại mới.
                </div>
            </div>
        </div>
        <div class="my-account-profile">
            <div class="my-account-profile__left">
                <div class="input-with-label">
                    <div class="input-with-label__wrapper">
                        <div class="input-with-label__label">
                            <label>Số điện thoại</label>
                        </div>
                        <div class="input-with-label__content">
                            <div class="my-account__inline-container">
                                <div class="my-account__input-text">
                                    @if(is_null($cus->phone))
                                    Not found
                                    @else
                                    {{$cus->phone}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{asset('user/account/change_phone') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>Số điện thoại mới</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="input-with-validator-wrapper">
                                    <div class="input-with-validator">
                                        <input id="changePhone" type="text" name="changePhone" class="form-control @error('changePhone') is-invalid @enderror" placeholder maxlength="10">
                                        @error('changePhone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-account-page__submit">
                        <button type="submit" class="btn btn-primary btn--m btn--inline" aria-disabled="false">Lưu</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
@stop