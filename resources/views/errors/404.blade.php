@extends('layouts.front.app')

@section('content')
    <div id="content" class="site-content" tabindex="-1">
        <div class="container">

            <nav class="woocommerce-breadcrumb"><a href="{{ route('front.index') }}">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Error 404</nav>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="center-block">
                        <div class="info-404">
                            <div class="text-xs-center inner-bottom-xs">
                                <h2 class="display-3">404!</h2>
                                <p class="lead">Nothing was found at this location. Try searching, or check out the links below.</p>
                                <div class="hero-action-btn fadeInDown-4">
                                    <a href="{{ route('front.shop') }}" class="big le-button text-gray-dark text-lg font-weight-bold">Go To Shop Page</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
