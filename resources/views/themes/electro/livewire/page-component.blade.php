<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ $page -> title }}
        </nav>

        @include('themes.electro.partials._session')
        @include('themes.electro.partials._errors')

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
{{--                <article class="page type-page status-publish hentry">--}}

{{--                    <header class="entry-header">--}}
{{--                        <h1 class="entry-title">{{ $page->title }}</h1>--}}
{{--                    </header><!-- .entry-header -->--}}
{{--                    --}}
{{--                    <div class="entry-content m-x-auto">--}}
{{--                        <section class="section inner-bottom-xs">--}}
{{--                            {!! html_entity_decode($page->content) !!}--}}
{{--                        </section>--}}
{{--                    </div>--}}

{{--                </article>--}}

                <article class="post format-gallery hentry">

                    @if($page -> image_path != asset('uploads/pages/images/default.png'))
                    <div class="media-attachment">
                        <a href="">
                            <img width="430" height="245" src="{{ $page -> image_path }}" class="wp-post-image" alt="1" /></a>
                    </div><!-- .media-attachment -->
                    @endif

                    <div class="content-body">
                        <header class="entry-header">
                            <h1 class="entry-title" itemprop="name headline">
                                <a href="" rel="bookmark">{{ $page -> title }}</a>
                            </h1>

                            <div class="entry-meta">

                                <span class="posted-on">
									<a href="" rel="bookmark">
										<time class="entry-date published" datetime="2016-03-04T07:34:20+00:00">{{ $page -> created_at }}</time>
										<time class="updated" datetime="2016-03-04T18:46:11+00:00" itemprop="datePublished">{{ $page -> updated_at }}</time>
									</a>
								</span>
                            </div>
                        </header><!-- .entry-header -->

                        <div class="">
                            <p>{!! html_entity_decode($page -> content) !!}</p>
                        </div><!-- .entry-content -->

                    </div><!-- .content-body -->
                </article><!-- #post-## -->



            </main><!-- #main -->
        </div><!-- #primary -->
        <div id="sidebar" class="sidebar" role="complementary">
            @include('themes.electro.includes.components.sidebar.product-categories-widget')
{{--            @include('themes.electro.includes.components.sidebar.product-filters-sidebar')--}}
            @include('themes.electro.includes.components.sidebar.latest-products')
        </div>
    </div><!-- .container -->
</div><!-- #content -->
