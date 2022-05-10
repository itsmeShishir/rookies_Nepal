@extends('admin.layouts.master')
@section('title', 'orders-details')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>

            </div>
            <div class="header-title">
                <h1>Orders Details {{ $orders->id }}</h1>
                <small>Orders Details</small>
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
                <div class="col-sm-6">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            Orders List
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">

                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Order Date </td>
                                            <td class="taskStatus"> {{ $orders->created_at->format('Y-m-d') }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Order Status </td>
                                            <td class="taskStatus"> {{ $orders->order_status }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Shipping Charges </td>
                                            <td class="taskStatus"> {{ $orders->shipping_charges }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Coupon Code </td>
                                            <td class="taskStatus"> {{ $orders->coupon_code }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Coupon Amount </td>
                                            <td class="taskStatus">{{ $orders->coupon_amount }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Payment Method </td>
                                            <td class="taskStatus"> {{ $orders->payment_method }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            Billing Address
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">

                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Name </td>
                                            <td class="taskStatus"> {{ $orders->name }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Address </td>
                                            <td class="taskStatus"> {{ $orders->address }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Phone </td>
                                            <td class="taskStatus"> {{ $orders->phone }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            User Details
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">

                                    <tbody>
                                        <tr>
                                            <td class="taskDesc"> Name</td>
                                            <td class="taskStatus"> {{ $userDetails->name }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Email </td>
                                            <td class="taskStatus"> {{ $userDetails->email }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            Shipping Status
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">

                                    <tbody>
                                        <form
                                        @if(Auth::user()->role ==1) 
                                        action="{{ url('/admin/update-order-status') }}"
                                        @else
                                        action="{{ url('/vendor/update-order-status') }}"
                                        @endif
                                        method="POST">
                                            {{ csrf_field() }}
                                            <tr>
                                                <input type="hidden" name="order_id" value="{{ $orders->id }}">
                                                <td>

                                                    <select id="inputGroupSelect01" class="btn btn-transparent btn-block"
                                                        name="status">
                                                        <option value="New" @if ($orders->order_status == 'New') selected
                                                            @endif>New</option>
                                                        <option value="Pending" @if ($orders->order_status == 'Pending') selected
                                                            @endif>Pending</option>
                                                        <option value="Inprocess" @if ($orders->order_status == 'Inprocess') selected
                                                            @endif>In Process</option>
                                                        <option value="Shipped" @if ($orders->order_status == 'Shipped') selected
                                                            @endif>Shipped</option>
                                                        <option value="Delivered" @if ($orders->order_status == 'Delivered') selected
                                                            @endif>Delivered</option>
                                                        <option value="Paid" @if ($orders->order_status == 'Paid') selected
                                                            @endif>Paid</option>

                                                    </select>

                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success btn-block">Update Status
                                                </td>
                                            </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            Shipping Address
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">

                                    <tbody>

                                        <tr>
                                            <td class="taskDesc"> Address </td>
                                            <td class="taskStatus"> {{ $shippingAddress->address }} </td>
                                        </tr>
                                        <tr>
                                            <td class="taskDesc"> Phone </td>
                                            <td class="taskStatus"> {{ $shippingAddress->phone }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            Ordered Products
                        </div>
                        <div class="panel-body">
                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->

                            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th>ORDER ID</th>
                                            <th>PRODUCT ID</th>
                                            <th>CODE</th>
                                            <th>NAME</th>
                                            <th>COLOR</th>
                                            <th>SIZE</th>
                                            <th>PRICE</th>
                                            <th>QUANTITY</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->products as $key => $product)
                                            <tr>
                                                <td>{{ $product->order_id }}</td>
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
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
