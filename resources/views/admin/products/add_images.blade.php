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
                <h1>Add Images</h1>
                <small>Add Images</small>
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
                                <a class="btn btn-add " href="{{ url('/admin/view-products') }}">
                                    <i class="fa fa-eye"></i> View Products </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="col-sm-6" enctype="multipart/form-data"
                                action="{{ url('/admin/add-images/' . $productDetails->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" value="{{ $productDetails->id }}"
                                    name="product_id" id="product_id">
                                <div class="form-group">
                                    <label>Product Name</label>

                                    <input type="text" class="form-control" value="{{ $productDetails->name }}"
                                        name="product_name" id="product_name" required>
                                </div>
                                <div class="form-group">
                                    <label>product Code</label>
                                    <input type="text" name="product_code" id="product_code" class="form-control"
                                        value="{{ $productDetails->code }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Product Color</label>
                                    <input type="text" name="product_color" id="product_color" class="form-control"
                                        value="{{ $productDetails->color }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Add Image</label>
                                    <input type="file" name="image[]" multiple="multiple">
                                </div>

                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Images">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">

                                <h4>Images</h4>

                            </div>
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <form enctype="multipart/form-data"
                                    action="{{ url('/admin/edit-attributes/' . $productDetails->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <table id="table_id" class="table table-bordered table-striped table-hover">

                                        <thead>
                                            <tr class="info">
                                                <th>ID</th>
                                                <th>P_ID</th>
                                                <th>Image</th>
                                                <th>Action</th>



                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($imageDetails as $imageDetail)


                                                <tr>
                                                    <td>{{ $imageDetail->id }}</td>
                                                    <td>{{ $imageDetail->product_id }}</td>
                                                    <td>
                                                    <img src="{{asset('uploads/products/'.$imageDetail->image)}}" style="width:80px;" alt="">
                                                    </td>
                                                    <td>

                                                        <a href="{{ url('admin/delete-attribute-image/' . $imageDetail->id) }}"" class="
                                                            btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>

                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>

@endsection
