@extends('admin.layouts.master')
@section('title', 'add-product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Add Header Details</h1>
                <small>Add Header Details</small>
            </div>
        </section>
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
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                       
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data" action="{{ url('/admin/header-details') }}"
                                method="POST">
                                {{ csrf_field() }}
                               <input type ="hidden" name="id" value="{{$headerDetails->id}}"/>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" placeholder="Add Phone Number" name="phone" value="{{$headerDetails->phone}}"
                                        id="number" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Emaill" name="email" value="{{$headerDetails->email}}"
                                        id="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile" name="mobile" value="{{$headerDetails->mobile}}"
                                        id="mobile" required>
                                </div>
                                <div class="form-group">
                                    <label>About</label>
                                    <input type="text" class="form-control" placeholder="Enter Emaill" name="about"value="{{$headerDetails->about}}"
                                        id="about" required>
                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
