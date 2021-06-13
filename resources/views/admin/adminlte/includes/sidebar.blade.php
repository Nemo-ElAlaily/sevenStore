{{--@php--}}
{{--    $site_settings = \App\Models\Settings\SiteSetting::all();--}}
{{--@endphp--}}

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ $site_settings -> logo_path }}"
             alt="logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $site_settings -> title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth() -> user() -> avatar_path }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth() -> user () -> full_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li><!-- /dashboard-sidebar -->

                @if (auth()->user()->hasPermission('users_read'))
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('vendors_read'))
                    <li class="nav-item">
                        <a href="{{ route('admin.vendors.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-user-plus"></i>
                            <p>Vendors</p>
                        </a>
                    </li><!-- /user-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('products_read'))
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-product-hunt"></i>
                        <p>Products</p>
                    </a>
                </li><!-- /products-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('main_categories_read'))
                    <li class="nav-item">
                        <a href="{{ route('admin.main_categories.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-puzzle-piece"></i>
                            <p>Main Categories</p>
                        </a>
                    </li><!-- /products-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('orders_read'))
                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-sort"></i>
                        <p>Orders</p>
                    </a>
                </li><!-- /orders-sidebar -->
                @endif

                @if (auth()->user()->hasPermission('site_settings_read'))
                <li class="nav-item pt-5" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>Site Settings</p>
                    </a>
                    <ul class="nav nav-treeview ml-3">
                        <li class="nav-item ml-2">
                            <a href="{{ route('admin.site.show', 1) }}" class="nav-link">
                                <i class="fa fa-wrench nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        <li class="nav-item ml-2">
                            <a href="{{ route('admin.social.show') }}" class="nav-link">
                                <i class="fa fa-bullhorn nav-icon"></i>
                                <p>Social Settings</p>
                            </a>
                        </li>
                        <li class="nav-item ml-2">
                            <a href="{{ route('admin.database.show' , 1) }}" class="nav-link">
                                <i class="fa fa-bullhorn nav-icon"></i>
                                <p>Database Settings</p>
                            </a>
                        </li>
                    </ul>
                </li><!-- /site_settings-sidebar -->
                @endif

            </ul> <!-- /.nav-sidebar -->
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
