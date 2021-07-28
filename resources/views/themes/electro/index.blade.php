@extends('themes.electro.layouts.app')

@section('content')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    @include('themes.electro.includes.homepage.slider')
                    @include('themes.electro.includes.homepage.ads-block')
                    @include('themes.electro.includes.homepage.deals-and-tabs')
                    @include('themes.electro.includes.homepage.2-1-2-product-grid')
                    @include('themes.electro.includes.homepage.best-sellers-products-cards-carousel')
                    @include('themes.electro.includes.homepage.home-banner')
                    @include('themes.electro.includes.homepage.recently-added-products-carousel')

                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- .container -->
    </div><!-- #content -->

@stop
