@extends('frontend.b2b.layouts.master_b2b')

@section('content')
    {{-- <div class="section-b-space">
        <div class="row g-md-4 g-3">
            <div class="col-xxl-8 col-xl-12 col-md-7">
                <div class="banner-contain hover-effect">
                    <img src="{{ asset('frontend/images/grocery/banner/11.jpg') }}" class="bg-img blur-up lazyload"
                        alt="">
                    <div class="banner-details p-center-left p-sm-5 p-4">
                        <div>
                            <h2 class="text-kaushan fw-normal orange-color">Get Ready To</h2>
                            <h3 class="mt-2 mb-3 text-white">TAKE ON THE DAY!</h3>
                            <p class="text-content banner-text text-white opacity-75 d-md-block d-none">
                                In publishing and graphic design, Lorem ipsum is a placeholder text
                                commonly used to demonstrate.</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                    class="fa-solid fa-arrow-right icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-12 col-md-5">
                <div class="banner-contain hover-effect h-100">
                    <img src="{{ asset('frontend/images/grocery/banner/12.jpg') }}" class="bg-img blur-up lazyload"
                        alt="">
                    <div class="banner-details p-center-left p-4 h-100">
                        <div>
                            <h2 class="text-kaushan fw-normal orange-color">Organic</h2>
                            <h3 class="mt-2 mb-3">Fresh</h3>
                            <p class="text-content banner-text w-100">Super Offer to 50%
                                Off</p>
                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                class="btn btn-animation btn-sm mend-auto">Shop Now <i
                                    class="fa-solid fa-arrow-right icon"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="title d-block">
        <h2 class="text-theme font-sm">Featured Brand</h2>
        <p>Featured brands are here.</p>
    </div>

    <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">
        @foreach ($brands as $brand)
            <div>
                <div class="product-box product-white-bg wow fadeIn">
                    <div class="product-image">
                        <a href="{{ route('products.index', ['brand' => $brand->slug]) }}">
                            <img src="{{ asset($brand->logo) }}"
                                class="img-fluid blur-up lazyload"alt="{{ $brand->name }}" />
                        </a>
                    </div>
                    <div class="product-detail position-relative">
                        <a href="{{ route('products.index', ['brand' => $brand->slug]) }}">
                            <h6 class="name text-center">
                                {{ $brand->name }}
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="title d-block">
        <h2 class="text-theme font-sm">Popular Categories</h2>
        <p>Find product by popular categories</p>
    </div>

    <div class="row row-cols-xxl-6 row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 section-b-space">
        @php
            $popularCategories = json_decode($popularCategory->value, true);
            // dd($popularCategories);
        @endphp
        @php
            $products = [];
        @endphp
        @foreach ($popularCategories as $key => $popularCategory)
            @php
                $lastKey = [];

                foreach ($popularCategory as $key => $category) {
                    if ($category === null) {
                        break;
                    }
                    $lastKey = [$key => $category];
                }

                if (array_keys($lastKey)[0] === 'category') {
                    $category = \App\Models\Category::find($lastKey['category']);
                    $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                        ->with(['variants', 'category', 'productImageGalleries'])
                        ->where(['category_id' => $category->id, 'product_zone' => 'b2c'])
                        ->orderBy('id', 'DESC')
                        ->take(12)
                        ->get();
                } elseif (array_keys($lastKey)[0] === 'sub_category') {
                    $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                    $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                        ->with(['variants', 'category', 'productImageGalleries'])
                        ->where(['sub_category_id' => $category->id, 'product_zone' => 'b2c'])
                        ->orderBy('id', 'DESC')
                        ->take(12)
                        ->get();
                } else {
                    $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                    $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                        ->with(['variants', 'category', 'productImageGalleries'])
                        ->where(['child_category_id' => $category->id, 'product_zone' => 'b2c'])
                        ->orderBy('id', 'DESC')
                        ->take(12)
                        ->get();
                }

            @endphp
        @endforeach

        {{-- @php
            dd($products);
        @endphp --}}
         @foreach ($products as $productWrap)
                @foreach ($productWrap as $product )
                    
                
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
     @endforeach
    </div>
@endsection
