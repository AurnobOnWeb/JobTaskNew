@extends('admin.layouts.master')
@section('content')
<div class="login-main" style="background-image: url('{{ asset('assets/admin/images/login.jpg') }}')">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-8 col-sm-11">
                <div class="login-area">
                    <div class="login-wrapper">
                        <div class="login-wrapper__top">
                            <h3 class="title">@lang('Sign in to') @lang('admin')</h3>
                            <p class="desc">{{ __($pageTitle) }}
                                @lang('Dashboard')</p>
                        </div>
                        <div class="login-wrapper__body">
                            <form action="{{ route('admin.login') }}" method="POST"
                                class="cmn-form mt-30 has-gcaptcha login-form">
                                @csrf
                                <div class="form-group">
                                    <label>@lang('Username')</label>
                                    <input type="text" class="form-control" value="{{ old('username') }}"
                                        name="username" required>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label>@lang('Password')</label>
                                    </div>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                {{-- <div class="d-flex justify-content-end">
                                    <a href="{{ route('admin.password.reset') }}" class="forget-text">@lang('Forgot
                                        Password?')</a>
                                </div> --}}

                                <button type="submit" class="btn common_btn w-100">@lang('LOGIN')</button>
                            </form>
                            <div class="gap-2 mt-4 d-flex justify-content-center">
                                <a href="{{ route('merchant.login') }}" class="btn bg-warning w-100">@lang('Merchant
                                    Login')</a>
                                <a href="{{ route('admin.login') }}" class="btn bg-success w-100">@lang('Admin
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
