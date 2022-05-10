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
        <div class="row checkout-options">
                <div class="col-3">
                    <div class="circle" style="border:2px solid #afda11;color:#afda11"><i class="fa fa-sign-in icon" aria-hidden="true"></i></div>
                </div>
                <div class="col-3">
                    <div class="circle"><i class="fa fa-truck icon" aria-hidden="true"></i></div>
                </div>
                <div class="col-3">
                    <div class="circle"><i class="fa fa-credit-card-alt icon icon-credit-card" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-3">
                    <div class="circle"><i class="fa fa-check-square-o icon" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 5vh">
                <div class="col-lg-4 col-md-12 ml-auto mr-auto ">
                    <div class="login-register-wrapper" >
                        <div class="tab-content"  style="background: white">
                            <div id="lg2" class=" register-form" style="margin-bottom: 10vh">
                                <div class="login-form-container" style="padding: 30px">
                            <div class="login-register-form advertisement-area">
                               Advertisement area
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 ml-auto mr-auto ">
                    <div class="login-register-wrapper" >
                        <div class="tab-content"  style="background: white">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container" id="login-form" style="padding: 40px;">
                                    <div class="login-register-form">
                                        <form action="{{ url('/user-login') }}" method="post">{{ csrf_field() }}
                                            <input type="hidden" name="from" value="login-redirected-cart" />
                                            <label for="email">EMAIL <span style="color: red;">*</span></label>
                                            <input type="text" name="email" placeholder="Enter email" />
                                            <label for="password">PASSWORD <span style="color: red;">*</span></label>
                                            <input type="password" name="password" placeholder="Enter Password" />
                                            <div class="button-box">
                                                <div  class="login-toggle-btn" style="margin-top: -20px;margin-bottom:10px">
                                                    <a href="#" style="font-size: 12px" >Forgot Password ?</a>
                                                </div>
                                                <button type="submit" style="background:#23A455!important;color:white;width:100%"><span>Login</span></button>
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
                            <div id="lg2" class="tab-pane register-form" style="margin-bottom: 10vh">
                                <div class="login-form-container" style="padding: 30px">
                                    <div class="login-register-form">
                                        <form action="{{ url('/user-register') }}" method="post">{{ csrf_field() }}
                                            <input type="hidden" name="from-login" value="false" />
                                            <input type="hidden" name="from" value="login-redirected-cart" />
                                            <label for="email">NAME <span style="color: red;">*</span></label>
                                            <input type="text" name="name"/>
                                            <label for="email">EMAIL ADDRESS<span style="color: red;">*</span></label>
                                            <input name="email" placeholder="Email" type="email" />
                                            <label for="email">PASSWORD <span style="color: red;">*</span></label>
                                            <input type="password" name="password" placeholder="Password" />
                                            <label for="email">CONFIRM PASSWORD <span style="color: red;">*</span></label>
                                            <input type="password" name="password" placeholder="Password" />
                                            <label for="email">REFERAL CODE (OPTIONAL) </label>
                                            <input type="password" name="password" placeholder="Password" />
                                            <label for="">By Clicking Register, You Agree To Our Terms & Conditions</label>
                                           <input type="checkbox" class="register-checkbox">
                                            <label for="vehicle1">  I Want To Accept Promotional Emails</label><br>
                                            <div class="button-box">
                                                <button type="submit" class="register-btn" ><span>Register</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 ml-auto mr-auto ">
                    <div class="login-register-wrapper" >
                        <div class="tab-content"  style="background: white">
                            <div id="lg2" class=" register-form" style="margin-bottom: 10vh">
                                <div class="login-form-container" style="padding: 30px">
                            <div class="login-register-form">
                                <form action="{{ url('/user-register') }}" method="post">{{ csrf_field() }}
                                    <input type="hidden" name="from" value="login-redirected-cart" />
                                    <label for="name">NAME <span style="color: red;">*</span></label>
                                    <input type="text" name="name"/>
                                    <label for="email">EMAIL ADDRESS<span style="color: red;">*</span></label>
                                    <input name="email" placeholder="Email" type="email" />
                                    <label for="password">PASSWORD <span style="color: red;">*</span></label>
                                    <input type="password" name="password" placeholder="Password" />
                                    <label for="password">CONFIRM PASSWORD <span style="color: red;">*</span></label>
                                    <input type="password" name="confirm-password" placeholder="Password" />
                                    <label for="referal-code">REFERAL CODE (OPTIONAL) </label>
                                    <input type="text" name="referal-code" placeholder="Referal Code" />
                                    <label for="">By Clicking Register, You Agree To Our Terms & Conditions</label>
                                   <input type="checkbox" class="register-checkbox">
                                    <label for="vehicle1">  I Want To Accept Promotional Emails</label><br>
                                    <div class="button-box">
                                        <button type="submit" class="register-btn" ><span>Register</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
           {{-- <div class="login">
               <div class="login-card">
                   <div class="title">Sign In With<title></title></div>
                   <div class="sign-in-options">
                       <a></a>
                       <a></a>
                   </div>
                   <div class="form-group">
                    <label for="usr">Username:</label>
                    <input type="text" class="form-control" id="usr">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd">
                  </div>
                   <div class="sign-in">  <input type="submit" class="btn btn-info btn-block" value="Sign In"></div>
                   <div class="forgot-password">This is forgrot password</div>
               </div>
           </div>
        </div> --}}

    </div>

@endsection
