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
                            <li>Orders</li>
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
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Ordered Products</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Grand Total</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @foreach ($order->products as $key => $product)
                                    <div><a href="{{ url('/user-orders/' . $order->id) }}">{{ $product->product_name }}
                                            ({{ $product->product_qty }})</a></div>
                                @endforeach
                            </td>
                            <td>{{ $order->payment_method }}</td>
                            <td>Rs {{ $order->grand_total }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td><a href="/cancel-order/{{ $order->id }}">
                                    <div class="btn btn-danger"> Cancel Order</div>
                                </a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
