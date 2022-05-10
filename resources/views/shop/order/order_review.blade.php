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
    <div class="row checkout-options" style="margin-bottom: 20px">
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-sign-in icon" aria-hidden="true"></i></div>
        </div>
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-truck icon" aria-hidden="true"></i></div>
        </div>
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-credit-card-alt icon icon-credit-card" aria-hidden="true"></i>
            </div>
        </div>
        <div class="col-3">
            <div class="circle"><i class="fa fa-check-square-o icon" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <!-- Start Cart  -->
    <div class="cart-box-main">
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

                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_amount = 0; ?>
                                @foreach ($items as $key => $cart)
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid"
                                                    src="{{ asset('/uploads/products/' . $cart->image) }}" width="50px" alt="" />
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

                                            <div class="btn btn-success">{{ $cart->product_quantity }}</div>

                                        </td>
                                        <td class="total-pr">
                                            <p>{{ $cart->total_price }}</p>
                                        </td>

                                        <?php $total_amount = $total_amount + $cart->product_price *
                                        $cart->product_quantity; ?>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-lm-30px">
                    <div class="cart-tax">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gray">Billing Information</h4>
                        </div>
                        <div class="tax-wrapper">
                        <p class="mb-2">Name : {{$user->name}}</p>
                        <p class="mb-2">Address : {{$user->address}}</p>
                        <p class="mb-2">Phone : {{$user->phone}}</p>
                        <hr>
                        <div class="title-wrap mb-4">
                            <h4 class="cart-bottom-title section-bg-gray">Shipping Information</h4>
                        </div>
                        <p class="mb-2">Name : {{$shippingAddress->name}}</p>
                        <p class="mb-2">Address : {{$shippingAddress->address}}</p>
                        <p class="mb-2">Phone : {{$shippingAddress->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-lm-30px mb-5">
                    <div class="discount-code-wrapper">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gray">Select Payment Method</h4>
                        </div>
                        <div class="discount-code">
                            <p class="mb-5">Choose the available method for payment. We ensure secure and safe transactions.</p>
                            <form action="{{ url('/order') }}" method="POST">{{ csrf_field() }}
                                <input type="hidden" value="{{ $total_amount + 100 - Session::get('CouponAmount') }}" name="totalAmount">
                                <input type="hidden" value="100" name="shipping_charges">
                                <div class="form-check ml-5">
                                    <div><label class="form-check-label" for="cod">
                                        Cash On delivery
                                    </label></div>
                                    <div><input style="margin-top:-25px;" type="radio" name="paymentMethod" id="cod" value="cod"></div>
                                   
                                </div>
                                <div class="form-check ml-5">
                                    <label class="form-check-label" for="esewa">
                                        Esewa
                                    </label>
                                    <input style="margin-top:-30px" type="radio" name="paymentMethod" id="esewa" value="esewa">
                                    
                                </div>
                                <button class="cart-btn-2 mb-5" style="float:right" type="submit">Done</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mt-md-30px">
                    <div class="grand-totall">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gary-cart">Bill Amounts</h4>
                        </div>
                        @if(empty(Session::get('CouponAmount')))
                        <h5>Sub Total <span> Rs : <?php echo $total_amount?></span></h5>
                        <h4 class="grand-totall-title">Shipping Charge<span>Rs : 100</span></h4>
                        <h4 class="grand-totall-title">Grand Total <span><?php echo $total_amount + 100?></span></h4>
                        @else
                        <h5>Sub Total <span> Rs :<?php echo $total_amount?></span></h5>
                        <h5>Discount Amount <span> Rs : <?php echo
                            Session::get('CouponAmount'); ?></span></h5>
                        <h5>Shipping Charge<span> Rs :100</span></h5>
                        <h4 class="grand-totall-title">Grand Total <span>Rs : <?php echo 100+$total_amount -
                            Session::get('CouponAmount'); ?></span></h4>
                        @endif
                    </div>
                </div>
              
               
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
