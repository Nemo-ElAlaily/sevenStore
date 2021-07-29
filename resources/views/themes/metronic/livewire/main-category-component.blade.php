<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>
            <a href="">{{ trans('front.Product Categories') }}</a>
            <span class="delimiter">
                <i class="fa fa-angle-right"></i>
            </span>{{ $main_category_name }}
        </nav>

        @include('themes.metronic.partials._session')
        @include('themes.metronic.partials._errors')

        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <header class="page-header">
                    <h1 class="page-title">{{ $main_category_name }}</h1>
                    @if ($products->count() > 0)
                        <p class="woocommerce-result-count">
                            {{ trans('front.Showing') }} {{ ($products->currentpage() - 1) * $products->perpage() + 1 }} -
                            {{ $products->currentpage() * $products->perpage() }}
                            {{ trans('front.of') }} {{ $products->total() }} {{ trans('front.products') }}
                        </p>
                    @endif
                </header>

                @if ($products->count() > 0)
                    <div class="shop-control-bar">
                        <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View"
                                    href="#grid"><i class="fa fa-th"></i></a></li>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid Extended View"
                                    href="#grid-extended"><i class="fa fa-align-justify"></i></a></li>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View"
                                    href="#list-view"><i class="fa fa-list"></i></a></li>
                            <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small"
                                    href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
                        </ul>

                        @include('themes.metronic.includes.components.shop-control-bar')

                    </div>

                    <div class="tab-content">
                        @include('themes.metronic.includes.components.product-grid')
                        @include('themes.metronic.includes.components.product-grid-ext')
                        @include('themes.metronic.includes.components.product-list-view')
                        @include('themes.metronic.includes.components.product-list-view-small')
                    </div>

                    @include('themes.metronic.includes.components.shop-control-bar-bottom')
                @else
                    <!-- TITLE -->
                    <div class="wishlist-title ">
                        <h2>{{ trans('front.No Products Add in this Category Yet !') }}</h2>
                        <br>
                        <div class="hero-action-btn fadeInDown-4">
                            <a href="{{ route('front.shop') }}"
                                class="big le-button text-gray-dark text-lg font-weight-bold">{{ trans('front.Continue Shopping') }}</a>
                        </div>
                    </div>
                @endif

            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar" role="complementary">
            @include('themes.metronic.includes.components.sidebar.product-categories-widget')
            @include('themes.metronic.includes.components.sidebar.product-filters-sidebar')
            {{-- @include('themes.metronic.includes.components.sidebar.home-v2-ad-block') --}}
            @include('themes.metronic.includes.components.sidebar.latest-products')
        </div>

    </div><!-- .container -->
</div><!-- #content -->
