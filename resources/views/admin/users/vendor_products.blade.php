@extends('admin.layouts.master')
@section('title', 'view-product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Vendor Products</h1>
                <small>Vendor Products List</small>
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
        <div id="message_success" style="display: none" class="alert alert-success">Status Enabled
        </div>
        <div id="message_error" style="display: none" class="alert alert-danger">Status Disabled
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group" id="buttonexport">
                                <a href="{{ url('/admin/add-product') }}">
                                    <h4>Add Product</h4>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Category Id</th>
                                            <th>Product Code</th>
                                            <th>Product Color</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Featured</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)

                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category_id }}</td>
                                                <td>{{ $product->code }}</td>
                                                <td>{{ $product->color }}</td>
                                                <td>
                                                    @if (!empty($product->image))
                                                        <img src="{{ asset('/uploads/products/' . $product->image) }}"
                                                            alt="" style="width:100px">

                                                    @endif
                                                </td>



                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    <input type="checkbox" class="ProductStatus btn btn-success"
                                                        rel="{{ $product->id }}" data-toggle="toggle" data-on="Enabled"
                                                        data-off="Disabled" data-onstyle="success" data-offstyle="danger"
                                                        @if ($product['status'] == '1')
                                                    checked>
                                        @endif

                                        </td>
                                        <td>
                                            <input type="checkbox" class="FeaturedStatus btn btn-success"
                                                rel="{{ $product->id }}" data-toggle="toggle" data-on="Enabled"
                                                data-off="Disabled" data-onstyle="success" data-offstyle="danger" @if ($product['featured'] == '1')
                                            checked
                                            @endif>

                                        </td>
                                        <td>
                                            <a title="Add Image" href="{{ url('/admin/add-images/' . $product->id) }}"
                                                class="btn btn-add btn-sm"><i class="fa fa-image"></i></a>
                                            <a href="{{ url('/admin/add-attributes/' . $product->id) }}"
                                                class="btn btn-add btn-sm" title="Add Attribute"><i
                                                    class="fa fa-list"></i></a>
                                            <a href="{{ url('/admin/edit-product/' . $product->id) }}"
                                                class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ url('/admin/delete-product/' . $product->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> </a>
                                        </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customer Modal1 -->
            <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3><i class="fa fa-user m-r-5"></i> Update Customer</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <!-- Text input-->
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">Customer Name:</label>
                                                <input type="text" placeholder="Customer Name" class="form-control">
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">Email:</label>
                                                <input type="email" placeholder="Email" class="form-control">
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-4 form-group">
                                                <label class="control-label">Mobile</label>
                                                <input type="number" placeholder="Mobile" class="form-control">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">Address</label><br>
                                                <textarea name="address" rows="3"></textarea>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label class="control-label">type</label>
                                                <input type="text" placeholder="type" class="form-control">
                                            </div>
                                            <div class="col-md-12 form-group user-form-group">
                                                <div class="pull-right">
                                                    <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                    <button type="submit" class="btn btn-add btn-sm">Save</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Modal -->
           
        </section>
        <!-- /.content -->
    </div>
@endsection
