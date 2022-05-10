@extends('admin.layouts.master')
@section('title', 'orders')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>

            </div>
            <div class="header-title">
                <h1>Orders</h1>
                <small>Orders List</small>
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
                            Orders List
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>VENDOR ORDER ID</th>
                                            <th>ORDER ID</th>
                                            <th>ORDER DATE</th>
                                            <th>Customer Name</th>
                                            <th>Customer Email</th>
                                            <th>Payment Method</th>
                                            <th>Ordered Product</th>
                                            <th>Amount</th>
                                            <th>Order Status</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->created_at->format('Y-m-d') }}</td>

                                                <td> {{ $order->orders['name'] }}</td>
                                                <td> {{ $order->orders['user_email'] }}</td>
                                                <td> {{ $order->orders['payment_method'] }}</td>
                                                <td>{{ $order->products['product_name'] }}</td>
                                                <?php $total_amount = $order->products['product_price'] * $order->products['product_qty']?>
                                                <td>{{$total_amount }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/orders/' . $order->order_id.'/'.$order->order_product_id) }}"><button
                                                            class="btn btn-success">View
                                                            Details</button></a>
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

        </section>
        <!-- /.content -->
    </div>
@endsection
