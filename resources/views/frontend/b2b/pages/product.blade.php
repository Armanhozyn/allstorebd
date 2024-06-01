@extends('frontend.b2b.layouts.master_b2b')

@section('content')
    {{-- <div class="title d-block">
        <h2 class="text-theme font-sm">Sub Categories</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div> --}}

    <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">
        @if ($subcategories)
            @foreach ($subcategories as $subcategory)
                <div>
                    <div class="product-box product-white-bg wow fadeIn">
                        {{-- <div class="product-image">
                        <a href="product-left-thumbnail.html">
                            <img src="{{asset($subcategory->logo)}}" class="img-fluid blur-up lazyload"
                            <img src="{{asset($brand->logo)}}" class="img-fluid blur-up lazyload"
                                alt="{{$brand->name}}">
                        </a>
                    </div> --}}
                        <div class="product-detail position-relative">
                            <a href="{{ route('products.index', ['subcategory' => $subcategory->slug]) }}">
                                <h6 class="name text-center d-flex justify-content-center align-items-center">
                                    {{ $subcategory->name }}
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @if ($child_categories)
            @foreach ($child_categories as $childCategory)
                <div>
                    <div class="product-box product-white-bg wow fadeIn">
                        {{-- <div class="product-image">
                    <a href="product-left-thumbnail.html">
                        <img src="{{asset($subcategory->logo)}}" class="img-fluid blur-up lazyload"
                        <img src="{{asset($brand->logo)}}" class="img-fluid blur-up lazyload"
                            alt="{{$brand->name}}">
                    </a>
                </div> --}}
                        <div class="product-detail position-relative">
                            <a href="{{ route('products.index', ['childcategory' => $childCategory->slug]) }}">
                                <h6 class="name text-center d-flex justify-content-center align-items-center">
                                    {{ $childCategory->name }}
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

    @if ($category)
        <div class="title d-block">
            <h2 class="text-theme font-sm">Product Related to {{ $category->name }}</h2>
            <p>A virtual assistant collects the products from your list</p>
        </div>
    @endif

    @if (count($products) > 0)
        <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">
            @foreach ($products as $product)
                <div>
                    <div class="product-box product-white-bg wow fadeIn">
                        <div class="product-image">
                            <a href="{{route('product-detail', $product->slug)}}">
                                <img src="{{ asset($product->thumb_image) }}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </a>
                            <ul class="product-option">
                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" class="show_product_modal_b2b" data-bs-target="#view" data-id="{{ $product->id }}">
                                        <i data-feather="eye"></i>
                                    </a>
                                </li>

                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                    <a href="#" class="add_to_wishlist" data-id="{{$product->id}}" class="notifi-wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="product-detail position-relative">
                            <a href="product-left-thumbnail.html">
                                <h6 class="name">
                                    {{ limitText($product->name, 53) }}
                                </h6>
                            </a>

                            <h6 class="sold weight text-content fw-normal">{{ $product->category->name }}</h6>
                            @if (checkDiscount($product))
                                <h6 class="price theme-color">{{ $settings->currency_icon }}{{ $product->offer_price }}
                                    <del>{{ $settings->currency_icon }}{{ $product->price }}</del></h6>
                            @else
                                <h6 class="price theme-color">{{ $settings->currency_icon }}{{ $product->price }}</h6>
                            @endif


                            <div class="add-to-cart-btn-2 addtocart_btn">
                                <form class="shopping-cart-form">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                    <button  type="submit" class="btn addcart-button btn buy-button add_cart" ><i class="fa-solid fa-plus"></i></button>
                                </form>
                                {{-- <div class="cart_qty qty-box-2 qty-box-3">
                                    <div class="input-group">
                                        <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input class="form-control input-number qty-input" type="text" name="quantity"
                                            value="0">
                                        <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                   
                </div>
            @endforeach
        </div>
    @else
        <h2 class="text-theme font-lg text-center mb-5">Product Not Available</h2>
    @endif
@endsection
