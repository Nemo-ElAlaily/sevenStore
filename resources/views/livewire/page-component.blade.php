<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ $page -> title }}
        </nav>

        @include('front.partials._session')
        @include('front.partials._errors')

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="page type-page status-publish hentry">

                    <header class="entry-header">
                        <h1 class="entry-title">{{ $page->title }}</h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content m-x-auto">
                        <section class="section inner-bottom-xs">
                            {!! html_entity_decode($page->content) !!}
                        </section>
                    </div>

                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- #content -->
