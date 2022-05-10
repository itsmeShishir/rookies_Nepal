@extends('shop.layouts.master')
@section('content')
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
        <div class="feature-slider-two">
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
@endsection