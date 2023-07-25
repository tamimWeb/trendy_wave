<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trendy Wave</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/images/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/flaticon/flaticon.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/sal.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/vendor/base.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.min.css">

</head>


<body class="sticky-header newsletter-popup-modal">

    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    @include('frontend.layouts.includes.header')

    <main class="main-wrapper">
        @yield('content')
    </main>


    @include('frontend.layouts.includes.service-area')

    @include('frontend.layouts.includes.footer')

    @include('frontend.layouts.partials.product-quick-view')

    @include('frontend.layouts.partials.header-search-modal')

    @include('frontend.layouts.partials.cart-dropdown')

    @include('frontend.layouts.partials.offer-modal')

    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- Modernizer JS -->
    <script src="{{ asset('frontend') }}/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend') }}/js/vendor/jquery.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend') }}/js/vendor/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/js.cookie.js"></script>
    <!-- <script src="{{ asset('frontend') }}/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('frontend') }}/js/vendor/jquery-ui.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/jquery.ui.touch-punch.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/jquery.countdown.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/sal.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/counterup.js"></script>
    <script src="{{ asset('frontend') }}/js/vendor/waypoints.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

</body>

</html>
