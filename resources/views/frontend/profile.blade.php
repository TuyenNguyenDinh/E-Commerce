@extends('layouts.master')
@section('title','Profile')
@section('main')
<link rel="stylesheet" href="{{asset('css/frontend/profile.css')}}">
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex container-fluid">
                <div class="userpage-sidebar col-lg-3">
                    <div class="user-page-brief d-flex">
                        <a href="" class="user-page-brief__avatar">
                            <div class="avatar">
                                <img class="avatar__img" src="{{asset('image/img_user.jpg')}}"></img>
                            </div>
                        </a>
                        <div class="user-page-brief__right d-flex justify-content-center ">
                            <div class="user-page-brief__username">
                                {{$name}}
                            </div>
                            <div class="user-page-brief__guest">
                                Guest
                            </div>
                        </div>
                    </div>
                    <div class="userpage-sidebar-menu">
                        <div class="stardust-dropdown__item-header">
                            <a href="#" class="userpage-sidebar-menu-entry">
                                <div class="userpage-sidebar-menu-entry__icon">
                                    <img src="{{asset('image/user_interface.png')}}">
                                </div>
                                <div class="userpage-sidebar-menu-entry__text">
                                    Hồ sơ
                                </div>
                            </a>
                            <a href="#" class="userpage-sidebar-menu-entry">
                                <div class="userpage-sidebar-menu-entry__icon">
                                    <img src="{{asset('image/order_interface.png')}}" alt="">
                                </div>

                                <div class="userpage-sidebar-menu-entry__text">
                                    Đơn mua
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="account-tabs col-lg-9">
                    <div class="my-account-section d-flex">
                        <div class="my-account-section__header d-flex">
                            <div class="my-account-section__header-left">
                                <div class="my-account-section__header-title">Hồ sơ của tôi</div>
                                <div class="my-account-section__header-subtitle">
                                    Quản lý thông tin hồ sơ để bảo mật tài khoản
                                </div>
                            </div>
                        </div>
                        <div class="my-account-profile">
                            <div class="my-account-profile__left">
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Tên</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="input-with-validator-wrapper">
                                                <div class="input-with-validator">
                                                    <input type="text" placeholder maxlength="255" value="{{$name}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Email</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="my-account__inline-container">
                                                <div class="my-account__input-text">
                                                    {{$mail}}
                                                </div>
                                                <button class="my-account__no-background-button my-account-profile__change-button">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Số điện thoại</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="my-account__inline-container">
                                                <div class="my-account__input-text">
                                                    {{$phone}}
                                                </div>
                                                <button class="my-account__no-background-button my-account-profile__change-button">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Địa chỉ</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="input-with-validator-wrapper">
                                                <div class="input-with-validator">
                                                    <input type="text" placeholder maxlength="255" value="{{$address}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Tỉnh(Thành phố)</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="input-with-validator-wrapper">
                                                <select name="pro" id="pro">
                                                    @foreach ($provinces as $province)
                                                        <option value="{{$province->province}}">{{$province->province}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Quận(Huyện)</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="input-with-validator-wrapper">
                                                <select name="dis" id="dis">
                                                    @foreach($district as $item)
                                                    <option value="{{$item->district_name}}">{{$item->district_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-with-label">
                                    <div class="input-with-label__wrapper">
                                        <div class="input-with-label__label">
                                            <label>Xã(Phường,TT)</label>
                                        </div>
                                        <div class="input-with-label__content">
                                            <div class="input-with-validator-wrapper">
                                                <select name="pro" id="pro">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-account-page__submit"><button type="button" class="btn btn-primary btn--m btn--inline" aria-disabled="false">Lưu</button></div>
                            </div>
                            <div class="my-account-profile__right">
                                <div class="avatar-uploader">
                                    <div class="avatar-uploader__avatar">
                                        <img id="img_upload" class="avatar-uploader__avatar-image" src="https://cf.shopee.vn/file/bc0857e292cf1ad22fef3790d0640c7e_tn"></img>
                                    </div>
                                    <input class="avatar-uploader__file-input" id="upload" type="file" accept=".jpg,.jpeg,.png">
                                    <label type="button" for="upload" class="btn btn-light btn--m btn--inline d-flex align-items-center">Chọn ảnh</label>
                                    <div class="avatar-uploader__text-container">
                                        <div class="avatar-uploader__text">Dụng lượng file tối đa 1 MB</div>
                                        <div class="avatar-uploader__text">Định dạng:.JPEG, .PNG</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#upload").change(function() {
        readURL(this);
    });
</script>
@stop