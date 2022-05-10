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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">Home > Single Products > {{ $product->name }}</div>
        </div>
    </div>
    <section class="product-details-area mtb-60px">
        <div class="container">
            <div class="row">
                {{-- <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-img product-details-tab">
                        <div class="zoompro-wrap zoompro-2">
                            <div class="zoompro-border zoompro-span" style="width: 300px;margin-left:8vw;">
                                <img class="" width="10px" src="{{ asset('uploads/products/' . $product->image) }}">
                            </div>
                        </div>
                        <div id="gallery" class="product-dec-slider-2 swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($productImages as $key => $image)
                                    <div class="swiper-slide">
                                        <a data-image="{{ asset('uploads/products/' . $image->image) }}"
                                            data-zoom-image="{{ asset('uploads/products/' . $image->image) }}">
                                            <img class="img-responsive"
                                                src="{{ asset('uploads/products/' . $image->image) }}" alt="" />
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-img product-details-tab">
                        <div class="zoompro-wrap zoompro-2">
                            <div class="zoompro-border zoompro-span image-div">
                                <img id="product-image" class="zoompro"
                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                    data-zoom-image="{{ asset('uploads/products/' . $product->image) }}" alt="" />
                            </div>
                        </div>
                        <div id="gallery" class="product-dec-slider-2 swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($productImages as $key => $image)
                                    <div class="swiper-slide">
                                        <a data-image="{{ asset('uploads/products/' . $image->image) }}"
                                            data-zoom-image="{{ asset('uploads/products/' . $image->image) }}">
                                            <img class="img-responsive"
                                                src="{{ asset('uploads/products/' . $image->image) }}" alt="" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="product-details-content">
                        <h2>{{ $product->name }}</h2>
                        <p class="reference">Code:<span> {{ $product->code }}</span></p>
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
                        <form method="POST" action="{{ url('/add-to-cart') }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $product->id }}" name="product_id" id="id">
                            <input type="hidden" value="{{ $product->user_id }}" name="product_owner_id">
                            <input type="hidden" value="{{ $product->name }}" name="product_name">
                            <input type="hidden" value="{{ $product->has_tax }}" name="has_tax">
                            <input type="hidden" value="{{ $product->code }}" name="product_code">
                            <input type="hidden" value="{{ $product->color }}" name="product_color">
                            <input type="hidden" value="{{ $product->price }}" id="product_price" name="product_price">
                            <input type="hidden" value="" id="user_email" name="user_email">
                            <input type="hidden" value="" id="session_id" name="session_id">
                            <div class="pricing-meta">
                                <ul>
                                    <li class="old-price not-cut" id="getPrice">Rs : {{ $product->price }} /-</li>

                                </ul>
                                @if ($product->has_attribute == 1)
                                    <select name="product_size" id="selSize" class=" show-tiick form-control">
                                        <option value="0">Size</option>
                                        @foreach ($product->attributes as $key => $sizes)
                                            <option
                                                value="{{ $sizes->id }}--{{ $product->id }}--{{ $sizes->size }}"
                                                {{ $key == 0 ? 'selected' : '' }}><span
                                                    class="menu">{{ $sizes->size }}</span>
                                            </option>

                                        @endforeach
                                    </select>

                                    <p class="reference">In Stock:<span id="stock"> </span></p>
                                @else
                                    <input type="hidden" name="product_size" value="0--{{ $product->id }}--std" />
                                    <p class="reference">In Stock: {{ $product->stock }}</p>
                                @endif
                            </div>

                            <div class="pro-details-list">
                                <p>{!! $product->detail !!}</p>
                            </div>

                            <div class="pro-details-quality mt-0px">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="number" name="product_quantity" value="1" />
                                </div>
                                <div class="pro-details-cart btn-hover">
                                    <a> <button style="color:white;" name="action" value="add-to-cart" type="submit">Add To
                                            Cart</button></a>
                                    <a> <button style="color:white;" name="action" value="buy-now" type="submit">Buy
                                            Now</button></a>

                                </div>
                            </div>
                        </form>
                        <div class="pro-details-wish-com">
                            <div class="pro-details-wishlist">
                                <form action="{{ url('/add-to-wishlist/' . $product->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="name" value="{{ $product->name }}" />
                                    <input type="hidden" name="price" value="{{ $product->price }}" />
                                    <input type="hidden" name="image" value="{{ $product->image }}" />
                                    <button><i class="icon-heart"></i>Add to wishlist</a></button>
                                </form>
                            </div>
                        </div>
                        <div class="pro-details-social-info">
                            <span>Share</span>
                            <div class="social-info">
                                <ul>
                                    <li>
                                        <a title="Facebook" href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a title="Twitter" href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a title="Google+" href="#"><i class="ion-social-google"></i></a>
                                    </li>
                                    <li>
                                        <a title="Instagram" href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="pro-details-policy">
                            <ul>

                                <li><img src="{{ asset('assets/images/icons/policy-2.png') }}" alt="" /><span>Delivery
                                        Policy (Edit
                                        With Customer Reassurance Module)</span></li>
                                <li><img src="{{ asset('assets/images/icons/policy-3.png') }}" alt="" /><span>Return
                                        Policy
                                        (Edit With
                                        Customer Reassurance Module)</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop details Area End -->
    <!-- product details description area start -->
    <div class="description-review-area mb-60px">
        <div class="container">
            <div class="description-review-wrapper">
                <div class="description-review-topbar nav">
                    <a data-toggle="tab" href="#des-details1">Description</a>
                    <a class="active" data-toggle="tab" href="#des-details2">Product Details</a>
                    <a data-toggle="tab" href="#des-details3">Reviews (2)</a>
                </div>
                <div class="tab-content description-review-bottom">
                    <div id="des-details2" class="tab-pane active">
                        <div class="product-anotherinfo-wrapper">
                            {!! $product->detail !!}
                        </div>
                    </div>
                    <div id="des-details1" class="tab-pane">
                        <div class="product-description-wrapper">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="row">
                            <div class="col-lg-7">
                                @foreach ($reviews as $key => $review)
                                    <div class="review-wrapper">
                                        <div class="single-review">
                                            {{-- <div class="review-img">
                                                <img src="{{ asset('assets/images/review-image/1.png') }}" alt="" />
                                            </div> --}}
                                            <div class="review-content">
                                                <div class="review-top-wrap">
                                                    <div class="review-left">
                                                        <div class="review-name">
                                                            <h4>{{ $review->name }} ({{ $review->email }})</h4><br>
                                                            <div class="rating-product">
                                                                @for ($x = 0; $x < $review->rating; $x++)
                                                                    <i class="ion-android-star"></i>
                                                                @endfor
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-bottom">
                                                    <p>
                                                        {{ $review->message }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Add a Review</h3>
                                    <div class="ratting-form">
                                        <form action="/review-add" method="POST">{{ csrf_field() }}
                                            <div class="star-box">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                <span>Your rating:</span>
                                                <div class="rating-product">
                                                    <input type="range" min="0" max="5" value="1" name="rating" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="rating-form-style mb-10">
                                                        <input placeholder="Name" type="text" name="name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="rating-form-style mb-10">
                                                        <input placeholder="Email" type="email" name="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="message" placeholder="Message"></textarea>
                                                        <input type="submit" value="Submit" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product details description area end -->
    <!-- Feature Area start -->
    <div class="feature-area single-product-responsive mt-60px mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">You Might Also Like</h2>
                    </div>
                </div>
            </div>
            <div class="feature-slider-two slider-nav-style-1">
                <div class="feature-slider-wrapper swiper-wrapper">
                    <!-- Single Item -->
                    @foreach ($featuredProducts as $key => $product)
                        <div class="feature-slider-item swiper-slide">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="/products/{{ $product->id }}" class="thumbnail">
                                        <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />
                                        <img class="second-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />
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
    <!-- Feature Area start -->
    <div class="feature-area single-product-responsive  mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="section-heading">16 Other Products In The Same Category:</h2>
                    </div>
                </div>
            </div>
            <div class="feature-slider-two slider-nav-style-1">
                <div class="feature-slider-wrapper swiper-wrapper">
                    <!-- Single Item -->
                    @foreach ($featuredProducts as $key => $product)
                        <div class="feature-slider-item swiper-slide">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.html" class="thumbnail">
                                        <img class="first-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />
                                        <img class="second-img" src="{{ asset('/uploads/products/' . $product->image) }}"
                                            alt="" />
                                    </a>
                                    <div class="quick-view">
                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view"
                                            data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-magnifier icons"></i>
                                        </a>
                                    </div>
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

    <!-- Modal -->

    <div class="product-image-view" id="product-image-view">

        <div class="image-view-div">
            <img id="view-image" src="https://cdn.pixabay.com/photo/2018/03/28/00/31/winter-3267925_960_720.jpg" />
        </div>
        <div class="close" id="close-preview">X</div>
    </div>


@endsection
