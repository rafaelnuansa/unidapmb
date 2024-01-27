<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Penerimaan Mahasiswa Baru Universitas Djuanda</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('themes/assets/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('themes/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <!-- Vendor CSS Files -->
  <!-- Vendor CSS Files -->
<link href="{{ asset('themes/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('themes/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('themes/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('themes/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('themes/assets/css/main.css') }}" rel="stylesheet">

</head>

<body>

    @include('layouts.web-header')

    @if(request()->routeIs('home.index'))
    <x-hero></x-hero>
    @endif

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    @include('layouts.web-footer')
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- <div id="preloader"></div> --}}
    <!-- Vendor JS Files -->
    <script src="{{ asset('themes/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('themes/assets/js/main.js') }}"></script>


</body>

</html>
