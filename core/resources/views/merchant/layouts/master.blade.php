<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>{{ gs()->siteName($pageTitle ?? '') }}</title> --}}
    <Title>{{ $pageTitle}} </Title>
    <link type="image/png" href="" rel="shortcut icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/common/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/common/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/common/css/line-awesome.min.css') }}" rel="stylesheet">

    @stack('style-lib')

    <link href="{{ asset('assets/common/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">

    @stack('style')
</head>

<body>

    <div class="main__bg">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="body-overlay"></div>
    @yield('content')

    <script src="{{ asset('assets/common/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/bootstrap.bundle.min.js') }}"></script>

    @include('partials.notify')
    @stack('script-lib')

    <script src="{{ asset('assets/common/js/nicEdit.js') }}"></script>

    <script src="{{ asset('assets/common/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    {{-- LOAD NIC EDIT --}}
    <script>
        "use strict";
            bkLib.onDomLoaded(function() {
                $(".nicEdit").each(function(index) {
                    $(this).attr("id", "nicEditor" + index);
                    new nicEditor({
                        fullPanel: true
                    }).panelInstance('nicEditor' + index, {
                        hasPanel: true
                    });
                });
            });
            (function($) {
                $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain', function() {
                    $('.nicEdit-main').focus();
                });

                $('.breadcrumb_nav-open').on('click', function() {
                    $(this).toggleClass('active');
                    $('.breadcrumb_nav').toggleClass('active');
                });

                $('.breadcrumb_nav-close').on('click', function() {
                    $('.breadcrumb_nav').removeClass('active');
                });

                if ($('.topTap').length) {
                    $('.breadcrumb_nav-open').removeClass('d-none');
                }
            })(jQuery);
    </script>

    @stack('script')

</body>

</html>
