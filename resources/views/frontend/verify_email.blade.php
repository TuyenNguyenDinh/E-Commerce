@extends('layouts.master')
@section('main')
<div class="container">
    <div class="section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('content.Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('content.A fresh verification link has been sent to your email address.') }}
                        </div>
                        @endif

                        {{ __('content.Before proceeding, please check your email for a verification link.') }}
                        {{ __('content.If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verify.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('content.click here to another request ') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection