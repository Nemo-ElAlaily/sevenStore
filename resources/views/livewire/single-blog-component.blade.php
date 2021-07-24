<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav itemprop="breadcrumb" class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">Home</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>
            <a href="{{ route('front.blog') }}">Blog</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>
            {{ $blog->title }}
        </nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="post type-post status-publish format-gallery has-post-thumbnail hentry">
                    <div class="media-attachment">
                        <div class="media-attachment-gallery">
                            <div class=" ">
                                <div class="item">
                                    <figure>
                                        <img width="1144" height="600" src="{{ $blog->image_path }}"
                                            class="attachment-post-thumbnail size-post-thumbnail"
                                            alt="{{ $blog->title }}" />
                                    </figure>
                                </div><!-- /.item -->
                            </div>
                        </div><!-- /.media-attachment-gallery -->
                    </div>

                    <header class="entry-header">
                        <h1 class="entry-title" itemprop="name headline">{{ $blog->title }}</h1>

                        <div class="entry-meta">
                            <span class="cat-links"><a href="#" rel="category tag">Category</a>, <a href="#"
                                    rel="category tag">Tag</a></span>
                            <span class="posted-on"><a href="#" rel="bookmark"><time class="entry-date published"
                                        datetime="2016-03-04T07:34:20+00:00">{{ $blog->created_at }}</time> <time
                                        class="updated" datetime="2016-03-04T18:46:11+00:00"
                                        itemprop="datePublished">{{ $blog->updated_at }}</time></a></span>
                        </div>
                    </header><!-- .entry-header -->

                    <div class="entry-content" itemprop="articleBody">
                        {!! html_entity_decode($blog->description) !!}
                    </div><!-- .entry-content -->
                </article>
            </main><!-- #main -->
        </div><!-- #primary -->

        <div id="sidebar" class="sidebar-blog" role="complementary">
            {{-- <?php require_once 'inc/components/sidebar/search-widget.php'; ?> --}}
            {{-- <?php require_once 'inc/components/sidebar/post-categories-widget.php'; ?> --}}
            {{-- <?php require_once 'inc/components/sidebar/recent-post-widget.php'; ?> --}}
            {{-- <?php require_once 'inc/components/sidebar/tag-widget.php'; ?> --}}
        </div>
    </div><!-- .container -->
</div><!-- #content -->
