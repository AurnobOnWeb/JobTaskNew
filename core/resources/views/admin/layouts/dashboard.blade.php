@extends('admin.layouts.master')
@section('content')
    <!-- page-wrapper start -->
    <div class="page-wrapper default-version">
        @include('admin.partials.sidenav')
        @include('admin.partials.topnav')

        <div class="container-fluid px-sm-0 px-3">
            <div class="body-wrapper">
                <div class="bodywrapper__inner">
                    @stack('topBar')
                    @include('admin.partials.breadcrumb')
                    @yield('panel')
                </div>
            </div>
        </div>
    </div>
@endsection
