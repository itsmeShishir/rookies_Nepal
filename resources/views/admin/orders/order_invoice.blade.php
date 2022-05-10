<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title text-center" style="margin-top: 10px;">
                <img src="{{asset('assets/images/logo/logo.png')}}" class="logo" style="width:300px">

            </div>

            <div class="invoice-title">
                <h2>Order Invoice:{{$adminOrdersDetails->id?:$adminOrdersDetails}}</h2>
                <hr>

            </div>


            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Billed To:</strong><br>
                        {{$adminOrdersDetails->name}} <br>
                        {{$adminOrdersDetails->address}} <br>
                        {{$adminOrdersDetails->phone}}<br>
                        {{$adminOrdersDetails->district}} <br>
                        {{$adminOrdersDetails->city}} <br>
                        {{$adminOrdersDetails->area}} <br>
                        
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Shipped To:</strong><br>
                        {{$adminOrdersDetails->name}} <br>
                        {{$adminOrdersDetails->address}} <br>
                        {{$adminOrdersDetails->phone}}<br>
                        {{$adminOrdersDetails->district}} <br>
                        {{$adminOrdersDetails->city}} <br>
                        {{$adminOrdersDetails->area}} <br>
                        
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        {{$adminOrdersDetails->payment_method}}<br>
                        <strong>Order Status:</strong><br>
                        {{$adminOrdersDetails->order_status}}
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        <br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><strong>Product Code</strong></td>
                                    <td class="text-center"><strong>Product Name</strong></td>
                                    <td class="text-center"><strong>Product Price</strong></td>
                                    <td class="text-right"><strong>Product Color</strong></td>
                                    <td class="text-center"><strong>Product Price</strong></td>
                                    <td class="text-center"><strong>Product Qty</strong></td>
                                    <td class="text-center"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)

                                    <tr>
                                        <td class="text-left">{{$product->code}}</td>
                                        <td class="text-center">{{$product->name}}</td>
                                        <td class="text-center">{{$product->price}}</td>
                                        <td class="text-center">{{$product->color}}</td>
                                        <td class="text-center"></td>
                                        <td class="text-center">2</td>
                                        <td class="text-center">PKR 700</td>
                                    </tr>
                                @endforeach




                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-center">PKR 700</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>Shipping Charges (+)</strong></td>
                                    <td class="no-line text-center">PKR 0</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>Coupon Discount (-)</strong></td>
                                    <td class="no-line text-center">PKR 150</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line text-center"><strong>Grand Total</strong></td>
                                    <td class="no-line text-center">550</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>