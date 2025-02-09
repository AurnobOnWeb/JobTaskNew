@extends('merchant.layouts.master')
@section('content')
<!-- page-wrapper start -->
<div class="page-wrapper default-version">
    @include('merchant.partials.sidenav')
    @include('merchant.partials.topnav')

    <div class="px-3 container-fluid px-sm-0">
        <div class="body-wrapper">
            <div class="bodywrapper__inner">
                @stack('topBar')
                @include('merchant.partials.breadcrumb')
                @yield('panel')
            </div>
        </div>
    </div>
</div>
@endsection
