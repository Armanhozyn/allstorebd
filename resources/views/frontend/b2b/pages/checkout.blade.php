@extends('frontend.b2b.layouts.master_b2b')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="xcontainer-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="xcontainer-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                            trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box ms-0">
                                        <div class="checkout-title">
                                            <h4>Delivery Address</h4>
                                            <button class="btn deal-button"
                                                style="background-color: #6262a6 !important;color: #fff !important"
                                                data-bs-toggle="modal" data-bs-target="#deal-box">
                                                Add New Address
                                            </button>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                @foreach ($addresses as $address)
                                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                                        <div class="delivery-address-box">
                                                            <div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input shipping_address"
                                                                        type="radio" data-id="{{ $address->id }}"
                                                                        name="jack" id="flexRadioDefault1">
                                                                </div>

                                                                {{-- <div class="label">
                                                                <label>Home</label>
                                                            </div> --}}

                                                                <ul class="delivery-address-detail">
                                                                    <li>
                                                                        <h4 class="fw-500">{{ $address->name }}</h4>
                                                                    </li>

                                                                    <li>
                                                                        <p class="text-content fw-bold"><span
                                                                                class="text-title fw-bold">Address
                                                                                : </span>{{ $address->address }}</p>
                                                                    </li>

                                                                    <li>
                                                                        <h6 class="text-content "><span
                                                                                class="text-title fw-bold">Zip
                                                                                Code
                                                                                :</span> {{ $address->zip }}</h6>
                                                                    </li>

                                                                    <li>
                                                                        <h6 class="text-content mb-0"><span
                                                                                class="text-title fw-bold">Phone
                                                                                :</span> {{ $address->phone }}</h6>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                {{-- <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box ms-0">
                                        <div class="checkout-title">
                                            <h4>Delivery Option</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div class="form-check custom-form-check hide-check-box">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="standard" id="standard" checked>
                                                                    <label class="form-check-label" for="standard">Standard
                                                                        Delivery Option</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div
                                                                    class="form-check mb-0 custom-form-check show-box-checked">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="standard" id="future">
                                                                    <label class="form-check-label" for="future">Future
                                                                        Delivery Option</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 future-box">
                                                    <div class="future-option">
                                                        <div class="row g-md-0 gy-4">
                                                            <div class="col-md-6">
                                                                <div class="delivery-items">
                                                                    <div>
                                                                        <h5 class="items text-content"><span>3
                                                                                Items</span>@
                                                                            $693.48</h5>
                                                                        <h5 class="charge text-content">Delivery Charge
                                                                            $34.67
                                                                            <button type="button" class="btn p-0"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Extra Charge">
                                                                                <i
                                                                                    class="fa-solid fa-circle-exclamation"></i>
                                                                            </button>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <form class="form-floating theme-form-floating date-box">
                                                                    <input type="date" class="form-control">
                                                                    <label>Select Date</label>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Shipping Method</h3>
                            </div>
                            <ul class="summery-contain">
                                <div class="xaccordion xaccordion-flush xcustom-accordion" id="xaccordionFlushExample">
                                    @foreach ($shippingMethods as $method)
                                        @if ($method->type === 'min_cost' && getCartTotal() >= $method->min_cost)
                                            {{-- <div class="accordion-item collapse show">
                                                <div class="accordion-header" id="flush-headingFour">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour">
                                                        
                                                    </div>
                                                </div>
                                                <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <p class="cod-review">Pay digitally with SMS Pay
                                                            Link. Cash may not be accepted in COVID restricted
                                                            areas. <a href="javascript:void(0)">Know more.</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> --}}

                                            <div class="custom-form-check form-check mb-0 mt-2 bg-white p-3">
                                                    <label class="form-check-label ms-3" for="cash">
                                                        <input class="form-check-input mt-0 shipping_method"  type="radio" name="flexRadioDefault" id="cash" value="{{$method->id}}" data-id="{{$method->cost}}">
                                                        {{$method->name}}
                                                        <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span>
                                                    </label>
                                            </div>
                                        @elseif ($method->type === 'flat_cost')
                                            {{-- <div class="accordion-item collapse show">
                                                <div class="accordion-header" id="flush-headingFour">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour">
                                                        <div class="custom-form-check form-check mb-0">
                                                            <label class="form-check-label" for="cash"><input
                                                                    class="form-check-input mt-0" type="radio"
                                                                    name="flexRadioDefault" id="cash" checked>
                                                                    {{$method->name}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flush-collapseFour" class="accordion-collapse collapse show"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <p class="cod-review">Pay digitally with SMS Pay
                                                            Link. Cash may not be accepted in COVID restricted
                                                            areas. <a href="javascript:void(0)">Know more.</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="custom-form-check form-check mb-0 mt-2 bg-white p-3">
                                                <label class="form-check-label ms-3" for="cash">
                                                        <input class="form-check-input mt-0 shipping_method"  type="radio" name="flexRadioDefault" id="cash" value="{{$method->id}}" data-id="{{$method->cost}}">
                                                    {{$method->name}}
                                                    <span>cost: ({{$settings->currency_icon}}{{$method->cost}})</span>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </ul>
                            {{-- 
                            <ul class="summery-contain">
                                <li>
                                    <img src="../assets/images/vegetable/product/1.png"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Bell pepper <span>X 1</span></h4>
                                    <h4 class="price">$32.34</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/2.png"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Eggplant <span>X 3</span></h4>
                                    <h4 class="price">$12.23</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/3.png"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Onion <span>X 2</span></h4>
                                    <h4 class="price">$18.27</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/4.png"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Potato <span>X 1</span></h4>
                                    <h4 class="price">$26.90</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/5.png"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Baby Chili <span>X 1</span></h4>
                                    <h4 class="price">$19.28</h4>
                                </li>

                                <li>
                                    <img src="../assets/images/vegetable/product/6.png"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>Broccoli <span>X 2</span></h4>
                                    <h4 class="price">$29.69</h4>
                                </li>
                            </ul> --}}

                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">{{$settings->currency_icon}}{{getCartTotal()}}</h4>
                                </li>

                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price" id="shipping_fee">{{$settings->currency_icon}}0</h4>
                                </li>

                                <li>
                                    <h4>Coupon/Code</h4>
                                    <h4 class="price">{{$settings->currency_icon}}{{getCartDiscount()}}</h4>
                                </li>

                                <li class="list-total">
                                    <h4>Total ({{$settings->currency_icon}})</h4>
                                    <h4 class="price" id="total_amount" data-id="{{getMainCartTotal()}}">{{$settings->currency_icon}}{{getMainCartTotal()}}</h4>
                                </li>
                            </ul>
                        </div>

                        {{-- <div class="checkout-offer">
                            <div class="offer-title">
                                <div class="offer-icon">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/offer.svg"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="offer-name">
                                    <h6>Available Offers</h6>
                                </div>
                            </div>

                            <ul class="offer-detail">
                                <li>
                                    <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                </li>
                                <li>
                                    <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                </li>
                            </ul>
                        </div> --}}
                        <form action="" id="checkOutForm">
                            <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                            <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">

                        </form>
                        <div class="terms_area">
                            <div class="form-check">
                                <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                    checked>
                                <label class="form-check-label" for="flexCheckChecked3">
                                    I have read and agree to the website <a href="#">terms and conditions *</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" id="submitCheckoutForm" >Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Add New Address</h5>
                        {{-- <p class="mt-1 text-content">.</p> --}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-lg-5 g-3">
                        <div class="col-lg-12">
                            <div class="right-sidebar-box">
                                <form action="{{ route('user.checkout.address.create') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput" class="form-label">Name</label>
                                                <div class="custom-input">
                                                    <input type="text" class="form-control" placeholder="Name *"
                                                        name="name" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                                <div class="custom-input">
                                                    <input type="text" class="form-control" placeholder="Phone *"
                                                        name="phone" value="{{ old('phone') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput2" class="form-label">Email
                                                    Address</label>
                                                <div class="custom-input">
                                                    <input type="email" class="form-control" placeholder="Email *"
                                                        name="email" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput3" class="form-label">Phone
                                                    Number</label>
                                                <select class="form-control" name="country">
                                                    <option value="">Country / Region *</option>
                                                    @foreach (config('settings.country_list') as $key => $county)
                                                        <option {{ $county === old('country') ? 'selected' : '' }}
                                                            value="{{ $county }}">{{ $county }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput2" class="form-label">State</label>
                                                <div class="custom-input">
                                                    <input type="text" class="form-control" placeholder="State *"
                                                        name="state" value="{{ old('state') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput2" class="form-label">City</label>
                                                <div class="custom-input">
                                                    <input type="text" class="form-control"
                                                        placeholder="Town / City *" name="city"
                                                        value="{{ old('city') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput2" class="form-label">Zip</label>
                                                <div class="custom-input">
                                                    <input type="text" class="form-control" placeholder="Zip *"
                                                        name="zip" value="{{ old('zip') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlInput2" class="form-label">Address</label>
                                                <div class="custom-input">
                                                    <input type="text" class="form-control" placeholder="Address *"
                                                        name="address" value="{{ old('address') }}">
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-12">
                                            <div class="mb-md-4 mb-3 custom-form">
                                                <label for="exampleFormControlTextarea" class="form-label">Message</label>
                                                <div class="custom-textarea">
                                                    <textarea class="form-control" id="exampleFormControlTextarea"
                                                        placeholder="Enter Your Message" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <button type="submit" class="btn btn-animation btn-md fw-bold ms-auto">Send
                                        Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('input[type="radio"]').prop('checked', false);
            $('#shipping_method_id').val("");
            $('#shipping_address_id').val("");

            $('.shipping_method').on('click', function() {
                let shippingFee = $(this).data('id');
                let currentTotalAmount = $('#total_amount').data('id')
                let totalAmount = currentTotalAmount + shippingFee;

                $('#shipping_method_id').val($(this).val());
                $('#shipping_fee').text("{{ $settings->currency_icon }}" + shippingFee);

                $('#total_amount').text("{{ $settings->currency_icon }}" + totalAmount)
            })

            $('.shipping_address').on('click', function() {
                $('#shipping_address_id').val($(this).data('id'));
            })

            // submit checkout form
            $('#submitCheckoutForm').on('click', function(e) {
                debugger;
                e.preventDefault();
                if ($('#shipping_method_id').val() == "") {
                    toastr.error('Shipping method is requred');
                } else if ($('#shipping_address_id').val() == "") {
                    toastr.error('Shipping address is requred');
                } else if (!$('.agree_term').prop('checked')) {
                    toastr.error('You have to agree website terms and conditions');
                } else {
                    $.ajax({
                        url: "{{ route('user.checkout.form-submit') }}",
                        method: 'POST',
                        data: $('#checkOutForm').serialize(),
                        beforeSend: function() {
                            $('#submitCheckoutForm').html(
                                '<i class="fas fa-spinner fa-spin fa-1x"></i>')
                        },
                        success: function(data) {
                            if (data.status === 'success') {
                                $('#submitCheckoutForm').text('Place Order')
                                // redirect user to next page
                                window.location.href = data.redirect_url;
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    })
                }



            })
        })
    </script>
@endpush
