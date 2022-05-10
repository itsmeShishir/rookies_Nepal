@extends('shop.layouts.master')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
    .font{
        font-family: 'Ubuntu', sans-serif;
    }
</style>

<div class="login-register-area mtb-50px mb-5 mt-3">
    <div class="container" >
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto " >
                <div class="login-register-wrapper">
                    <div class="tab-content" style="background: #DFDEDE">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                            <h2 class="mb-4 font">Thank You for Subscribing</h2>
                                <h3 class="mb-4 .font">You will reveive latest updates through email <i class="fas fa-smile smile" style="color: #23A455;"></i></h3>
                                <h3 class="mb-4 .font text-success"><a href="/">Continue Shoping</a></h3>
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
