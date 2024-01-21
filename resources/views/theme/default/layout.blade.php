<!doctype html>
<html lang="{{ App::currentLocale() }}">

<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- title -->
    <title>Notre Dame College Mymensingh</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://ndcm.edu.bd/public/frontend/images/favicon/favicon.png">

    <!-- ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <!--  Fonts and icons     -->
    <link href="{{ asset('backend') }}/css/font-awesome.min.css" rel="stylesheet">

    <!-- include css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/master.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/single.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/teacher_profile.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bongobondhu.css') }}">

    @yield('styles')

    <!-- jQuery js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</head>

{{-- DEMO PAGE:: https://ndcm.edu.bd --}}

<body>

    @include('theme.default.partials.nav')

    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">-->
    <!-- youbube popup -->
    {{-- <link rel="stylesheet" href="https://ndcm.edu.bd/public/frontend/vendors/youtube_popup/css/YouTubePopUp.css"> --}}
    <!-- animated css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- aos animate css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">

    @yield('content')

    @include('theme.default.partials.footer')

    <!-- include js -->
    @include('theme.default.partials.scripts')

    <script src="{{ asset('frontend/js/app.js') }}"></script>

    @yield('scripts')
</body>

</html>
