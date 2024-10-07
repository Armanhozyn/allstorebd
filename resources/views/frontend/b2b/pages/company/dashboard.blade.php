@extends('frontend.b2b.layouts.master_company')

@section('content')
    <h2>Dasboard</h2>
    <div class="row">
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item red" href="{{ route('user.orders.index') }}">
                <i class="fas fa-cart-plus"></i>
                <p>Total Order</p>
                <h4 style="color:#ffff">{{ $totalOrder }}</h4>
            </a>
        </div>
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item green" href="dsahboard_download.html">
                <i class="fas fa-cart-plus"></i>
                <p>Pending Orders</p>
                <h4 style="color:#ffff">{{ $pendingOrder }}</h4>
            </a>
        </div>
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item sky" href="dsahboard_review.html">
                <i class="fas fa-cart-plus"></i>
                <p>Complete Orders</p>
                <h4 style="color:#ffff">{{ $completeOrder }}</h4>
            </a>
        </div>
        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item blue" href="{{ route('user.review.index') }}">
                <i class="fas fa-star"></i>
                <p>Reviews</p>
                <h4 style="color:#ffff">{{ $reviews }}</h4>
            </a>
        </div>

        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item purple" href="{{ route('user.wishlist.index') }}">
                <i class="fas fa-star"></i>
                <p>Wishlist</p>
                <h4 style="color:#ffff">{{ $wishlist }}</h4>
            </a>
        </div>

        <div class="col-xl-2 col-6 col-md-4">
            <a class="wsus__dashboard_item orange" href="{{ route('user.profile') }}">
                <i class="fas fa-user-shield"></i>
                <p>profile</p>
                <h4 style="color:#ffff">-</h4>
            </a>
        </div>
    </div>
@endsection
