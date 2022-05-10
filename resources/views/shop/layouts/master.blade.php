<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>Rookies Nepal Pvt Ltd </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon/favicon.png')}}" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap"
        rel="stylesheet" />
        <style>
        #cart:before 
        { content: '5'; 
        }
        </style>
    <!-- CSS
  ============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <!--   <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css"> -->

    <!-- Plugins CSS (All Plugins Files) -->
    <!--  <link rel="stylesheet" href="assets/css/plugins/animate.css">
        <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
        <link rel="stylesheet" href="assets/css/plugins/swiper.css"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
   
    <link rel="stylesheet" href={{ asset('/assets/css/vendor/vendor.min.css') }} />
    <link rel="stylesheet" href={{ asset('/assets/css/plugins/plugins.min.css') }} />
    <link rel="stylesheet" href={{ asset('/assets/css/style.min.css') }} />
    <link rel="stylesheet" href={{ asset('/assets/css/triocss.css') }} />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
</head>

<body>


    @include('shop.layouts.header')
    @yield('content')
    @include('shop.layouts.footer')


    

    <!-- ALL JS FILES -->
    <script src="{{ asset('front_assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('front_assets/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('front_assets/js/inewsticker.js') }}"></script>
    <script src="{{ asset('front_assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('front_assets/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('front_assets/js/baguetteBox.min.js') }}"></script> --}}
    <script src="{{ asset('front_assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('front_assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            var idSize = $("#selSize").val();
            var product_id = $("#id").val();

           
            $.ajax({
                    type: 'get',
                    url: '/get-product-stock',
                    data: {
                        idSize: idSize,
                    },
                    success: function(resp) {
                        if(resp >0 ){
                            $("#stock").text(resp);
                        }else{
                            $("#stock").text("Out of Stock");
                        }
                        
                    }
                })
            $("#selSize").change(function() {
                var idSize = $(this).val();
                var product_id = $("#id").val();

                if (idSize == "") {
                    return false;
                }
                $.ajax({
                    type: 'get',
                    url: '/get-product-price',
                    data: {
                        idSize: idSize,
                    },
                    success: function(resp) {

                        $("#getPrice").html("Rs : " + resp + "/-");
                        $("#product_price").val(resp);
                    },
                    error: function() {
                        alert("error");
                    }
                })
                $.ajax({
                    type: 'get',
                    url: '/get-product-stock',
                    data: {
                        idSize: idSize,
                        product_id : product_id
                    },
                    success: function(resp) {

                        $("#stock").text(resp);
                    },
                    error: function(err) {
                        alert("error");
                    }
                })
            })
            $("#billtoship").click(function() {
                if (this.checked) {
                    $("#shipping_name").val($("#billing_name").val());
                    $("#shipping_phone").val($("#billing_phone").val());
                    $("#shipping_address").val($("#billing_address").val());
                    $("#shipping_district").val($("#billing_district").val());
                    $("#shipping_city").val($("#billing_city").val());
                    $("#shipping_area").val($("#billing_area").val());
                } else {
                    $("#shipping_name").val('');
                    $("#shipping_phone").val("");
                    $("#shipping_address").val("");
                    $("#shipping_district").val("");
                    $("#shipping_city").val("");
                    $("#shipping_area").val("");
                }
            })
        })
        $('.carousel').carousel({
            interval: 2000
        })

    </script>
    <script></script>
    <script src="{{ asset('front_assets/js/choices.js') }}"></script>
    <script>
        const choices = new Choices('[data-trigger]', {
            searchEnabled: false,
            itemSelectText: '',
        });

        function selectPaymentMethod() {
            if ($('#cod').is(':checked') || $('#esewa').is(':checked')) {

            } else {
                alert('please choose payment method');
            }
        }

    </script>
    <!-- NEW TEMPLATE KO -->
  
    <script src="{{ asset('/assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('/assets/js/plugins/plugins.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="{{ asset('/assets/js/trio.js') }}"></script>
</body>

</html>
