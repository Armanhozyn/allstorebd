@extends('frontend.b2b.layouts.master_company')

@section('content')
    <div id="company_dashboard">
        <div class="container">
            <h2 class="dashboard-title">Dashboard</h2>
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <a class="dashboard-item red" href="{{ route('user.orders.index') }}">
                        <i class="fas fa-cart-plus"></i>
                        <p>Total Orders</p>
                        <h4>{{ $totalOrder }}</h4>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-item green" href="dsahboard_download.html">
                        <i class="fas fa-clock"></i>
                        <p>Pending Orders</p>
                        <h4>{{ $pendingOrder }}</h4>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-item sky" href="dsahboard_review.html">
                        <i class="fas fa-check"></i>
                        <p>Complete Orders</p>
                        <h4>{{ $completeOrder }}</h4>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-item blue" href="{{ route('user.review.index') }}">
                        <i class="fas fa-star"></i>
                        <p>Reviews</p>
                        <h4>{{ $reviews }}</h4>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-item purple" href="{{ route('user.wishlist.index') }}">
                        <i class="fas fa-heart"></i>
                        <p>Wishlist</p>
                        <h4>{{ $wishlist }}</h4>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="dashboard-item orange" href="{{ route('user.profile') }}">
                        <i class="fas fa-user-shield"></i>
                        <p>Profile</p>
                        <h4>-</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
