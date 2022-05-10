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
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-content">
                        <ul class="nav">
                            <li><a href="/user-change-details">Profile</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Breadcrumb Area End-->
<!-- Wishlist area start -->
<div class="cart-main-area mtb-60px">
    <div class="container">
        <h3 class="cart-page-title">Your Wish List</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Action</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($wishList as $key => $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a  href="#"><img class="img-responsive" src="{{asset('uploads/products/'.$item->product_image)}}"
                                            alt="Wish List product Image" /></a>
                                    </td>
                                    <td class="product-name">{{$item->product_id}}</td>
                                    <td class="product-price-cart">{{$item->product_name}}</td>
                                    <td class="product-price-cart">Rs :{{$item->product_price}}</td>
                                
                                    <td class="product-wishlist-cart">
                                        <a href="/products/{{$item->product_id}}">View Product</a>
                                    </td>
                                    <td class="product-wishlist-cart">
                                        <a href="{{url('/delete-wish-list-item/' . $item->id) }}" class="bg-danger">Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Wishlist area end -->
@endsection