<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{Voyager::setting('site.title')}}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/font.awesome.min.css')}}">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/vendor/linearicons.min.css')}}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/animate.min.css')}}">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/jquery-ui.min.css')}}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('css/plugins/nice-select.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/plugins/magnific-popup.css')}}">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>

<!--===== Pre-Loading area Start =====-->
<div id="preloader">
    <div class="preloader">
        <div class="spinner-block">
            <h1 class="spinner spinner-3 mb-0">.</h1>
        </div>
    </div>
</div>
<!--==== Pre-Loading Area End ====-->

<!-- Header Area Start Here -->
@include('layouts.header')
<!-- Header Area End Here -->

@if(request()->route()->getName() != 'home')
<!-- Breadcrumb Area Start Here -->
@include('layouts.breadcrumb')
<!-- Breadcrumb Area End Here -->
@endif


@yield('content')

<!--Footer Area Start-->
@extends('layouts.footer')

<!--Footer Area End-->

<!-- Modal -->
@extends('layouts.modal')

<!-- Scroll to Top Start -->
<a class="scroll-to-top" href="#">
    <i class="lnr lnr-arrow-up"></i>
</a>
<!-- Scroll to Top End -->

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="{{asset('js/vendor/modernizr-3.7.1.min.js')}}"></script>
<!-- jQuery JS -->
<script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('js/vendor/bootstrap.bundle.min.js')}}"></script>

<!-- Swiper Slider JS -->
<script src="{{asset('js/plugins/swiper-bundle.min.js')}}"></script>
<!-- nice select JS -->
<script src="{{asset('js/plugins/nice-select.min.js')}}"></script>
<!-- Ajaxchimpt js -->
<script src="{{asset('js/plugins/jquery.ajaxchimp.min.js')}}"></script>
<!-- Jquery Ui js -->
<script src="{{asset('js/plugins/jquery-ui.min.js')}}"></script>
<!-- Jquery Countdown js -->
<script src="{{asset('js/plugins/jquery.countdown.min.js')}}"></script>
<!-- jquery magnific popup js -->
<script src="{{asset('js/plugins/jquery.magnific-popup.min.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>


</body>

</html>
