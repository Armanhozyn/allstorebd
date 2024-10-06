<div class="modal-header p-0">
    <button type="button" class="btn-close" data-bs-dismiss="modal">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
<div class="modal-body">
    <form class="shopping-cart-form">
    <div class="row g-sm-4 g-2">
        <div class="col-lg-6">
            <div class="slider-image">
                <img src="{{asset($product->thumb_image)}}" class="img-fluid blur-up lazyload"
                    alt="">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="right-sidebar-modal">
                <h4 class="title-name">{{limitText($product->name, 150)}}</h4>
                @if (checkDiscount($product))
                    <h4 class="price">{{$settings->currency_icon}}{{$product->offer_price}} <del>{{$settings->currency_icon}}{{$product->price}}</del></h4>
                @else
                    <h4 class="price">{{$settings->currency_icon}}{{$product->price}}</h4>
                @endif

                <div class="product-rating">
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
                    <span class="ms-2">{{count($product->reviews)}}  Reviews</span>
                    {{-- <span class="ms-2 text-danger">6 sold in last 16 hours</span> --}}
                </div>

                <div class="product-detail">
                    <h4>Product Details :</h4>
                    <p>{!! limitText($product->short_description, 200) !!}</p>
                </div>

                <ul class="brand-list">
                    <li>
                        <div class="brand-box">
                            <h5>Brand Name:</h5>
                            <h6>{{$product->brand->name}}</h6>
                        </div>
                    </li>

                </ul>

                {{-- <div class="select-size">
                    <h4>Cake Size :</h4>
                    <select class="form-select select-form-size">
                        <option selected>Select Size</option>
                        <option value="1.2">1/2 KG</option>
                        <option value="0">1 KG</option>
                        <option value="1.5">1/5 KG</option>
                        <option value="red">Red Roses</option>
                        <option value="pink">With Pink Roses</option>
                    </select>
                </div> --}}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="qty" value="1">
                <div class="modal-button">
                    <button type='submit'
                        class="btn btn-md add-cart-button icon">Add
                        To Cart</button>
                    <button onclick="location.href = '{{route('product-detail', $product->slug)}}';"
                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                        View More Details</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>