@extends('shop.layouts.master')
@section('content')
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
                
                   
                       
                            <div class="col-md-12">
                                <div class="section-title">
                                <h2 class="section-heading">Categories > {{$categoryname}}</h2>
                                </div>
                            </div>
                        
                        <div class="">
                            <div class="recent-slider-wrapper" style="display: flex;flex-wrap:wrap;">
                                @foreach ($products as $key => $product)
                                    <div class="col-lg-3 mb-5">
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
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
            
                        </div>
                   
                
                <!-- Slider End -->
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
                            <img src="{{asset('assets/images/icons/static-icons-1.png')}}" alt="" class="img-responsive" />
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
                            <img src="{{asset('assets/images/icons/static-icons-2.png')}}" alt="" class="img-responsive" />
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
                            <img src="{{asset('assets/images/icons/static-icons-4.png')}}" alt="" class="img-responsive" />
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
                            <img src="{{asset('assets/images/icons/static-icons-3.png')}}" alt="" class="img-responsive" />
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

@endsection
