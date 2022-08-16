<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- APP Title -->
        <title>{{ config('app.name', 'Solutions Finder') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
        <link href="{{ asset('css/general.css') }}" rel="stylesheet">
        <link href="{{ asset('css/queries.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ids.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/post.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/post.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/create.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/admin.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home/profile.css') }}" rel="stylesheet">
    </head>
    <body>
        @guest
            @yield('content')
        @else
            @yield('content')
        @endguest

        <!-- JQuery JS -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <!-- My JS -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <!-- Ionicons JS -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
