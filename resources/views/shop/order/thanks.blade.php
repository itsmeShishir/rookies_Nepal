@extends('shop.layouts.master')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');

        .font {
            font-family: 'Ubuntu', sans-serif;
        }

    </style>
    <div class="row checkout-options" style="margin-bottom: 20px">
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-sign-in icon"
                    aria-hidden="true"></i></div>
        </div>
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-truck icon"
                    aria-hidden="true"></i></div>
        </div>
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i
                    class="fa fa-credit-card-alt icon icon-credit-card" aria-hidden="true"></i>
            </div>
        </div>
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-check-square-o icon"
                    aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="login-register-area mtb-50px mb-5 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto ">
                    <div class="login-register-wrapper">
                        <div class="tab-content" style="background: #DFDEDE">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <h2 class="mb-4 font">Hey {{ Auth::user()->name }},</h2>
                                    <h3 class="mb-4 .font">Your order has been received and is on delivery Process. <i
                                            class="fas fa-smile smile" style="color: #23A455;"></i></h3>
                                    <div class="login-register-form font">
                                        <h6>Your Order ID is {{ Session::get('order_id') }}</h6>
                                        <h6 class="mt-2">Your Total Payable amount is Rs : {{ Session::get('grand_total') }}
                                        </h6>
                                        <h6 class="mt-2"><a href="/order-invoice/{{ Session::get('order_id') }}">Download
                                                Order Invoice</a></h6>
                                    </div>
                                    <h2 class="font" style="float:right;margin:20vh 0;">Thank You for believing us</h2>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
            <a href="/" style="float:right">Back to home</a>

        </div>

    </div>
@endsection
