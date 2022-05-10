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
                <h1>Add Products</h1>
                <small>Add Products</small>
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
                            <form class="col-sm-6" enctype="multipart/form-data" action="{{ url('/admin/add-product') }}"
                                method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Under Category</label>
                                    @error('category_id')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <select name="category_id" id="category_id" class="form-control">
                                        <?php echo $categories_dropdown; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    @error('product_name')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" placeholder="Add Product" name="product_name"
                                        value="{{ old('product_name') }}" id="product_name">
                                </div>
                                <div class="form-group">
                                    <label>product Code</label>
                                    @error('product_code')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="product_code" id="product_code" class="form-control"
                                        value="{{ old('product_code') }}" placeholder="Enter Product Code">
                                </div>
                                <div class="form-group">
                                    <label>Product Color</label>
                                    @error('product_color')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <input type="text" name="product_color" id="product_color"
                                        value="{{ old('product_color') }}" class="form-control"
                                        placeholder="Enter Product Color">
                                </div>
                                <div class="form-group" style="width: 70vw">
                                    <label>Product Detail</label>
                                    @error('detail')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <textarea class="ckeditor form-control" name="detail">{{ old('detail') }}</textarea>
                                </div>
                                <div class="form-group" style="width: 70vw">
                                    <label>Product Description</label>
                                    @error('description')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <textarea class="ckeditor form-control"
                                        name="description">{{ old('description') }}</textarea>
                                </div>
                                @if (Auth::User()->role == 2)
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        @error('product_price')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                        <input class="form-control" type="number" min="0" name="vendor_price"
                                            value="{{ old('product_price') }}" id="product_price" />
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        @error('product_price')
                                            <div class="validation-error">{{ $message }}</div>
                                        @enderror
                                        <input class="product_price form-control" min="0" type="number"
                                            value="{{ old('product_price') }}" name="product_price" id="product_price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Include Tax </label>
                                        <input type="checkbox" id="taxCheckBox" name="has_tax" value=1
                                            onchange="taxCheckBoxCheck()">
                                    </div>

                                    <div class="form-group" id="taxDisplay" style="display: none">
                                        <label>Tax Amount</label>
                                        <input class="form-control tax-amount" type="text" name="tax_amount" id="tax_amount"
                                            value="00.00" />
                                    </div>
                                    <div class="form-group">
                                        <label>Discounted Price</label>
                                        <input class="form-control" type="number" name="discounted_price" min="0"
                                            id="product_price" value="{{ old('discounted_price') }}" />
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input class="form-control" type="number" name="stock" min="0" id="stock"
                                        value="{{ old('stock') }}" />
                                </div>
                                <div class="form-group">
                                    <label for="">Picture Upload</label>
                                    @error('image')
                                        <div class="validation-error">{{ $message }}</div>
                                    @enderror
                                    <input type="file" name="image" value="{{ old('image') }}">

                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Add Product">
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
