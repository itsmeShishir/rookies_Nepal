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
   <div class="login-register-area">
        <div class="container" >
            <div class="row" style="margin-top: 5vh">
                <div class="col-lg-4 col-md-12 ml-auto mr-auto ">
                    <div class="login-register-wrapper" >
                        <div class="tab-content"  style="background: white">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container" id="login-form" style="padding: 40px">
                                    <div class="login-register-form">
                                        <form action="{{ url('/user-login') }}" method="post">{{ csrf_field() }}
                                            <label for="email">EMAIL<span style="color: red;">*</span></label>
                                            @error('login-email')
                                                <div class="validation-error">{{$message}}</div>
                                            @enderror
                                            <input type="hidden" name="from" value="front-wishlist" />
                                            <input type="hidden" name="product_id" value="{{$product_id}}" />
                                            <input type="text" name="login-email" placeholder="Enter email" />
                                            <label for="password">PASSWORD <span style="color: red;">*</span></label>
                                            @error('login-password')
                                                <div class="validation-error">{{$message}}</div>
                                            @enderror
                                            <input type="password" name="login-password" placeholder="Enter Password" />
                                            <div class="button-box">
                                                <div  class="login-toggle-btn" style="margin-top: -20px;margin-bottom:10px">
                                                    <a href="#" style="font-size: 12px" >Forgot Password ?</a>
                                                </div>
                                                <button type="submit" style="background: #3187d3;color:white;width:100%"><span>Login</span></button>
                                            <div class="login-with">OR LOGIN WITH</div>
                                            <div class="login-options">
                                                <a class="option facebook"><i class="fab fa-facebook-f"></i> facebook</a>
                                                <a class="option google"><i class="fab fa-google"></i> Google</a>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>  
        </div>
  
@endsection
