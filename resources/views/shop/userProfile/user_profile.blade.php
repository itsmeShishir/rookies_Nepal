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
    <!-- Start My Account  -->
    <div class="checkout-area mtb-60px">
                <div class="container">
                    <div class="row">
                        <div class="ml-auto mr-auto col-lg-9">
                            <div class="checkout-wrapper">
                                <div id="faq" class="panel-group">
                                    <div class="panel panel-default single-my-account">
                                        <div class="panel-heading my-account-title">
                                            <h3 class="panel-title"><span>1 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h3>
                                        </div>
                                        <div id="my-account-1" class="panel-collapse collapse show">
                                            <div class="panel-body">
                                                <form action="{{ url('/user-change-details') }}" method="post">{{ csrf_field() }}
                                                <div class="myaccount-info-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h4>My Account Information</h4>
                                                        <h5>Your Personal Details</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Name</label>
                                                                <input type="text" name="name" value="{{$user->name}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Phone</label>
                                                                <input type="number" name="phone" value="{{$user->phone}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Email Address</label>
                                                                <input type="email" name="email" value="{{$user->email}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label>Address</label>
                                                                <input type="text" name="address" value="{{$user->address}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label for="district">District</label>
                                                                <select class="form-control" name="district" id="district">
                                                                    <option   value="">--select--</option>
                                                                    <option @if($user->district == "kathmandu") selected @endif   value="kathmandu">Kathmandu</option>
                                                                    <option @if($user->district == "lalitpur") selected @endif  value="lalitpur">Lalitpur</option>
                                                                    <option @if($user->district == "bhaktapur") selected @endif value="bhaktapur">Bhaktapur</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label for="city">City</label>
                                                                <select class="form-control" name="city" id="city">
                                                                    <option   value="">--select--</option>
                                                                    <option @if($user->city == "Naxal Area-Kathmandu Metro 1") selected @endif   value="Naxal Area-Kathmandu Metro 1">Naxal Area-Kathmandu Metro 1</option>
                                                                    <option @if($user->city == "Lazimpat Area-Kathmandu Metro 1") selected @endif   value="Lazimpat Area-Kathmandu Metro 1">Lazimpat Area-Kathmandu Metro 1</option>
                                                                    <option @if($user->city == "Maharajgunj Area-Kathmandu Metro3") selected @endif   value="Maharajgunj Area-Kathmandu Metro3">Maharajgunj Area-Kathmandu Metro3</option>
                                                                    <option @if($user->city == "Baluwatar Area-Kathmandu Metro 3") selected @endif   value="Baluwatar Area-Kathmandu Metro 3">Baluwatar Area-Kathmandu Metro 3</option>
                                                                   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="billing-info">
                                                                <label for="area">Area</label>
                                                                <select class="form-control" name="area">
                                                                    <option   value="">-select--</option>
                                                                    <option @if($user->area == "Jamal") selected @endif   value="Jamal">Jamal</option>
                                                                    <option @if($user->area == "Kantipath") selected @endif   value="Kantipath">Kantipath</option>
                                                                    <option @if($user->area == "Naxal") selected @endif   value="Naxal">Naxal</option>
                                                                    <option @if($user->area == "Durbarmarg") selected @endif   value="Durbarmarg">Durbarmarg</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-btn">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default single-my-account">
                                        <div class="panel-heading my-account-title">
                                            <h3 class="panel-title"><span>2 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h3>
                                        </div>
                                        <div id="my-account-2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <form action="{{ url('/user-change-password') }}" method="post">{{ csrf_field() }}
                                                <div class="myaccount-info-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h4>Change Password</h4>
                                                        <h5>Your Password</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>Old Password</label>
                                                                <input type="password"  class="form-control"
                                                                name="old_password">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="billing-info">
                                                                <label>New Password</label>
                                                                <input type="password" class="form-control"
                                                                name="new_password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default single-my-account">
                                        <div class="panel-heading my-account-title">
                                            <h3 class="panel-title"><span>3 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries </a></h3>
                                        </div>
                                        <div id="my-account-3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="myaccount-info-wrapper">
                                                    <div class="account-info-wrapper">
                                                        <h4>Address Book Entries</h4>
                                                    </div>
                                                    <div class="entries-wrapper">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                                <div class="entries-info text-center">
                                                                    <p>Jone Deo</p>
                                                                    <p>hastech</p>
                                                                    <p>28 Green Tower,</p>
                                                                    <p>Street Name.</p>
                                                                    <p>New York City,</p>
                                                                    <p>USA</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                                <div class="entries-edit-delete text-center">
                                                                    <a class="edit" href="#">Edit</a>
                                                                    <a href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="billing-back-btn">
                                                        <div class="billing-back">
                                                            <a href="#"><i class="icon-arrow-up-circle"></i> back</a>
                                                        </div>
                                                        <div class="billing-btn">
                                                            <button type="submit">Continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default single-my-account">
                                        <div class="panel-heading my-account-title">
                                            <h3 class="panel-title"><span>4 .</span> <a href="/user/wishlist/{{$user->id}}">Modify your wish list </a></h3>
                                        </div>
                                    </div>
                                    <div class="panel panel-default single-my-account">
                                        <div class="panel-heading my-account-title">
                                            <h3 class="panel-title"><span>5 .</span> <a href="/user-orders">Orders </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    <!-- End My Account -->
@endsection
