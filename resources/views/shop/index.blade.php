<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- Mirrored from live.hasthemes.com/html/5/rozer-preview/rozer/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Aug 2020 05:32:22 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Rookies Pvt Ltd.</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.png" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap"
        rel="stylesheet" />

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
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/triocss.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->
</head>



<body>
    <!-- Header Section Start From Here -->
    @include('shop.layouts.header')
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
    <div class="header-menu  d-xl-block d-none bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 custom-col-3">
                    <div class="header-menu-vertical bg-blue">
                        <h4 class="menu-title be-af-none" style="background:#23A455";>All Cattegories</h4>
                        <ul class="menu-content display-block">
                            @foreach ($categories as $category)
                                <li class="menu-item">
                                <a href="/categories/{{$category->id}}">{{ $category->name }}
                                        @if (count($category->categories) != 0)
                                            <i class="ion-ios-arrow-right"></i>
                                        @endif
                                    </a>
                                    @if (count($category->categories) != 0)
                                        <ul class="sub-menu flex-wrap" style="width: 30vw">

                                            <li>

                                                <ul class="submenu-item" style="width: 20vw">
                                                    @foreach ($category->categories as $key => $subcat)
                                                <li><a href="/categories/{{$subcat->id}}">{{ $subcat->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <!-- menu content -->
                    </div>
                    <!-- header menu vertical -->
                </div>
                <div class="col-lg-7 custom-col custom-col-3">
                    <!-- Slider Start -->
                    <div class="slider-area slider-height-2">
                        <div class="hero-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($banners as $banner)
                                    <!-- Single Slider  -->
                                    
                                    <div onclick="window.open('{{$banner->link}}', '_blank')" class="swiper-slide bg-img d-flex"
                                        style="background-image: url(uploads/banners/{{ $banner->image }});background-size:100%;background-size:100% 100% !important">
                                        {{-- <div class="container align-self-center">
                                            <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                                                <span class="animated color-white">{{ $banner->name }}</span>
                                                <h1 class="animated color-white">
                                                    Pre-Order <br />
                                                    <strong>Exclusive</strong>
                                                </h1>
                                                <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </a>
                                @endforeach

                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination swiper-pagination-white"></div>
                        </div>
                    </div>
                    <!-- Slider End -->
                </div>
                <div class="col-lg-3">
                    <div class="banner-area banner-area-2" onclick="window.open('{{$sideBanner[0]->link}}', '_blank')">
                        <div class="banner-wrapper mb-15px">
                            <img src="{{ asset('/uploads/side-banners/' .$sideBanner[0]->image ) }}" alt="" />
                        </div>
                        <div class="banner-wrapper" onclick="window.open('{{$sideBanner[1]->link}}', '_blank')">
                            <img src="{{ asset('/uploads/side-banners/' .$sideBanner[1]->image ) }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
        <!-- Static Area Start -->
        <div class="static-area  ptb-40px">
            <div class="container">
                <div class="static-area-wrap">
                    <div class="row">
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Free Shipping</h4>
                                    <p>On all orders over Rs.1000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-2.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Free Returns</h4>
                                    <p>Returns are free within 9 days</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-sm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-4.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Support 24/7</h4>
                                    <p>Contact us 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-3.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>100 % Payment Security</h4>
                                    <p>Your payments are safe with us.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Area End -->
    </div>
    <!-- Header Section End Here -->

    <!-- Mobile Header Section Start -->
   

   
    <div class="mobile-category-nav d-xl-none mb-15px">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-12">

                    <!--=======  category menu  =======-->
                    <div class="hero-side-category">
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                <li class="menu-item-has-children menu-item-has-children-1">
                                    <a href="#">Accessories & Parts<i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-1">
                                        <li><a href="#">Cables & Adapters</a></li>
                                        <li><a href="#">Batteries</a></li>
                                        <li><a href="#">Chargers</a></li>
                                        <li><a href="#">Bags & Cases</a></li>
                                        <li><a href="#">Electronic Cigarettes</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-2">
                                    <a href="#">Camera & Photo<i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-2">
                                        <li><a href="#">Digital Cameras</a></li>
                                        <li><a href="#">Camcorders</a></li>
                                        <li><a href="#">Camera Drones</a></li>
                                        <li><a href="#">Action Cameras</a></li>
                                        <li><a href="#">Photo Studio Supplies</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-3">
                                    <a href="#">Smart Electronics <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-3">
                                        <li><a href="#">Wearable Devices</a></li>
                                        <li><a href="#">Smart Home Appliances</a></li>
                                        <li><a href="#">Smart Remote Controls</a></li>
                                        <li><a href="#">Smart Watches</a></li>
                                        <li><a href="#">Smart Wristbands</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-4">
                                    <a href="#">Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-4">
                                        <li><a href="#">Televisions</a></li>
                                        <li><a href="#">TV Receivers</a></li>
                                        <li><a href="#">Projectors</a></li>
                                        <li><a href="#">Audio Amplifier Boards</a></li>
                                        <li><a href="#">TV Sticks</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-5">
                                    <a href="#">Portable Audio & Video <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-5">
                                        <li><a href="#">Headphones</a></li>
                                        <li><a href="#">Speakers</a></li>
                                        <li><a href="#">MP3 Players</a></li>
                                        <li><a href="#">VR/AR Devices</a></li>
                                        <li><a href="#">Microphones</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children menu-item-has-children-6">
                                    <a href="#">Video Game <i class="ion-ios-arrow-down"></i></a>
                                    <!-- category submenu -->
                                    <ul class="category-mega-menu category-mega-menu-6">
                                        <li><a href="#">Handheld Game Players</a></li>
                                        <li><a href="#">Game Controllers</a></li>
                                        <li><a href="#">Joysticks</a></li>
                                        <li><a href="#">Stickers</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Televisions</a></li>
                                <li><a href="#">Digital Cameras</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Wearable Devices</a></li>
                                <li><a href="#">Smart Watches</a></li>
                                <li><a href="#">Game Controllers</a></li>
                                <li><a href="#"> Smart Home Appliances</a></li>
                                <li class="hidden"><a href="#">Projectors</a></li>
                                <li>
                                    <a href="#" id="more-btn"><i class="ion-ios-plus-empty" aria-hidden="true"></i> More
                                        Categories</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!--=======  End of category menu =======-->
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">

                    <!--=======  category menu  =======-->
                    <div class="hero-side-category">
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu">

                            <ul>
                                @foreach ($categories as $key => $category)
                                    <li class="menu-item-has-children menu-item-has-children-{{ $key }}">
                                    <a href="/categories/{{$category->id}}">{{ $category->name }}
                                            @if (count($category->categories) != 0)
                                                <i class="ion-ios-arrow-right"></i>
                                            @endif
                                        </a>
                                        <!-- category submenu -->
                                        <ul class="category-mega-menu category-mega-menu-{{ $key }}">
                                            @foreach ($category->categories as $key => $subcat)
                                        <li><a href="/categories/{{$subcat->id}}">{{ $subcat->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <!--=======  End of category menu =======-->
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->
   
    <!-- OffCanvas Cart End -->

  

    <div class="offcanvas-overlay"></div>


    <!-- Header Nav End -->
    <div class="header-menu  d-xl-none bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Slider Start -->
                    <div class="slider-area slider-height-2 mb-md-30px mb-lm-30px mb-sm-30px">
                        <div class="hero-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($banners as $banner)
                                    <!-- Single Slider  -->
                                    <div class="swiper-slide bg-img d-flex"
                                        style="background-image: url(uploads/banners/{{ $banner->image }});">
                                        {{-- <div class="container align-self-center">
                                            <div class="slider-content-1 slider-animated-1 text-left pl-60px">
                                                <span class="animated color-white">{{ $banner->name }}</span>
                                                <h1 class="animated color-white">
                                                    Pre-Order <br />
                                                    <strong>Exclusive</strong>
                                                </h1>
                                                <a href="shop-4-column.html" class="shop-btn animated">SHOP NOW</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination swiper-pagination-white"></div>
                        </div>
                    </div>
                    <!-- Slider End -->
                </div>
                <div class="col-lg-3">
                    <div class="banner-area">
                        <div class="banner-wrapper mb-md-30px mb-lm-30px mb-sm-30px">
                            <a href="shop-4-column.html"><img src="{{ asset('/uploads/side-banners/' .$sideBanner[0]->image ) }}" alt="" /></a>
                        </div>
                        <div class="banner-wrapper mb-0px">
                            <a href="shop-4-column.html"><img src="{{ asset('/uploads/side-banners/' .$sideBanner[1]->image ) }}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
        <!-- Static Area Start -->
        <div class="static-area  ptb-40px">
            <div class="container">
                <div class="static-area-wrap">
                    <div class="row">
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Free Shipping</h4>
                                    <p>On all orders over 1000</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-2.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Free Returns</h4>
                                    <p>Returns are free within 9 days</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-sm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-4.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Support 24/7</h4>
                                    <p>Contact us 24 hours a day</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-3.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>100% Payment Security</h4>
                                    <p>Your payment is safe with us.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Area End -->
    </div>
    <!-- header menu -->
      <!-- Feature Area start -->
      <div class="feature-area single-product-responsive mt-60px mb-30px" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">Daily Deals</h2>
                    </div>
                </div>
            </div>
            <div class="feature-slider-two slider-nav-style-1">
                <div class="feature-slider-wrapper swiper-wrapper">
                    <!-- Single Item -->
                    @foreach ($dayDealProducts as $key => $product)
                        <div class="feature-slider-item swiper-slide">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="/products/{{$product->id}}" class="thumbnail">
                                        <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />
                                        <img class="second-img" src="{{ asset('/uploads/products/' . $product->image) }}" alt="" />
                                    </a>
                                    {{-- <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                            data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-magnifier icons"></i>
                                        </a>
                                    </div> --}}
                                </div>
                                <ul class="product-flag">
                                    <li class="new">New</li>
                                </ul>
                                <div class="product-decs">
                                    <a class="inner-link" href="shop-4-column.html"><span>{{ $product->code }}</span></a>
                                    <h2><a href="single-product.html" class="product-link">{{ $product->name }}</a>
                                    </h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="">
                                        <ul>
                                            <li class="old-price not-cut">Rs:{{ $product->price }}</li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- <div class="add-to-link">
                                    <ul>
                                        <li class="cart"><a class="cart-btn" href="#">ADD TO CART </a></li>
                                        
                                      
                                      
                                        <li>
                                        
                                            <a href="wishlist.html"><i class="icon-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="compare.html"><i class="icon-shuffle"></i></a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </article>
                        </div>
                    @endforeach


                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Area End -->
    <!-- New Arrivals area start -->
    <div class="recent-add-area mt-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="recent-slider-wrapper" style="display: flex;flex-wrap:wrap;">
                    @foreach ($products as $key => $product)
                    
                        <div class="col-lg-3 mb-5"> 
                            <article class="list-product">
                                <a href="/products/{{ $product->id }}">
                                <div class="img-block">
                                    <a href="{{ url('/products/' . $product->id) }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />

                                    </a>
                                    {{-- <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                            data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-magnifier icons"></i>
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link"
                                        href="/products/{{ $product->id }}"><span>{{ $product->name }}</span></a>
                                    <h2><a href="/products/{{ $product->id }}"
                                            class="product-link">Code : {{ $product->code }}</a>
                                    </h2>
                                    <div class="rating-product">
                                        <a href="/products/{{ $product->id }}">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        </a>
                                    </div>
                                    <div class="pricing-meta">
                                        <a href="/products/{{ $product->id }}">
                                        <ul>
                                            @if($product->discounted_price >0 )
                                                <li class="old-price">Rs : {{ $product->price }}</li>
                                                <li class="current-price">Rs :{{$product->discounted_price}}</li>
                                            @else
                                                <li class="current-price">Rs : {{ $product->price }}</li>
                                            @endif
                                        </ul>
                                        </a>
                                    </div>
                                </div>
                            </a>
                            </article> 
                        </div>
                       
                    @endforeach
                </div>
                <div style="float:right;">
                    {{ $products->links() }}
                </div>
                <!-- Add Arrows -->

            </div>
        </div>
    </div>
    <!-- New Arrivals area end -->
    <!-- Feature Area start -->
    <div class="feature-area mt-60px mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">Featured Products</h2>
                    </div>
                </div>
            </div>
            <div class="feature-slider-two slider-nav-style-1 single-product-responsive">
                <div class="feature-slider-wrapper swiper-wrapper">
                    <!-- Single Item -->
                    @foreach ($featuredProducts as $key => $product)
                        <div class="feature-slider-item swiper-slide">
                            <article class="list-product">
                                <a href="{{ url('/products/' . $product->id) }}">
                                    <div class="img-block">

                                        <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />


                                    </div>

                                    <div class="product-decs">
                                        <span>{{ $product->name }}</span>
                                        <h2><a href="/products/{{ $product->id }}"
                                                class="product-link">{{ $product->code }}</a>
                                        </h2>

                                        <div class="">
                                            <ul>
                                                <li class="old-price not-cut">Rs : {{ $product->price }}</li>

                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach


                </div>
                <!-- Add Arrows -->
                <div class="swiper-buttons">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Area End -->
    <!-- Banner Area Start -->
    <div class="banner-area mt-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-wrapper">
                        <a href="/{{$sideBanner[2]->link}}" target="_blank"><img src="{{ asset('/uploads/side-banners/' .$sideBanner[2]->image ) }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Banner Area Start -->
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="banner-wrapper">
                        <a href="/{{$sideBanner[3]->link}}" target="_blank"><img src="{{ asset('/uploads/side-banners/' .$sideBanner[3]->image ) }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="banner-wrapper">
                        <a href="/{{$sideBanner[4]->link}}" target="_blank"><img src="{{ asset('/uploads/side-banners/' .$sideBanner[4]->image ) }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->


    <!-- Recently added area start -->
    <div class="recent-add-area mt-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">Recently added</h2>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="recent-slider-wrapper" style="display: flex;flex-wrap:wrap;">
                    @foreach ($recentProducts as $key => $product)
                     <a href="/products/{{ $product->id }}"> 
                        <div class="col-lg-3 mb-5"> 
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="/products/{{ $product->id }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />

                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                            data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-magnifier icons"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-decs">
                                    <a class="inner-link"
                                        href="/products/{{ $product->id }}"><span>{{ $product->name }}</span></a>
                                    <h2><a href="/products/{{ $product->id }}"
                                            class="product-link">{{ $product->code }}</a>
                                    </h2>
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <div class="pricing-meta">
                                        <ul>
                                            <li class="current-price">Rs : {{ $product->price }}</li>
                                            {{-- <li class="discount-price">-10%</li>
                                            --}}
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div><a>
                    @endforeach
                </div>
                <!-- Add Arrows -->

            </div>
        </div>
    </div>
    <!-- New Arrivals area end -->

   @include('shop.layouts.brands')
    <!-- Footer Area Start -->
    @include('shop.layouts.footer')
    <!-- Footer Area End -->
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12 mb-lm-100px mb-sm-30px">
                            <!-- Swiper -->
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/11.jpg"
                                            alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/12.jpg"
                                            alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/13.jpg"
                                            alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/14.jpg"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/11.jpg"
                                            alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/12.jpg"
                                            alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/13.jpg"
                                            alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto" src="assets/images/product-image/14.jpg"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Originals Kaval Windbr</h2>
                                <p class="reference">Reference:<span> demo_17</span></p>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">€18.90</li>
                                    </ul>
                                </div>
                                <p class="quickview-para">Lorem ipsum dolor sit amet, consectetur adipisic elit eiusm
                                    tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim venialo quis
                                    nostrud exercitation ullamco</p>
                                <div class="pro-details-size-color">
                                    <div class="pro-details-color-wrap">
                                        <span>Color</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="blue"></li>
                                                <li class="maroon active"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
                                    </div>
                                </div>
                                <div class="pro-details-wish-com">
                                    <div class="pro-details-wishlist">
                                        <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>Add to
                                            wishlist</a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="compare.html"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- GetButton.io widget -->

<!-- /GetButton.io widget -->
    <!-- Modal end -->
    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <!-- <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script> -->

    <!-- Plugins JS -->
    <!-- <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/swiper.min.js"></script>
        <script src="assets/js/plugins/countdown.js"></script>
        <script src="assets/js/plugins/scrollup.js"></script>
        <script src="assets/js/plugins/elevateZoom.js"></script> -->
    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main Activation JS -->
    <script src="assets/js/main.js"></script>
    <script>
       function adRedirect()) {
         alert("hello");
    }
    </script>   
</body>

<!-- Mirrored from live.hasthemes.com/html/5/rozer-preview/rozer/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Aug 2020 05:32:59 GMT -->

</html>
