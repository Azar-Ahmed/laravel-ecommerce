
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="{{url('/admin/dashboard')}}" title="Ekka">
                <img class="ec-brand-icon" src="{{asset('admin_assets/img/logo/ec-site-logo.png')}}" alt="" />
                <span class="ec-brand-name text-truncate">E Commerce</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="active">
                    <a class="sidenav-item-link" href="{{url('/admin/dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>

                <!-- Vendors -->
                <li>
                    <a class="sidenav-item-link" href="{{url('admin/user')}}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Vendors</span>
                    </a>
                    {{-- <hr> --}}
                </li>

                <!-- Users -->
                <li>
                    <a class="sidenav-item-link" href="{{url('admin/user')}}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li>

                  <!-- Contact -->
                  <li>
                    <a class="sidenav-item-link" href="{{url('/admin/contact')}}">
                        <i class="mdi mdi-cellphone-settings"></i>
                        <span class="nav-text">Contact</span>
                    </a>
                    <hr>

                </li>

                <!-- Category -->
                <li>
                    <a class="sidenav-item-link" href="{{url('admin/category')}}">
                        <i class="mdi mdi-dns-outline"></i>
                        <span class="nav-text">Categories</span>
                    </a>
                    {{-- <hr> --}}
                </li>
                
                <li>
                    <a class="sidenav-item-link" href="{{url('admin/sub-category')}}">
                        <i class="mdi mdi-dns-outline"></i>
                        <span class="nav-text">Sub Categories</span>
                    </a>
                    <hr>
                </li>
                

                <!-- Products -->
                <li>
                    <a class="sidenav-item-link" href="{{url('/admin/product')}}">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Products</span>
                    </a>
                </li>

                <!-- Product Reviews -->
                <li>
                    <a class="sidenav-item-link" href="review-list.html">
                        <i class="mdi mdi-star-half"></i>
                        <span class="nav-text">Product Reviews</span>
                    </a>
                </li>

                <!-- Orders -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Orders</span> <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="new-order.html">
                                    <span class="nav-text">New Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-history.html">
                                    <span class="nav-text">Order History</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-detail.html">
                                    <span class="nav-text">Order Detail</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="invoice.html">
                                    <span class="nav-text">Invoice</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <hr>

                </li>

                

                 

                  <!-- Slider -->
                  <li>
                    <a class="sidenav-item-link" href="{{url('/admin/slider')}}">
                        <i class="mdi mdi-monitor-multiple"></i>
                        <span class="nav-text">Slider</span>
                    </a>
                    {{-- <hr> --}}
                </li>
                <!-- Brands -->
                <li>
                    <a class="sidenav-item-link" href="{{url('/admin/brand')}}">
                        <i class="mdi mdi-airballoon"></i>
                        <span class="nav-text">Brands</span>
                    </a>
                    {{-- <hr> --}}
                </li>
                 <!-- Color -->
                 <li>
                    <a class="sidenav-item-link" href="{{url('/admin/color')}}">
                        <i class="mdi mdi-tag-faces"></i>
                        <span class="nav-text">Color</span>
                    </a>
                    {{-- <hr> --}}
                </li>
                   <!-- size -->
                   <li>
                    <a class="sidenav-item-link" href="{{url('/admin/size')}}">
                        <i class="mdi mdi-yeast"></i>
                        <span class="nav-text">Size</span>
                    </a>
                    {{-- <hr> --}}
                </li>

            </ul>
        </div>
    </div>
</div>