@extends('admin.layouts.master')
@section('title', 'add-product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="header-title">
                <h1>Add Vendor</h1>
                <small>Add Vendor</small>
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
                            <div class="btn-group" id="buttonlist">
                                <a class="btn btn-add " href="{{ url('/admin/vendors') }}">
                                    <i class="fa fa-eye"></i> View Vendors </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data" action="{{ url('/admin/vendor/register') }}"
                                method="POST">
                                {{ csrf_field() }}
                               
                                <div class="form-group">
                                    <label>Vendor Name</label>
                                    <input type="text" class="form-control" name="name"
                                        id="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Vendor Email</label>
                                    <input type="email" class="form-control"  name="email"
                                        id="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Vendor Password</label>
                                    <input type="password" class="form-control"  name="password"
                                        id="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Vendor Address</label>
                                    <input type="text" class="form-control"  name="address"
                                        id="address" required>
                                </div>
                                <div class="form-group">
                                    <label>Vendor Phone</label>
                                    <input type="number" class="form-control"  name="phone"
                                        id="phone" required>
                                </div>
                                
                                
                                
                               
                               
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Vendor">
                                    
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
