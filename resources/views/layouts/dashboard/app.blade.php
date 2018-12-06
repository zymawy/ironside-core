<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">

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
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/dashboard/theme.css') }}">
    <link rel="stylesheet" href="/css/dashboard/override.css">
    @yield('css')
    @if(App::isLocale('ar'))
            <link rel="stylesheet" href="{{ asset('/css/dashboard/rtl.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('/css/dashboard/ltr.css') }}">
    @endif

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fix-header fix-sidebar" dir="{{App::isLocale('ar')? 'rtl':'ltr'}}">
<h1 class="hidden">{{ isset($title) ? $title : config('app.name') }}</h1>
<!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    @include('ironside::layouts.dashboard.includes.header')

    @include('ironside::dashboard.partials.navigation')

<!-- Main wrapper  -->
    <div>
            <div id="main-wrapper">
                    <!-- Page wrapper  -->
                <div class="page-wrapper">
                        @include('ironside::layouts.dashboard.includes.breadcrumb')
                        <!-- Container fluid  -->
                    <div class="container-fluid" id="app">
                                        <!-- Start Page Content -->
                                             @yield('content')
                                        <!-- End PAge Content -->
                    </div>
                        <!-- End Container fluid  -->
                </div>
                    <!-- End Page wrapper  -->
            </div>
            <!-- Main wrapper  -->
    </div>
    @include('notify::notify')
    @include('ironside::dashboard.partials.modals')
    @include('ironside::layouts.dashboard.includes.footer')
    <script src="/js/app.js"></script>
    <script src="/js/dashboard/datatable.js"></script>
    <script src="/js/dashboard/theme.js"></script>
    <script type="text/javascript" charset="utf-8" src="/js/dashboard/dashboard.js?v=1"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            initDashboard();
        });
    </script>

@yield('js')
@if(config('app.env') != 'local')
    @include('ironside::partials.analytics')
@endif

</body>
</html>
