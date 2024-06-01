@extends('frontend.b2b.layouts.master_b2b')



@section('content')
<!-- Wishlist Section Start -->
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="xcontainer-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Wishlist</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
  <section class="wishlist-section section-b-space">
    <div class="xcontainer-fluid-lg">
        @if (count($wishlistProducts) > 0){
            <div class="row g-sm-3 g-2">
                @foreach ($wishlistProducts as $item)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                        <div class="product-box-3 h-100">
                            <div class="product-header">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{asset($item->product->thumb_image)}}" class="img-fluid blur-up lazyload"
                                            alt="">
                                    </a>
    
                                    <div class="product-header-top">
                                        <a href="{{route('user.wishlist.destory', $item->id)}}" class="btn wishlist-button close_button">
                                            <i data-feather="x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">{{ $item->product->category->name }}</span>
                                    <a href="product-left-thumbnail.html">
                                        <h5 class="name">{{ limitText($item->product->name, 53) }}</h5>
                                    </a>
                                    <h6 class="unit mt-1">{{$item->product->qty}}</h6>
                                  
                                    @if (checkDiscount($item->product))
                                        <h5 class="price">
                                            <span class="theme-color">{{ $settings->currency_icon }}{{ $item->product->offer_price }}</span>
                                            <del>{{ $settings->currency_icon }}{{ $item->product->price }}</del>
                                        </h5>
                                    @else
                                        <h6 class="price theme-color"></h6>
                                        <h5 class="price">
                                            <span class="theme-color">{{ $settings->currency_icon }}{{ $item->product->price }}
                                        </h5>
                                    @endif
    
                                    <div class="add-to-cart-box bg-white mt-2">
                                        <form class="shopping-cart-form">
                                            <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                            <button type="submit" class="btn btn-add-cart addcart-button add_cart">Add
                                                <span class="add-icon bg-light-gray">
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                            </button>
                                        </form>
                                        {{-- <div class="cart_qty qty-box">
                                            <div class="input-group bg-white">
                                                <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="0">
                                                <button type="button" class="qty-right-plus bg-gray" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
       @else
        <h2 class="text-theme font-lg text-center mb-5">Wishtlist Is Empty!!</h2>
        @endif

    </div>
</section>
<!-- Wishlist Section End -->

@endsection