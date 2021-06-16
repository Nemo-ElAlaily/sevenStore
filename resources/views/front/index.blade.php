@extends('layouts.front.app')

@section('content')

    <div id="content" class="site-content" tabindex="-1">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    @include('front.includes.homepage.slider')
                    @include('front.includes.homepage.ads-block')
                    @include('front.includes.homepage.deals-and-tabs')
                    @include('front.includes.homepage.2-1-2-product-grid')
                    @include('front.includes.homepage.best-sellers-products-cards-carousel')
                    @include('front.includes.homepage.home-banner')
                    @include('front.includes.homepage.recently-added-products-carousel')

                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- .container -->
    </div><!-- #content -->

@stop
