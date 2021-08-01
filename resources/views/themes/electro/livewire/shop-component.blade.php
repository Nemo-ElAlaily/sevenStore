<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter">
                <i class="fa fa-angle-right"></i>
            </span>{{ trans('front.Shop') }}
        </nav>

        <div id="primary" class="content-area">

            @include('themes.electro.partials._session')
            @include('themes.electro.partials._errors')

            <main id="main" class="site-main">

                <header class="page-header">
                    <h1 class="page-title"></h1>
                    <p class="woocommerce-result-count">
                        {{ trans('front.Showing') }} {{ ($products->currentpage() - 1) * $products->perpage() + 1 }} -
                        {{ $products->currentpage() * $products->perpage() }}
                        {{ trans('front.of') }} {{ $products->total() }} {{ trans('front.products') }}
                    </p>
                </header>

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

                    @include('themes.electro.includes.components.shop-control-bar')

                </div>

                <div class="tab-content">
                    @include('themes.electro.includes.components.product-grid')
                    @include('themes.electro.includes.components.product-grid-ext')
                    @include('themes.electro.includes.components.product-list-view')
                    @include('themes.electro.includes.components.product-list-view-small')
                </div>

                @include('themes.electro.includes.components.shop-control-bar-bottom')

            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar" role="complementary">
            @include('themes.electro.includes.components.sidebar.product-categories-widget')
{{--            @include('themes.electro.includes.components.sidebar.product-filters-sidebar')--}}
            @include('themes.electro.includes.components.sidebar.latest-products')
        </div>

    </div><!-- .container -->
</div><!-- #content -->
