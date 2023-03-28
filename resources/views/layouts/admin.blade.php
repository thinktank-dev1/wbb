<!doctype html>
<html lang="en">
    <head>    
        <meta charset="utf-8" />
        <title>WE BUY BAKKIES::ADMIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/wbbo_fav48.png') }}">
        <link href="{{ asset('admin-assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/css/preloader.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin-assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="layout-wrapper">
            @include('admin.partials.header')
            @include('admin.partials.menu')
            @yield('content')
            @include('admin.partials.footer')
        </div>
        
        <script src="{{ asset('admin-assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/pace-js/pace.min.js') }}"></script>
        <script src="{{ asset('admin-assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/app.js') }}"></script>

        @stack('scripts')

    </body>
</html>
