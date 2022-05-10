@extends('shop.layouts.master')
@section('content')
<style>
    .small{
        width: 260px;
    }
    @media (max-width:524px){
        .small{
            width:175px;
        }
    }
</style>
 <!-- Search Product start -->
 <div class="header-menu  d-xl-block d-none bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 custom-col-3">
                <div class="header-menu-vertical bg-blue">
                    <h4 class="menu-title be-af-none">All Cattegories</h4>
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
            <div class="col-lg-9 custom-col custom-col-3">
                <!-- Slider Start -->
                <div class="slider-area slider-height-2">
                    <div class="hero-slider swiper-container">
                        <div class="recent-add-area mt-30px">
                            <div class="container">
                                <div class="mb-3">Total Search Result {{$searchCount}}</div>
                                <div class="">
                                    
                                    <div class="recent-slider-wrapper" style="display: flex;flex-wrap:wrap;">
                                        @if($searchCount > 0)
                                       
                                        @foreach ($searchData as $key => $product)
                                        
                                            <div class="col-lg-3 mb-5"><a href="/products/{{ $product->id }}"> 
                                                <article class="list-product">
                                                    <div class="img-block">
                                                        <a href="{{ url('/products/' . $product->id) }}" class="thumbnail">
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
                                                </article> </a>
                                            </div>
                                       
                                        @endforeach
                                        @else
                                        <div class="no-data-search">
                                            <img src="{{asset('assets/images/no_data.png')}}"/>
                                        </div>
                                        @endif
                                    </div>
                                   
                                    <!-- Add Arrows -->
                        
                                </div>
                               
                            </div>
                        </div>
                        <!-- Add Pagination -->
                    </div>
                </div>
                <!-- Slider End -->
            </div>
           
        </div>
    </div><div style="float:right;margin-right-2vw;">{{$searchData->links()}}</div>
        <!-- row -->
    </div>
    <!-- container -->
    <div class="header-menu  d-xl-none bg-light-gray">
        <div class="container">
            <div class="row">
                @foreach ($searchData as $key => $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-5 small">
                        <a href="/products/{{ $product->id }}"> 
                        <article class="list-product">
                            <div class="img-block">
                                <a href="{{ url('/products/' . $product->id) }}" class="thumbnail">
                                    <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"alt="" />
                                </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#"              data-link-action="quickview" title="Quick view"
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
                                                </ul>
                                            </div>
                            </div>
                                
                        </article>
                         </a>
                    </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{$searchData->links()}}
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
        <!-- Static Area Start -->
        {{-- <div class="static-area  ptb-40px">
            <div class="container">
                <div class="static-area-wrap">
                    <div class="row">
                        <!-- Static Single Item Start -->
                        <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                            <div class="single-static">
                                <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                                <div class="single-static-meta">
                                    <h4>Free Shipping</h4>
                                    <p>On all orders over $75.00</p>
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
                                    <h4>100% Payment Secure</h4>
                                    <p>Your payment are safe with us.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Static Single Item End -->
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Static Area End -->
    </div>
    <!-- Static Area Start -->
    <div class="static-area  ptb-40px" style="margin-top:12vh">
        <div class="container">
            <div class="static-area-wrap">
                <div class="row">
                    <!-- Static Single Item Start -->
                    <div class="col-lg-3 col-xs-12 col-md-6 col-sm-6 mb-md-30px mb-lm-30px">
                        <div class="single-static">
                            <img src="assets/images/icons/static-icons-1.png" alt="" class="img-responsive" />
                            <div class="single-static-meta">
                                <h4>Free Shipping</h4>
                                <p>On all orders over $75.00</p>
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
                                <h4>100% Payment Secure</h4>
                                <p>Your payment are safe with us.</p>
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
 <!-- Header Nav End -->

<!-- header menu -->
 
<!-- Search Product Ends -->
@endsection