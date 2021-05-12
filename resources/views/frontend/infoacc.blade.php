@extends('layouts.profile')
@section('profile')
<div class="account-tabs col-lg-9">
    <div class="my-account-section d-flex">
        <div class="my-account-section__header d-flex">
            <div class="my-account-section__header-left">
                <div class="my-account-section__header-title">{{ __('content.My Account')}}</div>
                <div class="my-account-section__header-subtitle">
                    {{ __('content.Manage profile information for account security')}}
                </div>
            </div>
        </div>
        <div class="my-account-profile form-profile">
            <form action="{{ route('changeProfile') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="my-account-profile__left">
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>{{ __('content.Name')}}</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="input-with-validator-wrapper">
                                    <div class="input-with-validator">
                                        <input type="text" name="name" placeholder maxlength="255" value="{{$cus->name}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>{{ __('content.Email')}}</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="my-account__inline-container">
                                    <div class="my-account__input-text">
                                        {{$cus->email}}
                                    </div>
                                    <button type="button" class="my-account__no-background-button my-account-profile__change-button" data-toggle="modal" data-target="#changeEmail">{{ __('content.Change')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>{{ __('content.Phone number')}}</label>
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
                                    <button type="button" class="my-account__no-background-button my-account-profile__change-button" data-toggle="modal" data-target="#changePhone"> {{ __('content.Change')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label> {{ __('content.Address')}}</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="input-with-validator-wrapper">
                                    <div class="input-with-validator">
                                        <input type="text" name="address" placeholder maxlength="255" value="{{$cus->address}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>{{ __('content.Province')}}</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="my-account__inline-container">
                                    <div class="my-account__input-text">
                                        @if(is_null($cus->id_province))
                                        Not found
                                        @else
                                        {{$cus->province->province}}
                                        @endif
                                    </div>
                                    <button type="button" class="my-account__no-background-button my-account-profile__change-button" data-toggle="modal" data-target="#changeProvinceDistrict">{{ __('content.Change')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-with-label">
                        <div class="input-with-label__wrapper">
                            <div class="input-with-label__label">
                                <label>{{ __('content.District')}}</label>
                            </div>
                            <div class="input-with-label__content">
                                <div class="my-account__inline-container">
                                    <div class="my-account__input-text">
                                        @if(is_null($cus->id_district))
                                        Not found
                                        @else
                                        {{$cus->district->district_name}}
                                        @endif
                                    </div>
                                    <button type="button" class="my-account__no-background-button my-account-profile__change-button" data-toggle="modal" data-target="#changeProvinceDistrict">{{ __('content.Change')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-account-page__submit"><button type="submit" class="btn btn-primary btn--m btn--inline" aria-disabled="false">{{ __('content.Save')}}</button></div>
                </div>
                <div class="my-account-profile__right">
                    <div class="avatar-uploader">
                        <div class="avatar-uploader__avatar">
                            <img id="img_upload" class="avatar-uploader__avatar-image" src="{{asset('upload/'.$cus->image_acc)}}"></img>
                        </div>
                        <input class="avatar-uploader__file-input" name="image_acc" id="upload" type="file" accept=".jpg,.jpeg,.png">
                        <label type="button" for="upload" class="btn btn-light btn--m btn--inline d-flex align-items-center"> {{ __('content.Choose image')}}</label>
                        <div class="avatar-uploader__text-container">
                            <div class="avatar-uploader__text">{{ __('content.Max size file 5MB')}}</div>
                            <div class="avatar-uploader__text">Định dạng:.JPEG, .PNG</div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- MOdal -->
            <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-title text-left my-account-section__header">
                                <h4>{{ __('content.Change email')}}</h4>
                                <div class="my-account-section__header-subtitle">
                                {{ __('content.Change to new email, please enter your password')}}
                                </div>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form id="verifyPass" method="POST" data-route="{{ route('verifyemail') }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="password" name="verifyemail" class="form-control" id="verifyemail" placeholder="Password...">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round">{{ __('content.Confirm')}}</button>
                                </form>
                            </div>
                            </di>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="changePhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-title text-left my-account-section__header">
                                <h4>{{ __('content.Change phone number')}}</h4>
                                <div class="my-account-section__header-subtitle">
                                {{ __('content.Change to new phone mumber, please enter your password')}}
                                </div>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form id="verifyPassword" method="POST" data-route="{{ route('verifyphone') }}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text" name="verifyphone" class="form-control" id="verifyphone" placeholder="Password...">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round">Xác nhận</button>
                                </form>
                            </div>
                            </di>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="changeProvinceDistrict" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-title text-left my-account-section__header">
                                <h4>{{ __('content.Change Province, District')}}</h4>
                                <div class="my-account-section__header-subtitle">

                                </div>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form action="{{ route('changeProvinceDistrict') }}" id="changeProvinceDistrict" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <select name="province" id="province" class="form-control rounded-pill border-0 shadow-sm px-4">
                                            <option value="0" selected disabled>---{{ __('content.Choose Province')}}---</option>
                                            @foreach($pr as $province)
                                            <option value="{{$province->id}}">{{ucfirst($province->province)}}</option>
                                            @endforeach
                                        </select>
                                        <select name="district" id="district" class="form-control rounded-pill border-0 shadow-sm px-4" placeholder="Select Sub Category">
                                            <option value="0" selected disabled>---{{ __('content.Choose District')}}---</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round">{{ __('content.Confirm')}}</button>
                                </form>
                            </div>
                            </di>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
        </div>
    </div>
</div>

@stop
