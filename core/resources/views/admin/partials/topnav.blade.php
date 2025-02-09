@php
$sidenav = [];

$settings = [];

$routesData = [];
foreach (\Illuminate\Support\Facades\Route::getRoutes() as $route) {
$name = $route->getName();
if (strpos($name, 'admin') !== false) {
$routeData = [
$name => url($route->uri()),
];

$routesData[] = $routeData;
}
}
@endphp

<!-- navbar-wrapper start -->
<nav class="flex-wrap navbar-wrapper common__bg d-flex">
    <div class="navbar__left">
        <button class="res-sidebar-open-btn" type="button"><i class="las la-bars"></i></button>
        <form class="navbar-search">
            <input class="navbar-search-field" id="searchInput" name="#0" type="search" autocomplete="off"
                placeholder="@lang('Menu search...')">
            <span class="navbar-search__btn">
                <i class="las la-search"></i>
            </span>
            <ul class="search-list d-none"></ul>
        </form>
    </div>
    <div class="navbar__right">
        <ul class="navbar__action-list">
            <li><span class="navbar-search-responsive-btn d-inline-flex d-sm-none"><i class="las la-search"></i></span>
            </li>

            <li class="dropdown d-flex profile-dropdown">
                <button data-bs-toggle="dropdown" data-display="static" type="button" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="navbar-user">
                        {{-- <span class="navbar-user__thumb"><img
                                src="{{ getImage(getFilePath('adminProfile') . '/' . auth()->guard('admin')->user()->image, getFileSize('adminProfile')) }}"
                                alt="image"></span> --}}
                        <span class="navbar-user__info">
                            <span class="navbar-user__name">{{ auth()->guard('admin')->user()->name ?? 'Admin' }}</span>
                        </span>
                    </span>
                </button>
                <div class="p-0 border-0 dropdown-menu dropdown-menu--sm box__shadow1 dropdown-menu-right">
                    {{-- <a class="px-3 py-2 dropdown-menu__item d-flex align-items-center"
                        href="{{ route('admin.profile') }}">
                        <i class="dropdown-menu__icon las la-user-circle"></i>
                        <span class="dropdown-menu__caption">@lang('Profile')</span>
                    </a>

                    <a class="px-3 py-2 dropdown-menu__item d-flex align-items-center"
                        href="{{ route('admin.password') }}">
                        <i class="dropdown-menu__icon las la-key"></i>
                        <span class="dropdown-menu__caption">@lang('Password')</span>
                    </a> --}}

                    <a class="px-3 py-2 dropdown-menu__item d-flex align-items-center">
                        <form action="{{ route('merchant.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-menu__caption d-flex align-items-center">
                                <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                                <span class="dropdown-menu__caption">@lang('Logout')</span>
                            </button>
                        </form>
                    </a>
                </div>
                <button class="breadcrumb_nav-open d-none ms-2" type="button">
                    <i class="las la-sliders-h"></i>
                </button>
            </li>
        </ul>
    </div>
</nav>
<!-- navbar-wrapper end -->

@push('script-lib')
<script src="{{ asset('assets/admin/js/search.js') }}"></script>
@endpush
@push('script')
<script>
    "use strict";
        $('.navbar__action-list .dropdown-menu').on('click', function(event) {
            event.stopPropagation();
        });
</script>
@endpush