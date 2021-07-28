@extends('themes.electro.layouts.app')

@section('content')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb">
                <a href="{{ route('front.index') }}">Home</a>
                <span class="delimiter">
                    <i class="fa fa-angle-right"></i>
                </span>Smart Phones &amp; Tablets
            </nav>

            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <section class="section-product-cards-carousel">
                        <header>
                            <h2 class="h1">Recommended Products</h2>
                            <div class="owl-nav">
                                <a href="#products-carousel-prev" data-target="#recommended-product" class="slider-prev"><i
                                        class="fa fa-angle-left"></i></a>
                                <a href="#products-carousel-next" data-target="#recommended-product" class="slider-next"><i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </header>

                        <div id="recommended-product">
                            <div class="woocommerce columns-4">
                                <div class="products owl-carousel products-carousel columns-4 owl-loaded owl-drag">
                                    @include('themes.electro.includes.components.product-carousel-item')
                                    @include('themes.electro.includes.components.product-carousel-item')
                                    @include('themes.electro.includes.components.product-carousel-item')
                                    @include('themes.electro.includes.components.product-carousel-item')
                                    @include('themes.electro.includes.components.product-carousel-item')
                                    @include('themes.electro.includes.components.product-carousel-item')
                                    @include('themes.electro.includes.components.product-carousel-item')
                                </div>
                            </div>
                        </div>
                    </section>

                    <header class="page-header">
                        <h1 class="page-title">Smart Phones &amp; Tablets</h1>
                        <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
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
                @include('themes.electro.includes.components.sidebar.product-filters-sidebar')
                @include('themes.electro.includes.components.sidebar.home-v2-ad-block')
                @include('themes.electro.includes.components.sidebar.latest-products')
            </div>

        </div><!-- .container -->
    </div><!-- #content -->

@stop
