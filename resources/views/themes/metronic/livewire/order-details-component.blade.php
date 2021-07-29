<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>
            {{ trans('front.Order Details') }}
        </nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    <header class="entry-header">
                        <h1 itemprop="name" class="entry-title">{{ trans('front.Order Details') }}</h1>
                    </header><!-- .entry-header -->

                    @include('themes.metronic.includes.components.order-details-table')

                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- #content -->
