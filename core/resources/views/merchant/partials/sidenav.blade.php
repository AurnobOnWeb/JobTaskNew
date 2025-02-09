<div class="sidebar common__bg">
    <button class="res-sidebar-close-btn"><i class="las la-times"></i></button>
    <div class="sidebar__inner">
        <div class="sidebar__logo">
            <a class="sidebar__main-logo" href="{{ route('admin.dashboard') }}"><img src="{{ siteLogo() }}" alt="image"></a>
        </div>
        <div class="sidebar__menu-wrapper">
            <ul class="sidebar__menu">
                <li class="sidebar-menu-item {{ menuActive('admin.dashboard') }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="menu-icon las la-stream"></i>
                        <span class="menu-title">@lang('Dashboard')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.users*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-users-cog"></i>
                        <span class="menu-title">@lang('User Manager')</span>
                        @if ($bannedUsersCount + $emailUnverifiedUsersCount + $mobileUnverifiedUsersCount > 0)
                            <span class="menu_badge menu_badge_level__1 ms-auto">
                            <i class="fa-regular fa-bell"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.users*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.list') }}">
                                <a class="nav-link" href="{{ route('admin.users.list') }}">
                                    <span class="menu-title">@lang('Users List')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.active') }}">
                                <a class="nav-link" href="{{ route('admin.users.active') }}">
                                    <span class="menu-title">@lang('Active Users')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.banned') }}">
                                <a class="nav-link" href="{{ route('admin.users.banned') }}">
                                    <span class="menu-title">@lang('Banned Users')</span>
                                    @if ($bannedUsersCount)
                                        <span class="menu_badge bg__info ms-auto">{{ $bannedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.email.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.users.email.unverified') }}">
                                    <span class="menu-title">@lang('Email Unverified')</span>
                                    @if ($emailUnverifiedUsersCount)
                                        <span class="menu_badge bg__info ms-auto">{{ $emailUnverifiedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.mobile.unverified') }}">
                                <a class="nav-link" href="{{ route('admin.users.mobile.unverified') }}">
                                    <span class="menu-title">@lang('Mobile Unverified')</span>
                                    @if ($mobileUnverifiedUsersCount)
                                        <span class="menu_badge bg__info ms-auto">{{ $mobileUnverifiedUsersCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.users.notification.all') }}">
                                <a class="nav-link" href="{{ route('admin.users.notification.all') }}">
                                    <span class="menu-title">@lang('Notify Users')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.deposit*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-coins"></i>
                        <span class="menu-title">@lang('Deposit Log')</span>
                        @if ($pendingDepositsCount > 0)
                            <span class="menu_badge menu_badge_level__1 ms-auto">
                            <i class="fa-regular fa-bell"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.deposit*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.list') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.list') }}">
                                    <span class="menu-title">@lang('All')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.pending') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.pending') }}">
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if ($pendingDepositsCount)
                                        <span class="menu_badge bg__info ms-auto">{{ $pendingDepositsCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.approved') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.approved') }}">
                                    <span class="menu-title">@lang('Approved')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.successful') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.successful') }}">
                                    <span class="menu-title">@lang('Successful')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.rejected') }}">
                                    <span class="menu-title">@lang('Rejected')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.deposit.initiated') }}">
                                <a class="nav-link" href="{{ route('admin.deposit.initiated') }}">
                                    <span class="menu-title">@lang('Initiated')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.withdraw.data*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-hand-holding-usd"></i>
                        <span class="menu-title">@lang('Withdrawal Log')</span>
                        @if ($pendingWithdrawCount > 0)
                            <span class="menu_badge menu_badge_level__1 ms-auto">
                            <i class="fa-regular fa-bell"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.withdraw.data*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.data.all') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.data.all') }}">
                                    <span class="menu-title">@lang('All')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.data.pending') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.data.pending') }}">
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if ($pendingWithdrawCount)
                                        <span class="menu_badge bg__info ms-auto">{{ $pendingWithdrawCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.data.approved') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.data.approved') }}">
                                    <span class="menu-title">@lang('Approved')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.withdraw.data.rejected') }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.data.rejected') }}">
                                    <span class="menu-title">@lang('Rejected')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.ticket*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon la la-headset"></i>
                        <span class="menu-title">@lang('Customer Support')</span>
                        @if ($pendingTicketCount > 0)
                            <span class="menu_badge menu_badge_level__1 ms-auto">
                            <i class="fa-regular fa-bell"></i>
                            </span>
                        @endif
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.ticket*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.index') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.index') }}">
                                    <span class="menu-title">@lang('All')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.pending') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.pending') }}">
                                    <span class="menu-title">@lang('Pending')</span>
                                    @if ($pendingTicketCount)
                                        <span class="menu_badge bg__info ms-auto">{{ $pendingTicketCount }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.answered') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.answered') }}">
                                    <span class="menu-title">@lang('Answered')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive('admin.ticket.closed') }}">
                                <a class="nav-link" href="{{ route('admin.ticket.closed') }}">
                                    <span class="menu-title">@lang('Closed')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive('admin.report*', 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-flag"></i>
                        <span class="menu-title">@lang('Report')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive('admin.report*', 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive(['admin.report.transaction', 'admin.report.transaction.search']) }}">
                                <a class="nav-link" href="{{ route('admin.report.transaction') }}">
                                    <span class="menu-title">@lang('Transaction Log')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.report.notification.history']) }}">
                                <a class="nav-link" href="{{ route('admin.report.notification.history') }}">
                                    <span class="menu-title">@lang('Notification Log')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.report.login.history', 'admin.report.login.ipHistory']) }}">
                                <a class="nav-link" href="{{ route('admin.report.login.history') }}">
                                    <span class="menu-title">@lang('User Logins')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="sidebar-menu-item {{ menuActive('admin.subscriber*') }}">
                    <a class="nav-link" href="{{ route('admin.subscriber.index') }}">
                        <i class="menu-icon las la-puzzle-piece"></i>
                        <span class="menu-title">@lang('Subscribers')</span>
                    </a>
                </li>

                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive(['admin.frontend*', 'admin.setting.logo.icon', 'admin.seo', 'admin.setting.cookie'], 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-cogs"></i>
                        <span class="menu-title">@lang('Frontend Manager')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive(['admin.frontend*', 'admin.setting.logo.icon', 'admin.seo', 'admin.setting.cookie'], 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive(['admin.frontend.manage*']) }}">
                                <a class="nav-link" href="{{ route('admin.frontend.manage.pages') }}">
                                    <span class="menu-title">@lang('Pages')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive(['admin.frontend.index']) }}">
                                <a class="nav-link" href="{{ route('admin.frontend.index') }}">
                                    <span class="menu-title">@lang('Sections')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive(['admin.setting.logo.icon']) }}">
                                <a class="nav-link" href="{{ route('admin.setting.logo.icon') }}">
                                    <span class="menu-title">@lang('Logo and Favicon')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.seo']) }}">
                                <a class="nav-link" href="{{ route('admin.seo') }}">
                                    <span class="menu-title">@lang('SEO Configuration')</span>
                                </a>
                            </li>

                            <li class="sidebar-menu-item {{ menuActive('admin.frontend.sections', null, 'policy_pages') }}">
                                <a class="nav-link" href="{{ route('admin.frontend.sections', 'policy_pages') }}">
                                    <span class="menu-title">@lang('Policy Pages')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.setting.cookie']) }}">
                                <a class="nav-link" href="{{ route('admin.setting.cookie') }}">
                                    <span class="menu-title">@lang('Cookie Policy')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive(['admin.gateway*', 'admin.withdraw.method*'], 3) }}" href="javascript:void(0)">
                        <i class="menu-icon las la-wallet"></i>
                        <span class="menu-title">@lang('Finance Setting')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive(['admin.gateway*', 'admin.withdraw.method*'], 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive(['admin.gateway*']) }}">
                                <a class="nav-link" href="{{ route('admin.gateway.automatic.index') }}">
                                    <span class="menu-title">@lang('Payment Gateways')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.withdraw.method*']) }}">
                                <a class="nav-link" href="{{ route('admin.withdraw.method.index') }}">
                                    <span class="menu-title">@lang('Withdrawals Methods')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item sidebar-dropdown">
                    <a class="{{ menuActive(['admin.setting.general', 'admin.setting.system.configuration', 'admin.setting.notification*', 'admin.language*', 'admin.plugins.index'], 3) }}" href="javascript:void(0)">
                    <i class="menu-icon las la-tools"></i>
                        <span class="menu-title">@lang('System Setting')</span>
                    </a>
                    <div class="sidebar-submenu {{ menuActive(['admin.setting.general', 'admin.setting.system.configuration', 'admin.setting.notification*', 'admin.language*', 'admin.plugins.index'], 2) }}">
                        <ul>
                            <li class="sidebar-menu-item {{ menuActive(['admin.setting.general']) }}">
                                <a class="nav-link" href="{{ route('admin.setting.general') }}">
                                    <span class="menu-title">@lang('General Setting')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.setting.system.configuration']) }}">
                                <a class="nav-link" href="{{ route('admin.setting.system.configuration') }}">
                                    <span class="menu-title">@lang('System Configuration')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.setting.notification*']) }}">
                                <a class="nav-link" href="{{ route('admin.setting.notification.global') }}">
                                    <span class="menu-title">@lang('Notification Setting')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.language*']) }}">
                                <a class="nav-link" href="{{ route('admin.language.manage') }}">
                                    <span class="menu-title">@lang('Language')</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item {{ menuActive(['admin.plugins.index']) }}">
                                <a class="nav-link" href="{{ route('admin.plugins.index') }}">
                                    <span class="menu-title">@lang('Plugins')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-menu-item {{ menuActive('admin.system.info') }}">
                    <a class="nav-link" href="{{ route('admin.system.info') }}">
                    <i class="menu-icon las la-info-circle"></i>
                        <span class="menu-title">@lang('System Info')</span>
                    </a>
                </li>
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
