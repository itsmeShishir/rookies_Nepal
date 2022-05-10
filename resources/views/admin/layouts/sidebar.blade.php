<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            @if (Auth::user()->role == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-product-hunt"></i><span>Description</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{ url('/admin/header-details') }}">Header Detail</a></li>

                        <li><a href="{{ url('/admin/about-us') }}">About us</a></li>
                        <li><a href="{{ url('/admin/policies') }}">Policy</a></li>
                        <li><a href="{{ url('/admin/delivery-area') }}">Delivery Area</a></li>
                        <li><a href="{{ url('/admin/terms-and-conditions') }}">Terms & Condition</a></li>
                        <li><a href="{{ url('/admin/faq') }}">FAQ</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="/admin/pages">
                        <i class="fa fa-product-hunt"></i><span>Pages</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i><span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
                        <li><a href="{{ url('/admin/view-categories') }}">View Category</a></li>
                    </ul>
                </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i><span>Product</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{ url('/admin/add-product') }}">Add Product</a></li>
                    <li><a href="{{ url('/admin/view-products') }}">View Product</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gift"></i><span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{ url('/admin/add-coupons') }}">Add Coupons</a></li>
                    <li><a href="{{ url('/admin/view-coupons') }}">View Coupons</a></li>
                </ul>
            </li>
            @if (Auth::user()->role == 1)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i><span>Advertisement</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{ url('/admin/banners') }}">Banners</a></li>
                        <li><a href="{{ url('/admin/side-banners') }}">Side-Banner</a></li>
                        <li><a href="{{ url('/admin/brands') }}">Brands</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/orders') }}">
                        <i class="pe-7s-cart"></i><span>Orders</span>
                        <span class="pull-right-container">
                            {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                        </span>
                    </a>

                </li>
            @else
                <li class="treeview">
                    <a href="{{ url('/vendor/orders') }}">
                        <i class="pe-7s-cart"></i><span>Orders</span>
                        <span class="pull-right-container">
                            {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                        </span>
                    </a>

                </li>
            @endif

            @if (Auth::user()->role == 1)
                <li class="treeview">
                    <a href="{{ url('/admin/vendors') }}">
                        <i class="fa fa-user-plus" aria-hidden="true"></i><span>Vendors</span>
                        <span class="pull-right-container">

                        </span>
                    </a>

                </li>
            @endif
            @if (Auth::user()->role == 1)
                <li class="treeview">
                    <a href="{{ url('/admin/registered-users') }}">
                        <i class="pe-7s-user"></i><span>Registerd Users</span>
                        <span class="pull-right-container">

                        </span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/feedbacks') }}">
                        <i class="pe-7s-comment"></i><span>Feedbacks</span>
                        <span class="pull-right-container">

                        </span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="{{ url('/admin/newsletters') }}">
                        <i class="fa fa-envelope"></i><span>Newsletters</span>
                        <span class="pull-right-container">
                            {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                        </span>
                    </a>

                </li>
            @endif

        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
<!-- =============================================== -->
