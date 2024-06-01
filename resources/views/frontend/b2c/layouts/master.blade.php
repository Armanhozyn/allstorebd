<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>
        @yield('title')
    </title>
    <link rel="icon" type="image/png" href="{{asset($logoSetting->favicon)}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/venobox.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{asset('frontend/b2c/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/responsive.css')}}">
    @if($settings->layout === 'RTL')
    <link rel="stylesheet" href="{{asset('frontend/b2c/css/rtl.css')}}">
    @endif
    {{-- @vite(['resources/js/app.js']) --}}
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
        @include('frontend.b2c.layouts.header')
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
        @include('frontend.b2c.layouts.menu')
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--============================
        Main Content Start
    ==============================-->
        @yield('content')
    <!--============================
       Main Content End
    ==============================-->


    <section class="product_popup_modal">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content product-modal-content">

                </div>
            </div>
        </div>
    </section>

    <!--============================
        FOOTER PART START
    ==============================-->
        @include('frontend.b2c.layouts.footer')
    <!--============================
        FOOTER PART END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{asset('frontend/b2c/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('frontend/b2c/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('frontend/b2c/js/Font-Awesome.js')}}"></script>
    <!--select2 js-->
    <script src="{{asset('frontend/b2c/js/select2.min.js')}}"></script>
    <!--slick slider js-->
    <script src="{{asset('frontend/b2c/js/slick.min.js')}}"></script>
    <!--simplyCountdown js-->
    <script src="{{asset('frontend/b2c/js/simplyCountdown.js')}}"></script>
    <!--product zoomer js-->
    <script src="{{asset('frontend/b2c/js/jquery.exzoom.js')}}"></script>
    <!--nice-number js-->
    <script src="{{asset('frontend/b2c/js/jquery.nice-number.min.js')}}"></script>
    <!--counter js-->
    <script src="{{asset('frontend/b2c/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/b2c/js/jquery.countup.min.js')}}"></script>
    <!--add row js-->
    <script src="{{asset('frontend/b2c/js/add_row_custon.js')}}"></script>
    <!--multiple-image-video js-->
    <script src="{{asset('frontend/b2c/js/multiple-image-video.js')}}"></script>
    <!--sticky sidebar js-->
    <script src="{{asset('frontend/b2c/js/sticky_sidebar.js')}}"></script>
    <!--price ranger js-->
    <script src="{{asset('frontend/b2c/js/ranger_jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/b2c/js/ranger_slider.js')}}"></script>
    <!--isotope js-->
    <script src="{{asset('frontend/b2c/js/isotope.pkgd.min.js')}}"></script>
    <!--venobox js-->
    <script src="{{asset('frontend/b2c/js/venobox.min.js')}}"></script>
    <!--Toaster js-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--Sweetalert js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--classycountdown js-->
    <script src="{{asset('frontend/b2c/js/jquery.classycountdown.js')}}"></script>


    <!--main/custom js-->
    <script src="{{asset('frontend/b2c/js/main.js')}}"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{$error}}")
            @endforeach
        @endif
    </script>
    <script>
        $(document).ready(function(){
            $('.auto_click').click();
        })
    </script>
    @include('frontend.b2c.layouts.scripts')
    @stack('scripts')
</body>

</html>
