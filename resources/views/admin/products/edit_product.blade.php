@extends('admin.layouts.master')
@section('title', 'edit-product')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-product-hunt"></i>
            </div>
            <div class="header-title">
                <h1>Edit Products</h1>
                <small>Edit Products</small>
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
                                action="{{ url('/admin/edit-product/' . $productDetails->id) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Under Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <?php echo $categories_dropdown; ?>
                                    </select>
                                </div>
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
                                <div class="form-group" style="width: 70vw">
                                    <label>Product Description</label>
                                    <textarea class="ckeditor form-control" name="product_description"
                                        id="product_description"
                                        class="form-control">{{ $productDetails->description }}</textarea>
                                </div>
                                <div class="form-group" style="width: 70vw">
                                    <label>Product Detail</label>
                                    <textarea class="ckeditor form-control" name="detail" id="detail"
                                        class="form-control">{{ $productDetails->detail }}</textarea>
                                </div>
                                @if (Auth::User()->role == 2)
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input class="form-control " type="text"
                                            value="{{ $productDetails->vendor_price }}" name="vendor_price"
                                            id="product_price" />
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label class="product-price">Product Price</label>
                                        <input class="product_price form-control" type="number" id="product-price"
                                            value="{{ $productDetails->price }}" name="product_price"
                                            id="product_price" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tax Amount</label>
                                        <input class="form-control tax-amount" type="text" name="tax_amount" id="tax_amount"
                                            value={{ $productDetails->tax_amount }} />
                                    </div>
                                    <div class="form-group">
                                        <label>Discounted Price</label>
                                        <input class="form-control" type="text"
                                            value="{{ $productDetails->discounted_price }}" name="discounted_price"
                                            id="discounted_price" />
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input class="form-control" type="number" name="stock" min="0"
                                        id="stock"  value="{{ $productDetails->stock }}" />
                                </div>
                                <div class="form-group">
                                    <label for="">Picture Upload</label>
                                    <input type="file" name="image">
                                    <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                                    @if (!empty($productDetails->image))
                                        <img src="{{ asset('/uploads/products/' . $productDetails->image) }}" alt=""
                                            style="width:100px">

                                    @endif

                                </div>
                                <div class="reset-button">
                                    <input type="submit" class="btn btn-success" value="Edit Product">
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
