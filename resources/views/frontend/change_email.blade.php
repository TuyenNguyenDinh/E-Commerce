@extends('layouts.profile')
@section('profile')
<div class="account-tabs col-lg-9">
    <div class="my-account-section d-flex">
        <div class="my-account-section__header d-flex">
            <div class="my-account-section__header-left">
                <div class="my-account-section__header-title">Đổi Hộp Thư</div>
                <div class="my-account-section__header-subtitle">
                    Vui lòng nhập địa chỉ email mới. Thư xác nhận sẽ được gửi đến hộp thư của bạn
                </div>
            </div>
        </div>
        <div class="my-account-profile">

            <div class="my-account-profile__left">
                <div class="input-with-label">
                    <div class="input-with-label__wrapper">
                        <div class="input-with-label__label">
                            <label>Địa Chỉ Email</label>
                        </div>
                        <div class="input-with-label__content">
                            <div class="my-account__inline-container">
                                <div class="my-account__input-text">
                                    {{$cus->email}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{asset('user/account/change_email') }}" method="POST">
                {{ csrf_field() }}
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>Địa Chỉ Hộp Thư Mới</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="input-with-validator-wrapper">
                                    <div class="input-with-validator">
                                        <input id="changeEmail" type="text" name="changeEmail" placeholder maxlength="255">
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