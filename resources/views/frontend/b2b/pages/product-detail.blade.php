@extends('frontend.b2b.layouts.master_b2b')

@section('content')

   <!-- Breadcrumb Section Start -->
   <section class="breadcrumb-section pt-0">
    <div class="xcontainer-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-contain">
                    <h2>{{ limitText($product->name, 53) }}</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active">{{ limitText($product->name, 53) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Left Sidebar Start -->
<section class="product-section">
    <div class="xcontainer-fluid-lg">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row g-2">
                                <div class="col-xxl-10 col-lg-12 col-md-10">
                                    <div class="product-main-2 no-arrow">
                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset($product->thumb_image)}}" id="img-1"
                                                    data-zoom-image="{{asset($product->thumb_image)}}"
                                                    class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                        @foreach ($product->productImageGalleries as $productImage)
                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{asset($productImage->image)}}"
                                                        data-zoom-image="{{asset($productImage->image)}}"
                                                        class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-xxl-2 col-lg-12 col-md-2">
                                    <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                        <div>
                                            <div class="slider-image">
                                                <img src="{{asset($product->thumb_image)}}" id="img-1"
                                                    data-zoom-image="{{asset($product->thumb_image)}}"
                                                    class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                        @foreach ($product->productImageGalleries as $productImage)
                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{asset($productImage->image)}}"
                                                        data-zoom-image="{{asset($productImage->image)}}"
                                                        class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            
                            @if ($product->qty > 0)
                            <h6 class="offer-top ">in stock</h6> ({{$product->qty}} item)
                            @elseif ($product->qty === 0)
                            <h6 class="offer-top ">stock out</h6>  ({{$product->qty}} item)
                            @endif
                            <h2 class="name">{{$product->name}}</h2>
                            <div class="price-rating">
                                @if (checkDiscount($product))
                                    <h3 class="theme-color price">{{$settings->currency_icon}}{{$product->offer_price}}  <del class="text-content">{{$settings->currency_icon}}{{$product->price}}</del></h3>
                                @else
                                    <h3 class="theme-color price">{{$settings->currency_icon}}{{$product->price}}</h3>
                                @endif
                             
                                <div class="product-rating custom-rate">
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
                                    <span class="review">{{count($product->reviews)}} Customer Review</span>
                                </div>
                            </div>

                            <div class="product-contain">
                                {!! $product->short_description !!}
                            </div>
                            <form class="shopping-cart-form">
                                @foreach ($product->variants as $variant)
                                    @if ($variant->status != 0)
                                        <div class="product-package">
                                            <div class="product-title">
                                                <h4>{{$variant->name}}</h4>
                                            </div>
                                            <div class="form-group mb-0">
                                                <select id="input-state" class="form-control form-select">
                                                    <option selected="" disabled="">Choose {{$variant->name}}...</option>
                                                    @foreach ($variant->productVariantItems as $variantItem)
                                                        @if ($variantItem->status != 0)
                                                            <option value="{{$variantItem->id}}" {{$variantItem->is_default == 1 ? 'selected' : ''}}>{{$variantItem->name}} (${{$variantItem->price}})</option>
                                                        @endif
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                          

                                <div class="note-box product-package">
                                    
                                    <div class="cart_qty qty-box product-qty m-0">
                                        <div class="input-group h-100">
                                            <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" name="qty" type="text" min="1" max="100" value="1">
                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">

                                    <button type="submit" href="#"
                                        class="btn btn-md bg-dark cart-button text-white w-100 add_cart" >Add To Cart</button>
                                    
                                </div>
                            </form>
                            <div class="buy-box">
                                <a href="javascript:;" class="add_to_wishlist" data-id="{{$product->id}}">
                                    <i data-feather="heart"></i>
                                    <span>Add To Wishlist</span>
                                </a>
                            </div>

                            <div class="pickup-box">
                                <div class="product-title">
                                    <h4>Store Information</h4>
                                </div>

                                <div class="pickup-detail">
                                    <h4 class="text-content">{!! $product->vendor->description !!}</h4>
                                </div>
                                {{-- 
                                <div class="product-info">
                                    <ul class="product-info-list product-info-list-2">
                                        <li>Type : <a href="javascript:void(0)">Black Forest</a></li>
                                        <li>SKU : <a href="javascript:void(0)">SDFVW65467</a></li>
                                        <li>MFG : <a href="javascript:void(0)">Jun 4, 2022</a></li>
                                        <li>Stock : <a href="javascript:void(0)">2 Items Left</a></li>
                                        <li>Tags : <a href="javascript:void(0)">Cake,</a> <a
                                                href="javascript:void(0)">Backery</a></li>
                                    </ul>
                                </div> --}}
                            </div>

                            {{-- <div class="payment-option">
                                <div class="product-title">
                                    <h4>Guaranteed Safe Checkout</h4>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab">Description</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                        data-bs-target="#info" type="button" role="tab">Vendor info</button>
                                </li>

                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                        data-bs-target="#care" type="button" role="tab">Care
                                        Instructions</button>
                                </li> --}}

                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                        data-bs-target="#review" type="button" role="tab">Review</button>
                                </li> --}}
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="product-description">
                                        {{-- <div class="nav-desh">
                                            <p>Jelly beans carrot cake icing biscuit oat cake gummi bears tart.
                                                Lemon drops carrot cake pudding sweet gummi bears. Chocolate cake
                                                tart cupcake donut topping liquorice sugar plum chocolate bar. Jelly
                                                beans tiramisu caramels jujubes biscuit liquorice chocolate. Pudding
                                                toffee jujubes oat cake sweet roll. Lemon drops dessert croissant
                                                danish cake cupcake. Sweet roll candy chocolate toffee jelly sweet
                                                roll halvah brownie topping. Marshmallow powder candy sesame snaps
                                                jelly beans candy canes marshmallow gingerbread pie.</p>
                                        </div>

                                        <div class="nav-desh">
                                            <div class="desh-title">
                                                <h5>Organic:</h5>
                                            </div>
                                            <p>vitae et leo duis ut diam quam nulla porttitor massa id neque aliquam
                                                vestibulum morbi blandit cursus risus at ultrices mi tempus
                                                imperdiet nulla malesuada pellentesque elit eget gravida cum sociis
                                                natoque penatibus et magnis dis parturient montes nascetur ridiculus
                                                mus mauris vitae ultricies leo integer malesuada nunc vel risus
                                                commodo viverra maecenas accumsan lacus vel facilisis volutpat est
                                                velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit
                                                amet nisl suscipit adipiscing bibendum est ultricies integer quis
                                                auctor elit sed vulputate mi sit amet mauris commodo quis imperdiet
                                                massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada
                                                proin libero nunc consequat interdum varius sit amet mattis
                                                vulputate enim nulla aliquet porttitor lacus luctus accumsan.</p>
                                        </div>

                                        <div class="banner-contain nav-desh">
                                            <img src="../assets/images/vegetable/banner/14.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                            <div class="banner-details p-center banner-b-space w-100 text-center">
                                                <div>
                                                    <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
                                                    <h2>VEGETABLE</h2>
                                                    <p class="mx-auto mt-1">Save up to 5% OFF</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nav-desh">
                                            <div class="desh-title">
                                                <h5>From The Manufacturer:</h5>
                                            </div>
                                            <p>Jelly beans shortbread chupa chups carrot cake jelly-o halvah apple
                                                pie pudding gingerbread. Apple pie halvah cake tiramisu shortbread
                                                cotton candy croissant chocolate cake. Tart cupcake caramels gummi
                                                bears macaroon gingerbread fruitcake marzipan wafer. Marzipan
                                                dessert cupcake ice cream tootsie roll. Brownie chocolate cake
                                                pudding cake powder candy ice cream ice cream cake. Jujubes soufflé
                                                chupa chups cake candy halvah donut. Tart tart icing lemon drops
                                                fruitcake apple pie.</p>

                                            <p>Dessert liquorice tart soufflé chocolate bar apple pie pastry danish
                                                soufflé. Gummi bears halvah gingerbread jelly icing. Chocolate cake
                                                chocolate bar pudding chupa chups bear claw pie dragée donut halvah.
                                                Gummi bears cookie ice cream jelly-o jujubes sweet croissant.
                                                Marzipan cotton candy gummi bears lemon drops lollipop lollipop
                                                chocolate. Ice cream cookie dragée cake sweet roll sweet roll.Lemon
                                                drops cookie muffin carrot cake chocolate marzipan gingerbread
                                                topping chocolate bar. Soufflé tiramisu pastry sweet dessert.</p>
                                        </div> --}}

                                        <div class="nav-desh">
                                            {!! $product->short_description !!}
                                        </div>
                                        <div class="nav-desh">
                                            {!! $product->short_description !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="info" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table info-table">
                                            <tbody>
                                                <tr>
                                                    <td>Store Name</td>
                                                    <td>{{$product->vendor->shop_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{$product->vendor->address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{$product->vendor->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Mail</td>
                                                    <td>{{$product->vendor->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>{!! $product->vendor->description !!}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- 
                                <div class="tab-pane fade" id="care" role="tabpanel">
                                    <div class="information-box">
                                        <ul>
                                            <li>Store cream cakes in a refrigerator. Fondant cakes should be
                                                stored in an air conditioned environment.</li>

                                            <li>Slice and serve the cake at room temperature and make sure
                                                it is not exposed to heat.</li>

                                            <li>Use a serrated knife to cut a fondant cake.</li>

                                            <li>Sculptural elements and figurines may contain wire supports
                                                or toothpicks or wooden skewers for support.</li>

                                            <li>Please check the placement of these items before serving to
                                                small children.</li>

                                            <li>The cake should be consumed within 24 hours.</li>

                                            <li>Enjoy your cake!</li>
                                        </ul>
                                    </div>
                                </div> --}}

                                {{-- <div class="tab-pane fade" id="review" role="tabpanel">
                                    <div class="review-box">
                                        <div class="row">
                                            <div class="col-xl-5">
                                                <div class="product-rating-box">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="product-main-rating">
                                                                <h2>3.40
                                                                    <i data-feather="star"></i>
                                                                </h2>

                                                                <h5>5 Overall Rating</h5>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <ul class="product-rating-list">
                                                                <li>
                                                                    <div class="rating-product">
                                                                        <h5>5<i data-feather="star"></i></h5>
                                                                        <div class="progress">
                                                                            <div class="progress-bar"
                                                                                style="width: 40%;">
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="total">2</h5>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="rating-product">
                                                                        <h5>4<i data-feather="star"></i></h5>
                                                                        <div class="progress">
                                                                            <div class="progress-bar"
                                                                                style="width: 20%;">
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="total">1</h5>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="rating-product">
                                                                        <h5>3<i data-feather="star"></i></h5>
                                                                        <div class="progress">
                                                                            <div class="progress-bar"
                                                                                style="width: 0%;">
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="total">0</h5>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="rating-product">
                                                                        <h5>2<i data-feather="star"></i></h5>
                                                                        <div class="progress">
                                                                            <div class="progress-bar"
                                                                                style="width: 20%;">
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="total">1</h5>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="rating-product">
                                                                        <h5>1<i data-feather="star"></i></h5>
                                                                        <div class="progress">
                                                                            <div class="progress-bar"
                                                                                style="width: 20%;">
                                                                            </div>
                                                                        </div>
                                                                        <h5 class="total">1</h5>
                                                                    </div>
                                                                </li>

                                                            </ul>

                                                            <div class="review-title-2">
                                                                <h4 class="fw-bold">Review this product</h4>
                                                                <p>Let other customers know what you think</p>
                                                                <button class="btn" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#writereview">Write a
                                                                    review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-7">
                                                <div class="review-people">
                                                    <ul class="review-list">
                                                        <li>
                                                            <div class="people-box">
                                                                <div>
                                                                    <div class="people-image people-text">
                                                                        <img alt="user" class="img-fluid "
                                                                            src="../assets/images/review/1.jpg">
                                                                    </div>
                                                                </div>
                                                                <div class="people-comment">
                                                                    <div class="people-name"><a
                                                                            href="javascript:void(0)"
                                                                            class="name">Jack Doe</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content"> 29 Sep 2023
                                                                                06:40:PM
                                                                            </h6>
                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <p>Avoid this product. The quality is
                                                                            terrible, and
                                                                            it started falling apart almost
                                                                            immediately. I
                                                                            wish I had read more reviews before
                                                                            buying.
                                                                            Lesson learned.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="people-box">
                                                                <div>
                                                                    <div class="people-image people-text">
                                                                        <img alt="user" class="img-fluid "
                                                                            src="../assets/images/review/2.jpg">
                                                                    </div>
                                                                </div>
                                                                <div class="people-comment">
                                                                    <div class="people-name"><a
                                                                            href="javascript:void(0)"
                                                                            class="name">Jessica
                                                                            Miller</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content"> 29 Sep 2023
                                                                                06:34:PM
                                                                            </h6>
                                                                            <div class="product-rating">
                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i data-feather="star"
                                                                                                class="fill"></i>
                                                                                        </li>
                                                                                        <li>
                                                                                            <i
                                                                                                data-feather="star"></i>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <p>Honestly, I regret buying this item. The
                                                                            quality
                                                                            is subpar, and it feels like a waste of
                                                                            money. I
                                                                            wouldn't recommend it to anyone.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="people-box">
                                                                <div>
                                                                    <div class="people-image people-text">
                                                                        <img alt="user" class="img-fluid "
                                                                            src="../assets/images/review/3.jpg">
                                                                    </div>
                                                                </div>
                                                                <div class="people-comment">
                                                                    <div class="people-name"><a
                                                                            href="javascript:void(0)"
                                                                            class="name">Rome Doe</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content"> 29 Sep 2023
                                                                                06:18:PM
                                                                            </h6>
                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <p>I am extremely satisfied with this
                                                                            purchase. The
                                                                            item arrived promptly, and the quality
                                                                            is
                                                                            exceptional. It's evident that the
                                                                            makers paid
                                                                            attention to detail. Overall, a
                                                                            fantastic buy!
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="people-box">
                                                                <div>
                                                                    <div class="people-image people-text">
                                                                        <img alt="user" class="img-fluid "
                                                                            src="../assets/images/review/4.jpg">
                                                                    </div>
                                                                </div>
                                                                <div class="people-comment">
                                                                    <div class="people-name"><a
                                                                            href="javascript:void(0)"
                                                                            class="name">Sarah
                                                                            Davis</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content"> 29 Sep 2023
                                                                                05:58:PM
                                                                            </h6>
                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <p>I am genuinely delighted with this item.
                                                                            It's a
                                                                            total winner! The quality is superb, and
                                                                            it has
                                                                            added so much convenience to my daily
                                                                            routine.
                                                                            Highly satisfied customer!</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="people-box">
                                                                <div>
                                                                    <div class="people-image people-text">
                                                                        <img alt="user" class="img-fluid "
                                                                            src="../assets/images/review/5.jpg">
                                                                    </div>
                                                                </div>
                                                                <div class="people-comment">
                                                                    <div class="people-name"><a
                                                                            href="javascript:void(0)"
                                                                            class="name">John Doe</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content"> 29 Sep 2023
                                                                                05:22:PM
                                                                            </h6>
                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="reply">
                                                                        <p>Very impressed with this purchase. The
                                                                            item is of
                                                                            excellent quality, and it has exceeded
                                                                            my
                                                                            expectations.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                <div class="right-sidebar-box">
                    <div class="vendor-box">
                        <div class="vendor-contain">
                            <div class="vendor-image">
                                <img src="{{asset($product->vendor->banner)}}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="vendor-name">
                                <h5 class="fw-500">{{$product->vendor->shop_name}}</h5>

                                <div class="product-rating mt-1">
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
                                    {{-- <span>(36 Reviews)</span> --}}
                                </div>

                            </div>
                        </div>

                        <p class="vendor-detail">{!! $product->vendor->description !!}</p>

                        <div class="vendor-list">
                            <ul>
                                <li>
                                    <div class="address-contact">
                                        <i data-feather="map-pin"></i>
                                        <h5>Address: <span class="text-content">{{$product->vendor->address}}</span></h5>
                                    </div>
                                </li>

                                <li>
                                    <div class="address-contact">
                                        <i data-feather="headphones"></i>
                                        <h5>Contact Seller: <span class="text-content">{{$product->vendor->phone}}</span></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Trending Product -->
                    <div class="pt-25">
                        <div class="category-menu">
                            <h3>Trending Products</h3>

                            <ul class="product-list product-right-sidebar border-0 p-0">
                                @foreach ($trending_products as $trending_product)
                                    <li>
                                        <div class="offer-product">
                                            <a href="{{route('product-detail', $trending_product->slug)}}" class="offer-image">
                                                <img src="{{asset($trending_product->thumb_image)}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="{{route('product-detail', $trending_product->slug)}}">
                                                        <h6 class="name">{{limitText($trending_product->name, 53) }}}}</h6>
                                                    </a>
                                                    <span>{{ $trending_product->category->name}}</span>
                                                    @if (checkDiscount($product))
                                                    <h6 class="price theme-color">{{ $settings->currency_icon }}{{ $product->offer_price }}
                                                        <del>{{ $settings->currency_icon }}{{ $product->price }}</del></h6>
                                                    @else
                                                        <h6 class="price theme-color">{{ $settings->currency_icon }}{{ $product->price }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>    
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>

                    <!-- Banner Section -->
                    {{-- <div class="ratio_156 pt-25">
                        <div class="home-contain">
                            <img src="../assets/images/vegetable/banner/8.jpg" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h6 class="text-yellow home-banner">Seafood</h6>
                                    <h3 class="text-uppercase fw-normal"><span
                                            class="theme-color fw-bold">Freshes</span> Products</h3>
                                    <h3 class="fw-light">every hour</h3>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Left Sidebar End -->

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
                        @foreach ($related_products as $related_product)
                        <div>
                            <div class="product-box-3 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{route('product-detail', $related_product->slug)}}">
                                            <img src="{{asset($related_product->thumb_image)}}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view" data-id="{{ $related_product->id }}">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="#" class="notifi-wishlist add_to_wishlist" data-id="{{$related_product->id}}">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name">{{ $related_product->category->name}}</span>
                                        <a href="{{route('product-detail', $related_product->slug)}}">
                                            <h5 class="name">{{ limitText($related_product->name, 53) }}</h5>
                                        </a>
                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                @php
                                                $avgRating = $related_product->reviews()->avg('rating');
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
                                            <span>({{$fullRating}})</span>
                                        </div>
                                        <h6 class="unit">{{$related_product->brand->name}}</h6>
                                        
                                        @if (checkDiscount($related_product))

                                        <h5 class="price"><span class="theme-color">{{ $settings->currency_icon }}{{ $related_product->offer_price }}</span> <del>{{ $settings->currency_icon }}{{ $related_product->price }}</del>
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
                                                </div>
                                            </div> --}}
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


@endsection