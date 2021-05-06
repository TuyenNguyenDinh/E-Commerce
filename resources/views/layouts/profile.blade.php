@extends('layouts.master')
@section('title','Profile')
@section('main')
<link rel="stylesheet" href="{{asset('css/frontend/profile.css')}}">
<div class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="userpage container-fluid">
                <div class="userpage-sidebar col-lg-3 col-md-12">
                    <div class="user-page-brief d-flex">
                        <a href="" class="user-page-brief__avatar">
                            <div class="avatar">
                                <img class="avatar__img" src="{{asset('upload/'.$cus->image_acc)}}"></img>
                            </div>
                        </a>
                        <div class="user-page-brief__right d-flex justify-content-center ">
                            <div class="user-page-brief__username">
                                {{$cus->name}}
                            </div>
                            <div class="user-page-brief__guest">
                                Guest
                            </div>
                        </div>
                    </div>
                    <div class="userpage-sidebar-menu">
                        <div class="stardust-dropdown__item-header">
                            <a href="{{asset('user/account/profile')}}" class="userpage-sidebar-menu-entry">
                                <div class="userpage-sidebar-menu-entry__icon">
                                    <img src="{{asset('image/user_interface.png')}}">
                                </div>
                                <div class="userpage-sidebar-menu-entry__text">
                                    {{ __('content.My Account')}}
                                </div>
                            </a>
                            <a href="{{asset('user/account/orders')}}" class="userpage-sidebar-menu-entry">
                                <div class="userpage-sidebar-menu-entry__icon">
                                    <img src="{{asset('image/order_interface.png')}}" alt="">
                                </div>
                                <div class="userpage-sidebar-menu-entry__text">
                                    {{ __('content.My Order')}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @yield('profile')

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function readURL(input) {
        var filePath = input.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg)$/i;
        var FileSize = input.files[0].size / 1024 / 1024; // in MiB
        console.log(FileSize);
        if (!allowedExtensions.exec(filePath) || FileSize >5) {
            alert('Invalid file type and max size = 5MB');
            input.value = '';
            return false;
        } else {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img_upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    }

    $("#upload").change(function() {
        readURL(this);
    });

    $('#verifyPass').on('submit', function(event) {
        var route = $('#verifyPass').data('route');
        var form_data = $(this);
        verifyemail = $('#verifyemail').val();
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success: function(response) {
                if (response.success) {
                    location.href = "{{route ('changeEmail') }}";
                } else {
                    if ("{{app()->getLocale() == 'en'}}") {
                        swal({
                            closeOnClickOutside: false,
                            icon: "warning",
                            title: 'Wrong password, please check again!',
                            showSpinner: true
                        });
                    } else {
                        swal({
                            closeOnClickOutside: false,
                            icon: "warning",
                            title: 'Sai mật khẩu, vui lòng kiểm tra lại!',
                            showSpinner: true
                        });
                    }
                }
            },
        })
        event.preventDefault();
    });

    $('#verifyPassword').on('submit', function(event) {
        var route = $('#verifyPassword').data('route');
        var form_data = $(this);
        verifyemail = $('#verifyphone').val();
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success: function(response) {
                if (response.success) {
                    location.href = "{{route ('changePhone') }}";
                } else {
                    if ("{{app()->getLocale() == 'en'}}") {
                        swal({
                            closeOnClickOutside: false,
                            icon: "warning",
                            title: 'Wrong password, please check again!',
                            showSpinner: true
                        });
                    } else {
                        swal({
                            closeOnClickOutside: false,
                            icon: "warning",
                            title: 'Sai mật khẩu, vui lòng kiểm tra lại!',
                            showSpinner: true
                        });
                    }
                }
            },
        })
        event.preventDefault();
    });
</script>

@stop