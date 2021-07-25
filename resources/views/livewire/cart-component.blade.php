<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('front.Cart') }}
        </nav>

        @include('front.partials._session')
        @include('front.partials._errors')

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    @if (Cart::instance('cart')->count() > 0)
                        <header class="entry-header">
                            <h1 itemprop="name" class="entry-title">{{ trans('front.Cart') }}</h1>
                        </header><!-- .entry-header -->

                        @include('front.includes.components.cart-table')
                        @include('front.includes.components.cart-collaterals')

                    @else

                        <header class="entry-header">
                            <h1 itemprop="name" class="entry-title">{{ trans('front.Your Cart is Empty !') }}</h1>
                            <br>
                            <div class="hero-action-btn fadeInDown-4">
                                <a href="{{ route('front.shop') }}"
                                    class="big le-button text-gray-dark text-lg font-weight-bold">{{ trans('front.Start Shopping') }}</a>
                            </div>
                        </header><!-- .entry-header -->

                    @endif

                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- #content -->
