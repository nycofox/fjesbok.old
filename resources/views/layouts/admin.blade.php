<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <base href="../"/>

    <title>Admin - {{ config('app.name') }}</title>

    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/ace.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist/@fortawesome/fontawesome-free/css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/@fortawesome/fontawesome-free/css/regular.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/@fortawesome/fontawesome-free/css/brands.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/@fortawesome/fontawesome-free/css/solid.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/ace-font.css') }}">


    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/fjesbok-logo.png') }}"/>

    <!-- "Starter" page styles, specific to this page for demo only -->
</head>

<body>
<div class="body-container">
    <!-- Navbar -->
    <nav class="navbar navbar-sm navbar-expand-lg navbar-fixed navbar-blue">
        <div class="navbar-inner brc-grey-l2 shadow-md">

            <!-- this button collapses/expands sidebar in desktop mode -->
            <button type="button" class="btn btn-burger align-self-center d-none d-xl-flex mx-2" data-toggle="sidebar"
                    data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                <span class="bars"></span>
            </button>

            <div class="d-flex h-100 align-items-center justify-content-xl-between">
                <!-- this button shows/hides sidebar in mobile mode -->
                <button type="button"
                        class="btn btn-burger static burger-arrowed collapsed d-flex d-xl-none ml-2 bgc-h-white-l31"
                        data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar"
                        aria-expanded="false" aria-label="Toggle sidebar">
                    <span class="bars text-white"></span>
                </button>

                <a class="navbar-brand ml-2 text-white" href="{{ route('admin.dashboard') }}">
                    {{ config('app.name') }} - Admin
                </a>
            </div>


            <!-- .navbar-menu toggler -->
            <button class="navbar-toggler mx-1 p-25" type="button" data-toggle="collapse" data-target="#navbarMenu"
                    aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
                <i class="fa fa-user text-white"></i>
            </button>

            <div class="ml-auto mr-lg-2 navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
                <div class="navbar-nav">
                    <ul class="nav nav-compact-2">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle mr-1px" href="{{ route('home') }}">
                                Back to site
                            </a>
                        </li>

                        {{--                        <li class="nav-item">--}}
                        {{--                            <a class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" href="#">--}}
                        {{--                                <i class="fa fa-bell mr-lg-2"></i>--}}
                        {{--                                <span class="badge bgc-white text-orange-d4 badge-pill mt-lg-n1">3</span>--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>
            </div><!-- .navbar-menu -->


        </div><!-- .navbar-inner -->
    </nav>
    <div class="main-container bgc-white">

    @include('admin._sidebar')

    <!-- Main Content -->
        <div role="main" class="main-content">
            <!-- Page Content -->
            <div class="page-content container container-plus">
                {{ $slot }}
            </div>

        </div>

    </div>

</div>

<script src="{{ asset('dist/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('dist/popper.js/dist/umd/popper.js') }}"></script>
<script src="{{ asset('dist/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('dist/js/ace.js') }}"></script>

@stack('page-scripts')

</body>

</html>
