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
    <div class="contact-box-main">
        <div class="container mx-5 my-5">
            <div class="row">
                <div class="col-lg-10 col-sm-10">
                    <form action="{{ url('/vendor/register') }}" method="post">{{ csrf_field() }}
                        <div class="contact-form-right">

                            <h2>Register as Vendor</h2>
                            <form action="">
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Your Name" class="form-control"
                                                name="name">


                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Enter Password" class="form-control"
                                                name="password">

                                        </div>
                                        <div class="form-group">
                                            <input type="email" placeholder="Enter Email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" placeholder="Enter Phone Number" class="form-control"
                                                name="phone">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter Address" class="form-control"
                                                name="address">
                                        </div>
                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-success btn-lg">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
