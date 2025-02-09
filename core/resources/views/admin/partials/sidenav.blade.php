<div class="sidebar common__bg">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a class="sidebar__main-logo" href="{{ route('admin.dashboard') }}"><img src="" alt="image"></a>
        </div>
        <div class="sidebar__menu-wrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{ menuActive('admin.dashboard') }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="menu-icon las la-stream"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                {{--
                <li class="sidebar-menu-item {{ menuActive('admin.system.info') }}">
                    <a class="nav-link" href="{{ route('admin.system.info') }}">
                        <i class="menu-icon las la-info-circle"></i>
                        <span class="menu-title">@lang('System Info')</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- sidebar end -->

@push('script')
<script>
    (function($) {
            'use strict';
            if ($('li').hasClass('active')) {
                $('#sidebar__menuWrapper').animate({
                    scrollTop: eval($(".active").offset().top - 320)
                }, 500);
            }
        })(jQuery)
</script>
@endpush