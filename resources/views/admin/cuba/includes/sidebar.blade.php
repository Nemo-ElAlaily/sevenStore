<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="#" data-bs-original-title="" title="">
                <img class="img-fluid for-light" src="{{asset('admins/cuba/assets/images/logo/logo.png')}}" alt="">
                <img class="img-fluid for-dark" src="{{asset('admins/cuba/assets/images/logo/logo_dark.png')}}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar" checked="checked">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid status_toggle middle sidebar-toggle">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="" data-bs-original-title="" title="">
                <img class="img-fluid" src="{{asset('admins/cuba/assets/images/logo/logo-icon.png')}}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow disabled" id="left-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">

                                        <li class="back-btn">
                                            <a href="#" data-bs-original-title="" title="">
                                                <img class="img-fluid" src="{{asset('admins/cuba/assets/images/logo/logo-icon.png')}}" alt="">
                                            </a>
                                            <div class="mobile-back text-end">
                                                <span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                                            </div>
                                        </li>

                                        <li class="sidebar-main-title">
                                            <div>
                                                <h6 class="lan-1">
                                                    <i class="fa fa-home fa-lg"></i>
                                                    Dashboard
                                                </h6>
                                            </div>
                                        </li>

                                        @if (auth()->user()->hasPermission('users_read'))
                                            <li class="sidebar-list">
                                                <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.users.index') }}" data-bs-original-title="" title="">
                                                    <i class="nav-icon fa fa-users"></i>
                                                    <span>Users</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if (auth()->user()->hasPermission('vendors_read'))
                                            <li class="sidebar-list">
                                                <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.vendors.index') }}" data-bs-original-title="" title="">
                                                    <i class="nav-icon fa fa-user-plus"></i>
                                                    <span>Vendors</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if (auth()->user()->hasPermission('products_read'))
                                            <li class="sidebar-list">
                                                <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.products.index') }}" data-bs-original-title="" title="">
                                                    <i class="nav-icon fa fa-product-hunt"></i>
                                                    <span>Products</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if (auth()->user()->hasPermission('main_categories_read'))
                                            <li class="sidebar-list">
                                                <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.main_categories.index') }}" data-bs-original-title="" title="">
                                                    <i class="nav-icon fa fa-puzzle-piece"></i>
                                                    <span>Main Categories</span>
                                                </a>
                                            </li>
                                        @endif

                                        @if (auth()->user()->hasPermission('orders_read'))
                                            <li class="sidebar-list">
                                                <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.orders.index') }}" data-bs-original-title="" title="">
                                                    <i class="nav-icon fa fa-sort"></i>
                                                    <span>Orders</span>
                                                </a>
                                            </li>
                                        @endif

                                        <li class="sidebar-main-title mt-5">
                                            <div>
                                                <h6 class="lan-1">Site Settings </h6>
                                                <p class="lan-2">General,Social &amp; Database.</p>
                                            </div>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.site.show', 1) }}" data-bs-original-title="" title="">
                                                <i class="fa fa-wrench nav-icon"></i>
                                                <span>General Settings</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.social.show') }}" data-bs-original-title="" title="">
                                                <i class="fa fa-bullhorn nav-icon"></i>
                                                <span>Social Settings</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-list">
                                            <a class="sidebar-link sidebar-title link-nav " href="{{ route('admin.database.show' , 1) }}" data-bs-original-title="" title="">
                                                <i class="fa fa-database nav-icon"></i>
                                                <span>Database Settings</span>
                                            </a>
                                        </li>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 2508px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar" style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>

        </nav>
    </div>
</div>
