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
    <div class="row checkout-options">
        <div class="col-3">
            <div class="circle"  style="border:2px solid #23A455;color:#23A455"><i class="fa fa-sign-in icon" aria-hidden="true"></i></div>
        </div>
        <div class="col-3">
            <div class="circle" style="border:2px solid #23A455;color:#23A455"><i class="fa fa-truck icon" aria-hidden="true"></i></div>
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
    <div class="contact-box-main" style="margin-top:10vh;margin-bottom:40vh;">
        <form action="{{ url('/checkout') }}" method="post">{{ csrf_field() }}
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 col-sm-12">

                        <div class="contact-form-right">

                            <h4 class="mb-4">Billing Address</h4>
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            Please provide valid informations below
                                        </div>
                                        <div class="form-group">
                                           <label for="billing_name">Full Name</label>
                                            <input type="text" @if(!@empty($user->name)) value="{{ $user->name }}" @endif class="form-control"
                                                name="billing_name" id="billing_name">


                                        </div>
                                        <div class="form-group">
                                            <label for="billing_phone">Mobile No.</label>
                                            <input type="number" class="form-control" name="billing_phone"
                                                id="billing_phone" @if(!@empty($user->phone)) value="{{ $user->phone }}" @endif>

                                        </div>
                                        <div class="form-group">
                                            <label for="billing_district">District</label>
                                            <select class="form-control" name="billing_district" id="billing_district">
                                                <option   value="">--select--</option>
                                                <option @if($user->district == "kathmandu") selected @endif   value="kathmandu">Kathmandu</option>
                                                <option @if($user->district == "lalitpur") selected @endif  value="lalitpur">Lalitpur</option>
                                                <option @if($user->district == "bhaktapur") selected @endif value="bhaktapur">Bhaktapur</option>
                                            </select>
                                            {{-- <input type="address" @if(!@empty($user->address)) value="{{ $user->address }}" @endif class="form-control"
                                                name="billing_address" id="billing_address"> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="billing_district">City</label>
                                            <select class="form-control" name="billing_city" id="billing_city">
                                                <option   value="">--select--</option>
                                                <option @if($user->city == "Naxal Area-Kathmandu Metro 1") selected @endif   value="Naxal Area-Kathmandu Metro 1">Naxal Area-Kathmandu Metro 1</option>
                                                <option @if($user->city == "Lazimpat Area-Kathmandu Metro 1") selected @endif   value="Lazimpat Area-Kathmandu Metro 1">Lazimpat Area-Kathmandu Metro 1</option>
                                                <option @if($user->city == "Maharajgunj Area-Kathmandu Metro3") selected @endif   value="Maharajgunj Area-Kathmandu Metro3">Maharajgunj Area-Kathmandu Metro3</option>
                                                <option @if($user->city == "Baluwatar Area-Kathmandu Metro 3") selected @endif   value="Baluwatar Area-Kathmandu Metro 3">Baluwatar Area-Kathmandu Metro 3</option>
                                               
                                            </select>
                                            {{-- <input type="address" @if(!@empty($user->address)) value="{{ $user->address }}" @endif class="form-control"
                                                name="billing_address" id="billing_address"> --}}
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="billing_area">Area</label>
                                            <select class="form-control" name="billing_area" id="billing_area">
                                                <option   value="">-select--</option>
                                                <option @if($user->area == "Jamal") selected @endif   value="Jamal">Jamal</option>
                                                <option @if($user->area == "Kantipath") selected @endif   value="Kantipath">Kantipath</option>
                                                <option @if($user->area == "Naxal") selected @endif   value="Naxal">Naxal</option>
                                                <option @if($user->area == "Durbarmarg") selected @endif   value="Durbarmarg">Durbarmarg</option>
                                                
                                            </select>
                                            {{-- <input type="address" @if(!@empty($user->address)) value="{{ $user->address }}" @endif class="form-control"
                                                name="billing_address" id="billing_address"> --}}
                                        </div>
                                        <div>
                                            <label for="">Address</label>
                                            <textarea  class="form-control mb-2" name="billing_address" id="billing_address">{{$user->address}}</textarea>
                                        </div>
                                        
                                    </div>
                                </div>

                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="contact-form-right">


                            <div class="contact-form-right">

                                <h4 class="mb-4">Shipping Address</h4>
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input id="billtoship" type="checkbox" class=""> Shiping same as billing address
                                            </div>
                                            <div class="form-group">
                                                <label for="shipping_name">Full Name</label>
                                                <input type="text"  class="form-control"
                                                    name="shipping_name" id="shipping_name">


                                            </div>
                                            <div class="form-group">
                                                <label for="shipping_phone">Mobile No.</label>
                                                <input type="phone" class="form-control" 
                                                    name="shipping_phone" id="shipping_phone">

                                            </div>
                                            <div class="form-group">
                                                <label for="shipping_district">District</label>
                                                <select class="form-control" name="shipping_district" id="shipping_district">
                                                    <option value="">--DISTRICT--</option>
                                                    <option value="kathmandu">Kathmandu</option>
                                                    <option value="lalitpur">Lalitpur</option>
                                                    <option value="bhaktapur">Bhaktapur</option>
                                                </select>
                                                {{-- <input type="address" @if(!@empty($user->address)) value="{{ $user->address }}" @endif class="form-control"
                                                    name="billing_address" id="billing_address"> --}}
                                            </div>
                                            <div class="form-group">
                                                <label for="shipping_district">City</label>
                                                <select class="form-control" name="shipping_city" id="shipping_city">
                                                    <option   value="">--select--</option>
                                                    <option @if($user->city == "Naxal Area-Kathmandu Metro 1") selected @endif   value="Naxal Area-Kathmandu Metro 1">Naxal Area-Kathmandu Metro 1</option>
                                                    <option @if($user->city == "Lazimpat Area-Kathmandu Metro 1") selected @endif   value="Lazimpat Area-Kathmandu Metro 1">Lazimpat Area-Kathmandu Metro 1</option>
                                                    <option @if($user->city == "Maharajgunj Area-Kathmandu Metro3") selected @endif   value="Maharajgunj Area-Kathmandu Metro3">Maharajgunj Area-Kathmandu Metro3</option>
                                                    <option @if($user->city == "Baluwatar Area-Kathmandu Metro 3") selected @endif   value="Baluwatar Area-Kathmandu Metro 3">Baluwatar Area-Kathmandu Metro 3</option>
                                                   
                                                </select>
                                                {{-- <input type="address" @if(!@empty($user->address)) value="{{ $user->address }}" @endif class="form-control"
                                                    name="billing_address" id="billing_address"> --}}
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="shipping_area">Area</label>
                                                <select class="form-control" name="shipping_area" id="shipping_area">
                                                    <option   value="">-select--</option>
                                                    <option @if($user->area == "Jamal") selected @endif   value="Jamal">Jamal</option>
                                                    <option @if($user->area == "Kantipath") selected @endif   value="Kantipath">Kantipath</option>
                                                    <option @if($user->area == "Naxal") selected @endif   value="Naxal">Naxal</option>
                                                    <option @if($user->area == "Durbarmarg") selected @endif   value="Durbarmarg">Durbarmarg</option>
                                                    
                                                </select>
                                                {{-- <input type="address" @if(!@empty($user->address)) value="{{ $user->address }}" @endif class="form-control"
                                                    name="billing_address" id="billing_address"> --}}
                                            </div>
                                            <div>
                                                <label for="">Address</label>
                                                <textarea  class="form-control mb-2" name="shipping_address" id="shipping_address"></textarea>
                                            </div>
                                            <div class="form-group  mt-5">
                                                <input type="submit" style="border-color:#23A455;background-color:#23A455" class="btn btn-success btn-md btn-block" value="checkout">
                                            </div>
                                        </div>
                                    </div>

                            </div>
        </form>
    </div>
    </div>
    </div>
    </div>

    </div>
@endsection
