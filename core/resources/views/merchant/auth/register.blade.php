@extends('merchant.layouts.master')
@section('content')
<div class="login-main" style="background-image: url('{{ asset('assets/admin/images/login.jpg') }}')">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <div class="login-area">
                    <div class="login-wrapper">
                        <div class="login-wrapper__top">
                            <h3 class="title">{{ __($pageTitle) }} @lang('Merchant')</h3>
                            <p class="desc"> @lang('Login ')@lang('Dashboard')</p>
                        </div>
                        <div class="login-wrapper__body">
                            <form action="{{ route('merchant.register.submit') }}" method="POST"
                                class="cmn-form mt-30 login-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name">@lang('Name')</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">@lang('Email')</label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" name="email" required>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">@lang('Password')</label>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="password-confirm">@lang('Confirm Password')</label>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <button type="submit" class="btn common_btn w-100">@lang('Register')</button>
                            </form>

                            <div class="gap-2 mt-4 text-white d-flex justify-content-center">
                                @lang('Already Have an Account!')
                            </div>
                            <div class="gap-2 mt-4 d-flex justify-content-center">
                                <a href="{{ route('merchant.login') }}" class="btn bg-success w-50">@lang('Merchant
                                    Login')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection