
<style>
   .qty{
    position: absolute;
    bottom: -3px;
    left: 0px;
    display: inline-block;
    width: 20px;
    height: 20px;
    color: #fff;
    background:#23A455;
    line-height: 20px;
    font-size: 12px;
    border-radius: 100%;
    text-align: center;
    font-weight: 700;
   }
   .wishlist{
    left: 13px;
   }
   .compare{
    left: 15px;
   }
   #topMenu{
       color:white;
   }
   #topMenu:hover{
       color: #146CDA;
   }
   @media only screen and (max-width:479px) {
    .qty{
        width: 15px;
        height: 15px;
        line-height: 15px;
        font-size: 10px;
        left: 1px
    }
}

.dropbtn {
 
  color: white;
  font-size: 12px;
  border: none;
  cursor: pointer;
  
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.dropdown:hover .dropdown-content {
  display: block;
}




</style>
<header class="header-wrapper">
      <!-- OffCanvas Wishlist Start -->
      <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <?php $wishCount =0; ?>
                    @foreach ($wishList as $key => $list)
                    <li>
                        <a href="/products/{{$list->product_id}}" class="image"><img src="{{asset('uploads/products/'.$list->product_image)}}"
                                alt="Wish List product Image"></a>
                        <div class="content">
                            <a href="/products/{{$list->product_id}}" class="title">{{$list->product_name}}</a>
                            <span class="quantity-price">Rs: {{$list->product_price}}</span></span>
                            <a href="{{url('/delete-wish-list-item/' . $list->id) }}" class="remove">×</a>
                        </div>
                        <?php $wishCount = $wishCount + 1 ?>
                    </li>
                   
                    @endforeach
                </ul>
            </div>
            <div class="foot">
                <div class="buttons" style="background-color:#23A455">
                    <a href="wishlist.html" class="btn btn-dark btn-hover-primary mt-30px" style="background-color:#23A455">view wishlist</a>
                </div>
            </div>
        </div>
         </div>
    <!-- OffCanvas Wishlist End -->

    <!-- OffCanvas Cart-Modal Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <?php $total_amount = 0; ?>
                    <?php $cartCount =0; ?>
                    @foreach ($cartItems as $key => $cart)
                        <li>
                            <a href="single-product.html" class="image"><img
                                    src="{{ asset('/uploads/products/' . $cart->image) }}" alt="Cart product Image">Cart</a>
                            <div class="content">
                                <a href="single-product.html" class="title">{{ $cart->product_name }}</a>
                                <span class="quantity-price">{{ $cart->product_quantity }} x <span class="amount">Rs :
                                        {{ $cart->product_price }}</span></span>
                                <a href="{{url('/delete-cart-item/' . $cart->id) }}" class="remove">×</a>
                            </div>
                            <?php $total_amount = $total_amount + $cart->product_price *
                            $cart->product_quantity; ?>
                            <?php $cartCount = $cartCount + 1 ?>
                        </li>
                    @endforeach


                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Subtotal :</strong>
                    <span class="amount">Rs : <?php echo $total_amount; ?></span>
                </div>
                <div class="buttons">
                    <a href="/cart" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="/checkout" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over Rs 10000 !</p>
            </div>
        </div>
    </div>
    <!-- Header Nav Start -->
    <div class="header-nav custom-navbar">
        <div class="container">
            <div class="header-nav-wrapper d-md-flex d-sm-flex d-xl-flex d-lg-flex justify-content-between header">
                <div class="header-static-nav navbar">
                    <div style="color: white;">
                        <i class="fa fa-mobile  fa-1x " style="color:#23A455" ></i> &nbsp;{{$headerDetails->phone}}&nbsp;&nbsp;
                    </div>
                    <div style="color:white;">
                        <i class="fa fa-envelope" style="color:#23A455"  aria-hidden="true"></i>&nbsp; {{$headerDetails->email}}
                    </div>
                </div>
                <div class="header-menu-nav" >
                    <ul class="menu-nav">
                        <li>
                        <a href="/rookiesadmin" id="topMenu" style="color:white" >
                            <i class="fa fa-users fa-1x" style="color:#23A455" ></i>
                            &nbsp; Vendor Login</a>
                        </li>
                        <li>
                            <div class="dropdown">
                            <a href="/contact-us" id="topMenu" style="color:white"> <i class="fa fa-phone " style="color:#23A455" ></i> &nbsp;Contact Us</a>

                                <ul class="dropdown-menu animation slideDownIn" style="color:white"
                                    aria-labelledby="dropdownMenuButton-2">
                                    <li><a href="#">EUR €</a></li>
                                    <li><a href="#">USD $</a></li>
                                </ul>
                            </div>
                        </li>
                        @if(!(Auth::check()))
                             <li class="pr-0">
                                  <a href="/login-register" id="topMenu" style="color:white;">
                                  <i class="fa fa-sign-in" aria-hidden="true" style="color:#23A455" ></i> &nbsp;Sign In
                                  </a>
                            </li>
                        @else
                        @if(Auth::user()->role == 3)
                        <li>
                        <div class="dropdown">
  <button class="dropbtn"><a href="/user-change-details" id="topMenu" style="color:white;">
                            <i class="fa fa-user-circle" aria-hidden="true" style="color:#23A455" ></i>  {{Auth::user()->name}}
                            </a></button>
  <div class="dropdown-content">
  <a href="/user-change-details" style="border-down: 1px solid black">Profile</a>
  <a href=" /user-orders">My Orders</a>
  <a href="/user-change-details">Login & Security</a>
  <a href="/user-change-details">Review</a>
  </div>
</div>

                            
                            
                        </li>

                        
                        <li><i class="fa fa fa-sign-out" aria-hidden="true" style="color:red"></i><a href="/user-logout" id="topMenu" style="color:white" >
                            Sign Out
                        </a></li>
                        @else
                        <li class="pr-0">
                            <a href="/login-register" id="topMenu" style="color:white;">
                            <i class="fa fa-sign-in" aria-hidden="true" style="color:#23A455" ></i> &nbsp;Sign In
                            </a>
                      </li>
                        @endif
                        
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Nav End -->
    <div class="header-top bg-white ptb-30px d-xl-block d-none sticky-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex">
                    <div class="mobile-menu-toggle home-2">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                    <div class="logo">
                        <a href="/"><img class="img-responsive" src="{{asset('assets/images/logo/logo.png')}}"
                            width="200px"    alt="logo.png" /></a>
                    </div>
                </div>
                <div class="col-md-9 align-self-center">
                    <div class="header-right-element d-flex">
                        <div class="search-element media-body mr-12px">
                            <form class="d-flex" action="/search" method="GET">
                                <div class="search-category">
                                    <select name="category">
                                        <option value="" selected disabled>All Categories</option>
                                        @foreach ($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @if (count($category->categories) != 0)
                                                @foreach ($category->categories as $key => $cat)
                                                    <option value="{{ $cat->id }}">---{{ $cat->name }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" name="keyword" placeholder="Enter your search key ... " />
                                <button ><i class="icon-magnifier"></i></button>
                            </form>
                        </div>
                        <!--Cart info Start -->
                       
                        
                        <div class="header-tools d-flex">
                            <div class="contact-link">
                                <div class="phone">
                                    <p>Call us:</p>
                                    <a href="tel:(+800)345678">{{$headerDetails->phone}}</a>
                                </div>
                            </div>
                            <div class="cart-info d-flex align-self-center">
                                <a href="#offcanvas-wishlist" class="heart offcanvas-toggle"><i
                                        class="icon-heart"><span class="qty wishlist"><?php echo $wishCount; ?></span></i></a>
                                <div class="trio-tooltip"><a href="#offcanvas-cart" class="bag offcanvas-toggle cart" ><i
                                        class="icon-bag"><span class="qty cart"><?php echo $cartCount; ?></span></i><span>Rs:<?php echo $total_amount; ?></span></a>
                                        <span class="tooltiptext">Cart</span>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <!--Cart info End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Nav End -->
    <!-- Mobile Header Nav Start -->
    <div class="mobile-header d-xl-none sticky-nav bg-white ptb-10px">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="/"><img class="img-responsive"
                             src="{{asset('assets/images/logo/logo.png')}}" alt="logo.png" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->
                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="cart-info d-flex align-self-center">
                            <a href="#offcanvas-wishlist" class="heart offcanvas-toggle"><i
                                    class="icon-heart"><span class="qty wishlist"><?php echo $wishCount; ?></span></i></a>
                            <a href="#offcanvas-cart" class="bag offcanvas-toggle" ><i
                                    class="icon-bag"><span class="qty cart"><?php echo $cartCount; ?></span></i><span>Rs:<?php echo $total_amount; ?></span></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->
            </div>
        </div>
    </div>
    <!--Mobile Header Nav End -->
     <!-- Search Category Start -->
     <div class="mobile-search-area d-xl-none mb-15px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-element media-body">
                        <form class="d-flex" action="/search" method="GET">
                            <div class="search-category">
                                <select name="category">
                                    <option value="" selected disabled>All Categories</option>
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @if (count($category->categories) != 0)
                                            @foreach ($category->categories as $key => $cat)
                                                <option value="{{ $cat->id }}">---{{ $cat->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" placeholder="Enter your search key ... " />
                            <button><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Category End -->
    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="head">
                <span class="title">&nbsp;</span>
                <button class="offcanvas-close">×</button>
            </div>
           
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="/index.php"><span class="menu-text">Home</span></a>
                    </li>
                    <li><a href="/about"><span class="menu-text">About us</span></a>
                    </li>
                    <li><a href="/policies"><span class="menu-text">Policy</span></a>
                    </li>
                    <li><a href="/terms-and-conditions"><span class="menu-text">Terms & Condition</span></a>
                    </li>
                    <li><a href="/terms-and-conditions"><span class="menu-text">Delivery  Area</span></a>
                    </li>
                 
                    
                    <li><a href="/contact-us">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="offcanvas-social mt-30px">
                <ul>
                <li>
                                        <a href="https://www.facebook.com/Rookies-Nepal-Pvt-Ltd-114649500240996/"><i class="icon-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/NepalRookies"><i class="icon-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/rookiesnepal/"><i class="icon-social-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="mailto:exclusive.intcon@gmail.com"><i class="icon-social-google"></i></a>
                                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->
   
</header>
