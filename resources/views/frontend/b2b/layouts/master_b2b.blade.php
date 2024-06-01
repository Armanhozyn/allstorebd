@php
    $categories = \App\Models\Category::where('status', 1)
        ->with([
            'subCategories' => function ($query) {
                $query->where('status', 1)->with([
                    'childCategories' => function ($query) {
                        $query->where('status', 1);
                    },
                ]);
            },
        ])
        ->get();
@endphp


<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="../assets/images/favicon/6.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>On-demand last-mile delivery</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('frontend/b2b/css/all.min.css') }}">
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('frontend/b2b/css/vendors/bootstrap.css') }}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{ asset('frontend/b2b/css/animate.min.css') }}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/b2b/css/bulk-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/b2b/css/vendors/animate.css') }}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('frontend/b2b/css/style.css') }}">
</head>

<body class="theme-color-4 bg-gradient-color">

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="pb-0 fixed-header">
        <div class="top-nav top-header">
            <div class="container-fluid-xs">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon navbar-toggler-icon-2">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>

                            <div class="middle-box">
                                <div class="location-box">
                                    <button class="btn location-button" data-bs-toggle="modal"
                                        data-bs-target="#locationModal">
                                        <span class="location-arrow">
                                            <i data-feather="map-pin"></i>
                                        </span>
                                        <span class="locat-name">Your Location</span>
                                        <i class="fa-solid fa-angle-down"></i>
                                    </button>
                                </div>
                                <form action="{{ route('products.index') }}" id="searchform" method="GET">
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="I'm searching for..."name="search"
                                        value="{{ request()->search }}">
                                        <button class="btn bg-theme" type="submit">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="rightside-box">
                                
                                <div class="search-full">


                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        
                                            <input type="text" class="form-control search-type"
                                                placeholder="Search here..">
                                                <span class="input-group-text close-search">
                                                    <i data-feather="x" class="font-light"></i>
                                                </span>
                                        </form>
                                    </div>

                                </div>
                                <ul class="right-side-menu">
                                    {{-- <li class="right-side">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <div class="search-box">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li> --}}
                                    <li class="right-side">
                                        <a href="contact-us.html" class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="phone-call"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>24/7 Delivery</h6>
                                                <h5>+91 888 104 2340</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                        <a href="{{ route('user.wishlist.index') }}"
                                            class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                        <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <i data-feather="shopping-cart"></i>
                                                <span class="position-absolute top-0 start-100 translate-middle badge"
                                                    id="cart-count">{{ Cart::content()->count() }}
                                                </span>
                                            </button>

                                            <div class="onhover-div">
                                                <ul class="cart-list mini_cart_wrapper">
                                                    @if (Cart::content()->count() > 0)
                                                        @foreach (Cart::content() as $sidebarProduct)
                                                            <li class="product-box-contain"
                                                                id="mini_cart_{{ $sidebarProduct->rowId }}">
                                                                <div class="drop-cart">
                                                                    <a href="{{ route('product-detail', $sidebarProduct->options->slug) }}"
                                                                        class="drop-image">
                                                                        <img src="{{ asset($sidebarProduct->options->image) }}"
                                                                            class="blur-up lazyload" alt="">
                                                                    </a>

                                                                    <div class="drop-contain">
                                                                        <a
                                                                            href="{{ route('product-detail', $sidebarProduct->options->slug) }}">
                                                                            <h5>{{ $sidebarProduct->name }}</h5>
                                                                        </a>
                                                                        <h6><span>{{ $sidebarProduct->qty }} x</span>
                                                                            {{ $settings->currency_icon }}{{ $sidebarProduct->price }}
                                                                        </h6>
                                                                        <button
                                                                            class="close-button close_button remove_sidebar_product"
                                                                            data-id="{{ $sidebarProduct->rowId }}">
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="product-box-contain">
                                                            <div class="drop-cart">
                                                                <h4>Cart Is Empty!</h4>
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>

                                                <div class="price-box">
                                                    <h5>Total :</h5>
                                                    <h4 class="theme-color fw-bold" id="mini_cart_subtotal">
                                                        {{ $settings->currency_icon }}{{ getCartTotal() }}</h4>
                                                </div>

                                                <div class="button-group">
                                                    <a href="{{ route('cart-details') }}"
                                                        class="btn btn-sm cart-button">View Cart</a>
                                                    <a href="checkout.html"
                                                        class="btn btn-sm cart-button theme-bg-color
                                                    text-white">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>Hello,</h6>
                                                <h5>My Account</h5>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">

                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                                            href="login.html"> Log out</a>
                                                    </form>
                                                </li>

                                                <li class="product-box-contain">
                                                    <a href="{{route('user.dashboard')}}">Dashboard</a>
                                                </li>

                                                {{--<li class="product-box-contain">
                                                    <a href="forgot.html">Forgot Password</a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="iconly-Home icli"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="iconly-Heart icli"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->

    <!-- Product Section Start -->
    <section class="product-section pt-0">
        <div class="container-fluid p-0">
            <div class="custom-row">
                <div class="sidebar-col">
                    <div class="category-menu">
                        <a href="{{ url('/') }}" class="web-logo nav-logo"
                            style="background: #6262a6;padding: 20px;border-radius: 5px;">
                            <img src="{{ asset($logoSetting->logo) }}" class="img-fluid blur-up lazyload"
                                alt="">
                        </a>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <div class="category-list">
                                        {{-- <img src="{{ asset('frontend/svg/icon.svg')}}" class="blur-up lazyload" alt=""> --}}
                                        <i class="{{ $category->icon }} blur-up lazyload ms-1"
                                            style="font-size: 18px"></i>
                                        <h5>
                                            <a
                                                href="{{ route('products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                        </h5>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="content-col">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    @php
    $footerInfo = Cache::rememberForever('footer_info', function(){
            return \App\Models\FooterInfo::first();
    });
    @endphp
    <!-- Footer Section Start -->
    <footer class="footer-sm">
        <div class="container-fluid-xs">
            <div class="sub-footer">
                <div class="reserve">
                    <h6 class="text-content">{{$footerInfo->copyright}}</h6>
                </div>

                <div class="payment">
                    <img src="../assets/images/payment/1.png" class="blur-up lazyload" alt="">
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Quick View Modal Box Start -->
    <div class="modal fade theme-modal view-modal" id="view" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content product-modal-content-b2b">

            </div>
        </div>
    </div>
    <!-- Quick View Modal Box End -->

    <!-- Location Modal Start -->
    <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location Modal End -->

    <!-- Cookie Bar Box Start -->
    <div class="cookie-bar-box">
        <div class="cookie-box">
            <div class="cookie-image">
                <img src="../assets/images/cookie-bar.png" class="blur-up lazyload" alt="">
                <h2>Cookies!</h2>
            </div>

            <div class="cookie-contain">
                <h5 class="text-content">We use cookies to make your experience better</h5>
            </div>
        </div>

        <div class="button-group">
            <button class="btn privacy-button">Privacy Policy</button>
            <button class="btn ok-button">OK</button>
        </div>
    </div>
    <!-- Cookie Bar Box End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Tap to top and theme setting button start -->
    <div class="theme-option">
        {{-- <div class="setting-box">
            <button class="btn setting-button">
                <i class="fa-solid fa-gear"></i>
            </button>

            <div class="theme-setting-2">
                <div class="theme-box">
                    <ul>
                        <li>
                            <div class="setting-name">
                                <h4>Color</h4>
                            </div>
                            <div class="theme-setting-button color-picker">
                                <form class="form-control">
                                    <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                    <input type="color" class="form-control form-control-color" id="colorPick"
                                        value="#6262a6" title="Choose your color">
                                </form>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>Dark</h4>
                            </div>
                            <div class="theme-setting-button">
                                <button class="btn btn-2 outline" id="darkButton">Dark</button>
                                <button class="btn btn-2 unline" id="lightButton">Light</button>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>RTL</h4>
                            </div>
                            <div class="theme-setting-button rtl">
                                <button class="btn btn-2 rtl-unline">LTR</button>
                                <button class="btn btn-2 rtl-outline">RTL</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top and theme setting button end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{ asset('frontend/b2b/js/jquery-3.6.0.min.js') }}"></script>

    <!-- jquery ui-->
    <script src="{{ asset('frontend/b2b/js/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('frontend/b2b/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/b2b/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('frontend/b2b/js/bootstrap/popper.min.js') }}"></script>

    <!-- feather icon js-->
    <script src="{{ asset('frontend/b2b/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('frontend/b2b/js/feather/feather-icon.js') }}"></script>

    <!-- Lazyload Js -->
    <script src="{{ asset('frontend/b2b/js/lazysizes.min.js') }}"></script>

    <!-- Slick js-->
    <script src="{{ asset('frontend/b2b/js/slick/slick.js') }}"></script>
    <script src="{{ asset('frontend/b2b/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('frontend/b2b/js/slick/custom_slick.js') }}"></script>

    <!-- Auto Height Js -->
    <script src="{{ asset('frontend/b2b/js/auto-height.js') }}"></script>

    <!-- Fly Cart Js -->
    <script src="{{ asset('frontend/b2b/js/fly-cart.js') }}"></script>

    <!-- Quantity js -->
    <script src="{{ asset('frontend/b2b/js/quantity-2.js') }}"></script>

    <!-- WOW js -->
    <script src="{{ asset('frontend/b2b/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/b2b/js/custom-wow.js') }}"></script>

    <!--Toaster js-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- script js -->
    <script src="{{ asset('frontend/b2b/js/script.js') }}"></script>

    <!-- theme setting js -->
    <script src="{{ asset('frontend/b2b/js/theme-setting.js') }}"></script>

    @include('frontend.b2b.layouts.scripts')
    
    <script>
        document.getElementById('searchButton').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('searchform').submit();
        });
    </script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <script>
        $('.show_product_modal_b2b').on('click', function() {
            let id = $(this).data('id');
            debugger
            $.ajax({
                mehtod: 'GET',
                url: '{{ route('show-product-modal-b2b', ':id') }}'.replace(":id", id),
                beforeSend: function() {
                    $('.product-modal-content-b2b').html('<span class="loader"></span>')
                },
                success: function(response) {
                    $('.product-modal-content-b2b').html(response)
                },
                error: function(xhr, status, error) {

                },
                complete: function() {

                }
            })
        })
    </script>



    @stack('scripts')
</body>

</html>
