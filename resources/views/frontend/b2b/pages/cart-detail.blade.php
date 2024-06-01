@extends('frontend.b2b.layouts.master_b2b')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="xcontainer-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="xcontainer-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    @foreach ($cartItems as $item)
                                    <tr class="product-box-contain">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="product-left-thumbnail.html" class="product-image">
                                                    <img src="{{asset($item->options->image)}}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="product-left-thumbnail.html">{!! limitText($item->name,10) !!}</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">Price</h4>
                                            
                                            <h5>{{$settings->currency_icon.$item->price}}</h5>
                                            {{-- <h6 class="theme-color">You Save : $20.68</h6> --}}
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">Qty</h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn xqty-left-minus product-decrement" data-type="minus"
                                                            data-field="">
                                                            <i class="fa fa-minus ms-0"></i>
                                                        </button>
                                                        <input  class="form-control input-number qty-input product-qty" data-rowid="{{$item->rowId}}" type="text" min="1" max="100" value="{{$item->qty}}" readonly>
                                                        <button type="button" class="btn xqty-right-plus product-increment" data-type="plus"
                                                            data-field="">
                                                            <i class="fa fa-plus ms-0"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h6 id="{{$item->rowId}}">{{$settings->currency_icon.($item->price + $item->options->variants_total) * $item->qty}}</h6>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">Action</h4>
                                            <a class="remove close_button" href="{{route('cart.remove-product', $item->rowId)}}">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    @if (count($cartItems) === 0)
                                        <tr class="d-flex" >
                                            <td class="wsus__pro_icon" rowspan="2" style="width:100%">
                                                Cart is empty!
                                            </td>
                                        </tr>

                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <form id="coupon_form">
                                <div class="mb-3 coupon-box input-group">
                                        <input  type="text"  name="coupon_code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Coupon Code Here...">
                                        <button type="submit" class="btn-apply">Apply</button>
                                    </div>
                                </form>
                            </div>
                            <ul>
                                <li>
                                    <h4 >Subtotal</h4>
                                    <h4 id="sub_total"  class="price">{{$settings->currency_icon}}{{getCartTotal()}}</h4>
                                </li>

                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price" id="discount">(-) {{$settings->currency_icon}}{{getCartDiscount()}}</h4>
                                </li>

                                {{-- <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li> --}}
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total ({{$settings->currency_name}})</h4>
                                <h4 class="price theme-color" id="cart_total">{{$settings->currency_icon}}{{getMainCartTotal()}}</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <a href = "{{route('user.checkout')}}"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</a>
                                </li>

                                <li>
                                    <a href = "{{route('home')}}"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->

    @endsection

    
@push('scripts')

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            // incriment product quantity
            $('.product-increment').on('click', function(){
                debugger;
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('rowid');
                input.val(quantity);
    
                $.ajax({
                    url: "{{route('cart.update-quantity')}}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            let productId = '#'+rowId;
                            let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                            $(productId).text(totalAmount)
    
                            renderCartSubTotal()
                            calculateCouponDescount()
    
                            toastr.success(data.message)
                        }else if (data.status === 'error'){
                            toastr.error(data.message)
                        }
                    },
                    error: function(data){
    
                    }
                })
            })
    
            // decrement product quantity
            $('.product-decrement').on('click', function(){
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');
    
                if(quantity < 1){
                    quantity = 1;
                }
    
                input.val(quantity);
    
                $.ajax({
                    url: "{{route('cart.update-quantity')}}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            let productId = '#'+rowId;
                            let totalAmount = "{{$settings->currency_icon}}"+data.product_total
                            $(productId).text(totalAmount)
    
                            renderCartSubTotal()
                            calculateCouponDescount()
    
                            toastr.success(data.message)
                        }else if (data.status === 'error'){
                            toastr.error(data.message)
                        }
                    },
                    error: function(data){
    
                    }
                })
    
            })
    
            // clear cart
            $('.clear_cart').on('click', function(e){
                e.preventDefault();
                Swal.fire({
                        title: 'Are you sure?',
                        text: "This action will clear your cart!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, clear it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
    
                            $.ajax({
                                type: 'get',
                                url: "{{route('clear.cart')}}",
                                success: function(data){
                                    if(data.status === 'success'){
                                        window.location.reload();
                                    }
                                },
                                error: function(xhr, status, error){
                                    console.log(error);
                                }
                            })
                        }
                    })
            })
    
            // get subtotal of cart and put it on dom
            function renderCartSubTotal(){
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.sidebar-product-total') }}",
                    success: function(data) {
                        $('#sub_total').text("{{$settings->currency_icon}}"+data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
    
            // applay coupon on cart
    
            $('#coupon_form').on('submit', function(e){
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('apply-coupon') }}",
                    data: formData,
                    success: function(data) {
                       if(data.status === 'error'){
                        toastr.error(data.message)
                       }else if (data.status === 'success'){
                        calculateCouponDescount()
                        toastr.success(data.message)
                       }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
    
            })
    
            // calculate discount amount
            function calculateCouponDescount(){
                $.ajax({
                    method: 'GET',
                    url: "{{ route('coupon-calculation') }}",
                    success: function(data) {
                        if(data.status === 'success'){
                            $('#discount').text('{{$settings->currency_icon}}'+data.discount);
                            $('#cart_total').text('{{$settings->currency_icon}}'+data.cart_total);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
    
    
        })
    </script>
    @endpush