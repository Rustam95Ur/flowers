<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{Voyager::setting('site.title')}} - @yield('title')</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="@yield('description', Voyager::setting('site.description'))">
    <meta name="keywords" content="@yield('keywords', Voyager::setting('site.keywords'))"/>
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
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @stack('css')
    <script src="//code-ya.jivosite.com/widget/{{env('JIVO_TOKEN')}}" async></script>
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
<div class="drop_up">
    <button class="drop_btn">Соц. сети</button>
    <div class="drop_up-content">
        <a href="#" class="text-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a>
        <a href="#" class="text-danger"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
        <a href="#" class="text-success"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
        <a href="#" class="text-primary"><i class="fa fa-telegram" aria-hidden="true"></i> Telegram</a>
        <a href="#" class="text-pink"><i class="fa fa-phone" aria-hidden="true"></i> Viber</a>
    </div>
</div>

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
<!-- Cart JS -->
<script src="{{asset('js/cart.js')}}"></script>
@stack('scripts')

@if ($message = session()->get('success') or $message =  session()->get('error') or $message = session()->get('warning') or $message =  session()->get('info') or $errors->any())
    <script>
        (function ($) {
            $(function () {
                $('#message_modal').modal('show');
                setTimeout(function () {
                    $('#message_modal').modal('hie')
                }, 5000);
            });
        })(jQuery);
    </script>
@endif
@if(!session('city_modal_disable'))
    <script>
        (function ($) {
            $(function () {
                $('#select_city_modal').modal('show');
            });
        })(jQuery);
    </script>
@endif
</body>

</html>
