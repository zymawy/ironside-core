<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <meta name="author" content="{!! config('app.author') !!}">
    <meta name="keywords" content="{!! config('app.keywords') !!}">
    <meta name="description" content="{{ isset($description) ? $description : config('app.description') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icons -->
    @include ('ironside::partials.favicons')

    <title>{{ isset($title) ? $title : config('app.name') }}</title>
    {{--    <link rel="stylesheet" href="{{ asset('/css/dashboard/app.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/css/dashboard/dashboard.css') }}">--}}
        <link rel="stylesheet" href="{{ asset('/css/dashboard/theme.css') }}">
{{--    <link rel="stylesheet" href="{{ mix('/css/dashboard/theme.css') }}">--}}
    {{--<link rel="stylesheet" href="/css/admin/calendar2.css">--}}
    {{--<link rel="stylesheet" href="/css/admin/carousel.css">--}}
    @yield('css')
    @if(App::isLocale('ar'))
        <link rel="stylesheet" href="{{ asset('/css/dashboard/rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('/css/dashboard/ltr.css') }}">
@endif
{{--<link rel="stylesheet" href="/css/override.css">--}}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fix-header fix-sidebar">
<h1 class="hidden">{{ isset($HTMLTitle) ? $HTMLTitle : config('app.name') }}</h1>
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
<svg class="circular" viewBox="25 25 50 50">
    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
</svg>
</div>
<div>

@if(App::isLocale('ar'))

    @include('ironside::layouts.dashboard.includes.header-rtl')
{{--    @include('dashboard.partials.header')--}}

@else

    @include('ironside::layouts.dashboard.includes.header')

@endif

@include ('ironside::dashboard.partials.navigation')

<!-- Main wrapper  -->
    <div>
        <div id="main-wrapper">
            <!-- Page wrapper  -->
            <div class="page-wrapper">
                @include('ironside::dashboard.partials.navigation')
            <!-- Container fluid  -->
                <div class="container-fluid" id="app">
                        <!-- Start Page Content -->
                             @yield('content')
                        <!-- End PAge Content -->
                </div>
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- Main wrapper  -->
@include('ironside::layouts.dashboard.includes.footer')
<!-- All Jquery -->
    <script src="/js/app.js"></script>
{{--<script src="/js/dashboard/theme.js"></script>--}}

<!-- Bootstrap tether Core JavaScript -->
{{--<script src="/js/admin/jquery.js"></script>--}}
{{--<script src="/js/admin/bootstrap.js"></script>--}}
{{--<!-- slimscrollbar scrollbar JavaScript -->--}}
{{--<script src="/js/admin/slimscroll.js"></script>--}}
{{--<!--Menu sidebar -->--}}
{{--<script src="/js/admin/sidebarmenu.js"></script>--}}
{{--<!--stickey kit -->--}}
{{--<script src="/js/admin/sticky-kit.js"></script>--}}
{{--<!--Custom JavaScript -->--}}

{{--<!-- Amchart -->--}}
{{--<script src="/js/admin/morris-chart.js"></script>--}}

{{--<script src="/js/admin/calendar-2.js"></script>--}}

{{--<script src="/js/admin/owl-carousel.js"></script>--}}

<!-- scripit init-->
    @include('notify::notify')
    @include('ironside::dashboard.partials.modals')

    <script type="text/javascript" charset="utf-8" src="/js/dashboard/dashboard.js?v=1"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            initDashboard();
        });
    </script>
{{--@yield('scripts')--}}
@yield('js')
@if(config('app.env') != 'local')
    @include('ironside::partials.analytics')
@endif

</body>
</html>
