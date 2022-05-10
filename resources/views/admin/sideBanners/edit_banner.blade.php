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
                <h1>Edit Side Banner</h1>
                <small>Edit Side Banner</small>
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
                                <a class="btn btn-add " href="{{ url('/admin/side-banners') }}">
                                    <i class="fa fa-eye"></i> View Side Banner </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data"
                                action="{{ url('/admin/edit-side-banner/' . $banner->id) }}" method="POST">
                                {{ csrf_field() }}
                
                                
                               
                               
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="banner_link" id="banner_link" class="form-control"
                                        value="{{ $banner->link }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Picture Upload</label>
                                    <input type="file" name="image">
                                    <input type="hidden" name="current_image" value="{{ $banner->image }}">
                                    @if (!empty($banner->image))
                                        <img src="{{ asset('/uploads/side-banners/' . $banner->image) }}" alt=""
                                            style="width:100px">

                                    @endif

                                </div>

                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Edit Banner">
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
