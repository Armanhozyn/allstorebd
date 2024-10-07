
<!-- Related Product Section Start -->
<section class="product-list-section section-b-space">
    <div class="xcontainer-fluid-lg">
        <div class="title">
            <h2>Related Products</h2>
            <span class="title-leaf">
                <svg class="icon-width">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-6_1 product-wrapper">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($related_products as $product)
                    @php
                        $i++
                    @endphp 
                        <div>
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{route('product-detail', $product->slug)}}">
                                            <img src="{{asset($product->thumb_image)}}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view" data-id="{{ $product->id }}">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="#" class="notifi-wishlist add_to_wishlist" data-id="{{$product->id}}">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name">{{ $product->category->name}}</span>
                                        <a href="{{route('product-detail', $product->slug)}}">
                                            <h5 class="name">{{ limitText($product->name, 53) }}</h5>
                                        </a>
                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                @php
                                                $avgRating = $product->reviews()->avg('rating');
                                                $fullRating = round($avgRating);
                                                @endphp

                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $fullRating)
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                    @endif
                                                @endfor
                                            </ul>
                                            {{-- <span>(5.0)</span> --}}
                                        </div>
                                        {{-- <h6 class="unit">500 G</h6> --}}
                                        
                                        </h5>
                                        @if (checkDiscount($product))

                                            <h5 class="price"><span class="theme-color">{{ $settings->currency_icon }}{{ $product->offer_price }}</span> <del>{{ $settings->currency_icon }}{{ $product->price }}</del>
                                        @else
                                            <h5 class="price">{{ $settings->currency_icon }}{{ $product->price }}</h5>
                                        @endif
                                        <div class="add-to-cart-box bg-white">
                                            <form class="shopping-cart-form">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                                                <button type="submit"  class="btn btn-add-cart addcart-button add_cart">Add
                                                    <span class="add-icon bg-light-gray">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </span>
                                                </button>
                                            </form>
                                            {{-- <div class="cart_qty qty-box">
                                                <div class="input-group bg-white">
                                                    <button type="button" class="qty-left-minus bg-gray"
                                                        data-type="minus" data-field="">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="0">
                                                    <button type="button" class="qty-right-plus bg-gray"
                                                        data-type="plus" data-field="">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related Product Section End -->