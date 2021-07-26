<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="#">{{ trans('front.Home') }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>
            <a href="{{ route('front.product.category', $product->mainCategory->slug) }}">{{ $product->mainCategory->name }}</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>{{ $product->name }}
        </nav><!-- /.woocommerce-breadcrumb -->


        @include('front.partials._session')
        @include('front.partials._errors')

        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="product">

                    <div class="single-product-wrapper">
                        <div class="product-images-wrapper">

                            @if($product -> regular_price > $product -> sale_price)
                                <span class="onsale">{{ trans('front.Sale!') }}</span>
                            @endif
                            <?php /*require_once 'inc/blocks/single-product/images-block.php'; */
                            ?>

                            <img src="{{ $product->image_path }}" alt="{{ $product->slug }}">
                        </div><!-- /.product-images-wrapper -->

                        @include('front.includes.blocks.single-product.single-product-summary')

                    </div><!-- /.single-product-wrapper -->


                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">

                            <li class="nav-item description_tab">
                                <a href="#tab-description" class="active" data-toggle="tab">{{ trans('front.Description') }}</a>
                            </li>

                            <li class="nav-item specification_tab">
                                <a href="#tab-specification" data-toggle="tab">{{ trans('front.features') }}</a>
                            </li>

                            {{-- <li class="nav-item reviews_tab"> --}}
                            {{-- <a href="#tab-reviews" data-toggle="tab">Reviews</a> --}}
                            {{-- </li> --}}
                        </ul>

                        <div class="tab-content">
                            <div class="tab-content">

                                <div class="tab-pane active in panel entry-content wc-tab" id="tab-description">
                                    @include('front.includes.blocks.single-product.description-tab')
                                </div>

                                <div class="tab-pane panel entry-content wc-tab" id="tab-specification">
                                    {{-- @include('front.includes.blocks.single-product.specification-tab') --}}
                                    {!! html_entity_decode($product->features) !!}
                                </div><!-- /.panel -->

                                <div class="tab-pane panel entry-content wc-tab" id="tab-reviews">
                                    <!--                                --><?php //require_once 'inc/blocks/single-product/woocommerce-tabs/reviews-tab.php';
?>
                                </div><!-- /.panel -->
                            </div>
                        </div><!-- /.woocommerce-tabs -->

                        <!--                    --><?php //require_once 'inc/blocks/single-product/related-products.php';
?>
                    </div>
            </main><!-- /.site-main -->
        </div><!-- /.content-area -->

        <div id="sidebar" class="sidebar" role="complementary">

            <!--            --><?php //require_once 'inc/blocks/single-product/single-product-sidebar/product-categories-widget.php';
?>

            <!--            --><?php //require_once 'inc/blocks/single-product/single-product-sidebar/text-widget.php';
?>

            <!--            --><?php //require_once  'inc/blocks/single-product/single-product-sidebar/woocommerce-product-widget.php';
?>
        </div><!-- /.sidebar-shop -->

    </div><!-- .col-full -->
</div><!-- #content -->
