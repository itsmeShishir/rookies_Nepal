@extends('admin.layouts.master')
@section('title', 'edit-banner')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-image"></i>
            </div>
            <div class="header-title">
                <h1>Edit Brand</h1>
                <small>Edit Brand</small>
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
                                <a class="btn btn-add " href="{{ url('/admin/brands') }}">
                                    <i class="fa fa-eye"></i> View Brand </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data"
                                action="{{ url('/admin/edit-brand/' . $brand->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Company Logo</label>
                                    <input type="file" name="image">
                                    <input type="hidden" name="current_image" value="{{ $brand->image }}">
                                    @if (!empty($brand->image))
                                        <img src="{{ asset('/uploads/brands/' . $brand->image) }}" alt=""
                                            style="width:100px"/>
                                    @endif
                                </div>
                               <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name"  class="form-control" value="{{$brand->company_name}}"
                                        placeholder="Enter Company Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="banner_link" class="form-control" value="{{$brand->email}}"
                                        placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" name="mobile" class="form-control" value="{{$brand->mobile}}"
                                        placeholder="Enter Contact Number" required>
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
