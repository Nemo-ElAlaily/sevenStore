@extends('themes.metronic.layouts.app')

@section('content')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    @include('themes.metronic.includes.homepage.slider')
                    @include('themes.metronic.includes.homepage.ads-block')
                    @include('themes.metronic.includes.homepage.deals-and-tabs')
                    @include('themes.metronic.includes.homepage.2-1-2-product-grid')
                    @include('themes.metronic.includes.homepage.best-sellers-products-cards-carousel')
                    @include('themes.metronic.includes.homepage.home-banner')
                    @include('themes.metronic.includes.homepage.recently-added-products-carousel')

                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- .container -->
    </div><!-- #content -->

@stop
