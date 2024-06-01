@extends('frontend.b2c.layouts.master')
@section('title')
{{$settings->site_name}} || e-Commerce HTML Template
@endsection

@section('content')

    <!--============================
        BANNER PART 2 START
    ==============================-->
    @include('frontend.b2c.home.sections.banner-slider')
    <!--============================
        BANNER PART 2 END
    ==============================-->


    <!--============================
        FLASH SELL START
    ==============================-->
    @include('frontend.b2c.home.sections.flash-sale')
    <!--============================
        FLASH SELL END
    ==============================-->


    <!--============================
       MONTHLY TOP PRODUCT START
    ==============================-->
    @include('frontend.b2c.home.sections.top-category-product')
    <!--============================
       MONTHLY TOP PRODUCT END
    ==============================-->


    <!--============================
        BRAND SLIDER START
    ==============================-->
    @include('frontend.b2c.home.sections.brand-slider')
    <!--============================
        BRAND SLIDER END
    ==============================-->


    <!--============================
        SINGLE BANNER START
    ==============================-->
    @include('frontend.b2c.home.sections.single-banner')
    <!--============================
        SINGLE BANNER END
    ==============================-->


    <!--============================
        HOT DEALS START
    ==============================-->
    @include('frontend.b2c.home.sections.hot-deals')
    <!--============================
        HOT DEALS END
    ==============================-->


    <!--============================
        ELECTRONIC PART START
    ==============================-->
    @include('frontend.b2c.home.sections.category-product-slider-one')
    <!--============================
        ELECTRONIC PART END
    ==============================-->


    <!--============================
        ELECTRONIC PART START
    ==============================-->
    @include('frontend.b2c.home.sections.category-product-slider-two')

    <!--============================
        ELECTRONIC PART END
    ==============================-->


    <!--============================
        LARGE BANNER  START
    ==============================-->
    @include('frontend.b2c.home.sections.large-banner')

    <!--============================
        LARGE BANNER  END
    ==============================-->


    <!--============================
        WEEKLY BEST ITEM START
    ==============================-->
    @include('frontend.b2c.home.sections.weekly-best-item')
    <!--============================
        WEEKLY BEST ITEM END
    ==============================-->


    <!--============================
      HOME SERVICES START
    ==============================-->
    @include('frontend.b2c.home.sections.services')
    <!--============================
        HOME SERVICES END
    ==============================-->


    <!--============================
        HOME BLOGS START
    ==============================-->
    @include('frontend.b2c.home.sections.blog')
    <!--============================
        HOME BLOGS END
    ==============================-->

@endsection
