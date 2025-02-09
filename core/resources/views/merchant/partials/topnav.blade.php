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
<nav class="navbar-wrapper common__bg d-flex flex-wrap">
    <div class="navbar__left">
        <button class="res-sidebar-open-btn" type="button"><i class="las la-bars"></i></button>
        <form class="navbar-search">
            <input class="navbar-search-field" id="searchInput" name="#0" type="search" autocomplete="off" placeholder="@lang('Menu search...')">
            <span class="navbar-search__btn">
                <i class="las la-search"></i>
            </span>
            <ul class="search-list d-none"></ul>
        </form>
    </div>
    <div class="navbar__right">
        <ul class="navbar__action-list">
            <li><span class="navbar-search-responsive-btn d-inline-flex d-sm-none"><i class="las la-search"></i></span></li>
            <li class="dropdown">
                <button class="notificationBtn primary--layer notification-bell" data-bs-toggle="dropdown" data-display="static" type="button" aria-haspopup="true" aria-expanded="false">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="@lang('Unread Notifications')">
                        <i class="las la-bell @if ($adminNotificationCount > 0) icon-left-right @endif"></i>
                    </span>
                    @if ($adminNotificationCount > 0)
                        <span class="notification-count">{{ $adminNotificationCount <= 9 ? $adminNotificationCount : '9+' }}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu--md box__shadow1 dropdown-menu-right border-0 p-0">
                    <div class="dropdown-menu__header">
                        <span class="caption">@lang('Notification')</span>
                        @if ($adminNotificationCount > 0)
                            <span class="badge badge__primary">{{ $adminNotificationCount }} @lang('Unread')</span>
                        @endif
                    </div>
                    <div class="dropdown-menu__body @if (blank($adminNotifications)) d-flex justify-content-center align-items-center @endif">
                        @forelse($adminNotifications as $notification)
                            <a class="dropdown-menu__item" href="{{ route('admin.notification.read', $notification->id) }}">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title">{{ __($notification->title) }}</h6>
                                        <span class="time text__primary"><i class="far fa-clock"></i> {{ diffForHumans($notification->created_at) }}</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="empty-notification text-center">
                                <img src="{{ getImage('assets/images/empty_list.png') }}" alt="empty">
                                <p class="mt-3">@lang('No unread notification found')</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="dropdown-menu__footer">
                        <a class="view-all-message" href="{{ route('admin.notifications') }}">@lang('View all notifications')</a>
                    </div>
                </div>
            </li>
            <li class="dropdown d-flex profile-dropdown">
                <button data-bs-toggle="dropdown" data-display="static" type="button" aria-haspopup="true" aria-expanded="false">
                    <span class="navbar-user">
                        <span class="navbar-user__thumb"><img src="{{ getImage(getFilePath('adminProfile') . '/' . auth()->guard('admin')->user()->image, getFileSize('adminProfile')) }}" alt="image"></span>
                        <span class="navbar-user__info">
                            <span class="navbar-user__name">{{ auth()->guard('admin')->user()->username }}</span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--sm box__shadow1 dropdown-menu-right border-0 p-0">
                    <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="{{ route('admin.profile') }}">
                        <i class="dropdown-menu__icon las la-user-circle"></i>
                        <span class="dropdown-menu__caption">@lang('Profile')</span>
                    </a>

                    <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="{{ route('admin.password') }}">
                        <i class="dropdown-menu__icon las la-key"></i>
                        <span class="dropdown-menu__caption">@lang('Password')</span>
                    </a>

                    <a class="dropdown-menu__item d-flex align-items-center px-3 py-2" href="{{ route('admin.logout') }}">
                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                        <span class="dropdown-menu__caption">@lang('Logout')</span>
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
