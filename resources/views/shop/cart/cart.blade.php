@extends('shop.layouts.master')
@section('content')
    @if (Session::has('flash_message_error'))
        <div class="alert alert-sm alert-danger alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif
    @if (Session::has('flash_message_success'))
        <div class="alert alert-sm alert-success alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif
    <!-- Start Cart  -->
    {{-- <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_amount = 0; ?>
                                @foreach ($cartItems as $key => $cart)
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid"
                                                    src="{{ asset('/uploads/products/' . $cart->image) }}" width="70px" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            {{ $cart->product_name }}
                                        </td>
                                        <td class="price-pr">
                                            {{ $cart->product_price }}
                                        </td>
                                        <td class="price-pr">
                                            {{ $cart->product_size }}
                                        </td>
                                        <td class="quantity-box">
                                            <a href="{{ url('/update-quantity/' . $cart->id . '/1') }}"
                                                class="btn btn-warning">+</a>
                                            <div class="btn btn-success">{{ $cart->product_quantity }}</div>
                                            @if ($cart->product_quantity > 0)
                                                <a href="{{ url('/update-quantity/' . $cart->id . '/-1') }}"
                                                    class="btn btn-warning">-</a>
                                            @endif
                                        </td>
                                        <td class="total-pr">
                                            <p>{{ $cart->total_price }}</p>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="{{ url('/delete-cart-item/' . $cart->id) }}">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td>
                                        <?php $total_amount = $total_amount + $cart->product_price * $cart->product_quantity; ?>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <form action="{{ url('/apply-coupons') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="container">
                            <div class="input-group input-group-sm">
                                <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code"
                                    type="text" name="coupon_code">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Apply Coupon</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        @if (!empty(Session::get('CouponAmount')))



                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"><?php echo $total_amount; ?></div>
                            </div>

                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold"> $ <?php echo Session::get('CouponAmount'); ?> </div>
                            </div>

                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> $ <?php echo $total_amount - Session::get('CouponAmount'); ?>
                                </div>
                            </div>
                            <hr>
                        @else
                            <div class="d-flex gr-total">
                                <h5>Grand Total</h5>
                                <div class="ml-auto h5"> $ <?php echo $total_amount; ?>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-10 col-sm-12">
                    <div class="col-12 d-flex shopping-box"><a href="/" class="ml-auto btn btn-success">Shop More</a>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="col-12 d-flex shopping-box"><a href="/checkout" class="ml-auto btn btn-danger">Checkout</a>
                    </div>
                </div>

                {{-- <div class="col-12 d-flex shopping-box"><a href="/checkout" class="ml-auto btn hvr-hover">Checkout</a>
                </div> 
            </div>

        </div>
    </div> --}}
    <!-- End Cart -->

    <!-- cart area start -->
    <div class="cart-main-area mtb-60px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Tax</th>
                                        <th>Size</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_amount = 0; ?>
                                    @foreach ($cartItems as $key => $cart)
                                        <tr>
                                            <td class="thumbnail-img">
                                                <a href="#">
                                                    <img class="img-fluid"
                                                        src="{{ asset('/uploads/products/' . $cart->image) }}"
                                                        width="70px" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                {{ $cart->product_name }}
                                            </td>
                                            <td class="price-pr">
                                                {{ $cart->product_price }}
                                            </td>
                                            <td class="price-pr">
                                                @if ($cart->has_tax == 1)
                                                    {{ 0.13 * $cart->product_price }}
                                                @else
                                                    00
                                                @endif
                                            </td>
                                            <td class="price-pr">
                                                {{ $cart->product_size }}
                                            </td>
                                            <td class="quantity-box">
                                                <a href="{{ url('/update-quantity/' . $cart->id . '/1') }}"
                                                    class="btn btn-warning">+</a>
                                                <div class="btn btn-success">{{ $cart->product_quantity }}</div>
                                                @if ($cart->product_quantity > 0)
                                                    <a href="{{ url('/update-quantity/' . $cart->id . '/-1') }}"
                                                        class="btn btn-warning">-</a>
                                                @endif
                                            </td>
                                            <td class="total-pr">
                                                <p>{{ $cart->total_price }}</p>
                                            </td>
                                            <td class="remove-pr">
                                                <a href="{{ url('/delete-cart-item/' . $cart->id) }}">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                            <?php $total_amount = $total_amount + $cart->total_price; ?>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <hr>
                        {{-- <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="/">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Update Shopping Cart</button>
                                        <a href="#">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            {{-- <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                        * Country
                                                    </label>
                                            <select class="email s-email s-wid">
                                                        <option>Bangladesh</option>
                                                        <option>Albania</option>
                                                        <option>Åland Islands</option>
                                                        <option>Afghanistan</option>
                                                        <option>Belgium</option>
                                                    </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                        * Region / State
                                                    </label>
                                            <select class="email s-email s-wid">
                                                        <option>Bangladesh</option>
                                                        <option>Albania</option>
                                                        <option>Åland Islands</option>
                                                        <option>Afghanistan</option>
                                                        <option>Belgium</option>
                                                    </select>
                                        </div>
                                        <div class="tax-select mb-25px">
                                            <label>
                                                        * Zip/Postal Code
                                                    </label>
                                            <input type="text" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <form action="{{ url('/apply-coupons') }}" method="POST"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="text" required="" name="coupon_code" />
                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                @if (empty(Session::get('CouponAmount')))
                                    <h5>Sub Total <span> Rs : <?php echo $total_amount; ?></span></h5>
                                    <h4 class="grand-totall-title">Shipping Charge<span>Rs : 100</span></h4>
                                    <h4 class="grand-totall-title">Grand Total <span><?php echo $total_amount
                                            + 100; ?></span></h4>
                                @else
                                    <h5>Sub Total <span> Rs :<?php echo $total_amount; ?></span></h5>
                                    <h5>Discount Amount <span> Rs : <?php echo Session::get('CouponAmount');
                                            ?></span></h5>
                                    <h5>Shipping Charge<span> Rs :100</span></h5>
                                    <h4 class="grand-totall-title">Grand Total <span>Rs : <?php echo 100 +
                                            $total_amount - Session::get('CouponAmount'); ?></span></h4>
                                @endif

                                <a href="/checkout">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart area end -->
@endsection
