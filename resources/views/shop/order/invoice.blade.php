<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
               

            </div>


        </div>
        <!-- Main content -->
        <section class="content">
            <h2>Order Invoice : {{ $orders->id }}</h2>
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
                                        <tr>
                                            <td class="taskDesc"> Grand Total </td>
                                            <td class="taskStatus"> Rs : {{ $orders->grand_total }} </td>
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
</body>

</html>
