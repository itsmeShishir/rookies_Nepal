@extends('shop.layouts.master')
@section('content')
 <!-- Breadcrumb Area Start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content">
                    <ul class="nav">
                        <li><a href="/user-change-details">Profile</a></li>
                        <li><a href="/user-orders">Orders</a></li>
                        <li>Order Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End-->
    <div class="cart-box-main">
        <div class="container">
            <table class="table table-bordered">
                <h2>Product Details</h2>
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Color</th>
                        <th scope="col">Product Size</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Quantity</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders->products as $product)

                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_color }}</td>
                            <td>{{ $product->product_size }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_qty }}</td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
