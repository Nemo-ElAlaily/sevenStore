<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">Home</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>Blog
        </nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                @foreach($blogs as $blog)
                    <a href="{{ route('front.blog.details' , $blog -> slug) }}">
                        <article class="post format-gallery hentry">

                            <div class="media-attachment">
                                <a href="{{ route('front.blog.details', $blog -> slug) }}">
                                    <img width="430" height="245" src="{{ $blog -> image_path }}" class="wp-post-image" alt="{{ $blog -> slug }}" />
                                </a>
                            </div><!-- .media-attachment -->

                            <div class="content-body">
                                <header class="entry-header">
                                    <h1 class="entry-title" itemprop="name headline">
                                        <a href="{{ route('front.blog.details', $blog -> slug) }}" rel="bookmark">{{ $blog -> title }}</a>
                                    </h1>

                                    <div class="entry-meta">
								<span class="cat-links">
									<a href="{{ route('front.blog.details', $blog -> slug) }}" rel="category tag">Category</a>, <a href="#" rel="category tag">Tag</a>
								</span>

                                        <span class="posted-on">
									<a href="{{ route('front.blog.details', $blog -> slug) }}" rel="bookmark">
										<time class="entry-date published" datetime="2016-03-04T07:34:20+00:00">{{ $blog -> created_at }}</time>
										<time class="updated" datetime="2016-03-04T18:46:11+00:00" itemprop="datePublished">{{ $blog -> updated_at }}</time>
									</a>
								</span>
                                    </div>
                                </header><!-- .entry-header -->

                                <div class="entry-content" style="height: 93px; overflow: hidden">

                                    <p>{!! html_entity_decode($blog -> description) !!}</p>

                                </div><!-- .entry-content -->

                                <div class="post-readmore">
                                    <a href="{{ route('front.blog.details', $blog -> slug) }}" class="btn btn-primary">Read More</a>
                                </div><!-- .post-readmore -->

                            </div><!-- .content-body -->
                        </article><!-- #post-## -->
                    </a>
                @endforeach


                <!--                --><?php //require_once 'inc/components/blog-pagination.php'; ?>

                {{ $blogs->links('front.pagination.default') }}

            </main>
        </div><!-- /#primary -->

        <div id="sidebar" class="sidebar-blog" role="complementary">
{{--            <?php require_once 'inc/components/sidebar/search-widget.php'; ?>--}}
{{--            <?php require_once 'inc/components/sidebar/about-widget.php'; ?>--}}
{{--            <?php require_once 'inc/components/sidebar/post-categories-widget.php'; ?>--}}
{{--            <?php require_once 'inc/components/sidebar/recent-post-widget.php'; ?>--}}
{{--            <?php require_once 'inc/components/sidebar/tag-widget.php'; ?>--}}
        </div>
    </div><!-- /.container -->
</div><!-- /.site-content -->
