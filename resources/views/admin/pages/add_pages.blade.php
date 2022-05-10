@extends('admin.layouts.master')
@section('title', 'add-product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-list-alt"></i>
            </div>
            <div class="header-title">
                <h1>Add Page</h1>
                <small>Add Page</small>
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
                                <a class="btn btn-add " href="{{ url('/admin/pages') }}">
                                    <i class="fa fa-eye"></i> View Pages </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" action="{{ url('/admin/add-page') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" placeholder="Add Link" name="link"
                                        id="link" required>
                                </div>
                                <div class="form-group" style="width: 70vw">
                                    <label>Description</label>
                                    <textarea class="ckeditor form-control" name="description"></textarea>
                                </div>

                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Page">
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
