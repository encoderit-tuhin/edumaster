<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('login-assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('login-assets/css/app.css') }}" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">

    <!-- Custom Styles -->
    @yield('styles')
</head>

<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>

</html>
