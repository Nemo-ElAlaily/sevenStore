<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ trans('front.Thank You') }}
        </nav>

        @include('themes.electro.partials._session')
        @include('themes.electro.partials._errors')

        <header class="entry-header">
            <h1 itemprop="name" class="entry-title">{{ trans('front.Thank You For Your Order') }}</h1>
            <br>
            <div class="hero-action-btn fadeInDown-4">
                <a href="{{ route('front.shop') }}"
                    class="big le-button text-gray-dark text-lg font-weight-bold">{{ trans('front.Continue Shopping') }}</a>
            </div>
        </header><!-- .entry-header -->

    </div><!-- .container -->
</div><!-- #content -->
