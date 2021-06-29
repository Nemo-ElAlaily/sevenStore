<div tabindex="-1" class="site-content" id="content">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">Home</a>
            <span class="delimiter">
                <i class="fa fa-angle-right"></i>
            </span>Track Your Order
        </nav>

        <div class="content-area" id="primary">

            @include('front.partials._session')
            @include('front.partials._errors')

            <main class="site-main" id="main">
                <article class="page type-page status-publish hentry">
                    <div itemprop="mainContentOfPage" class="entry-content">
                        <div id="yith-wcwl-messages"></div>
                        <form class="woocommerce" method="post" id="yith-wcwl-form">

                            <input type="hidden" value="68bc4ab99c" name="yith_wcwl_form_nonce" id="yith_wcwl_form_nonce">
                            <input type="hidden" value="/electro/wishlist/" name="_wp_http_referer">


                        @if($orders -> count() > 0)
                            <!-- TITLE -->
                                <div class="wishlist-title">
                                    <h2>My Orders <span class="text-muted" style="font-size: 14px;">{{ $orders -> total() }}</span></h2>
                                </div>

                                <!-- WISHLIST TABLE -->
                                <table data-token="" data-id="" data-page="1" data-per-page="5" data-pagination="no" class="shop_table cart wishlist_table">

                                    <thead>
                                    <tr>

                                        <th class="product-name text-center">
                                            <span class="nobr">Order Number</span>
                                        </th>

                                        <th class="product-price text-center">
                                            <span class="nobr">Order Total</span>
                                        </th>
                                        <th class="product-stock-stauts text-center">
                                            <span class="nobr">Order Status</span>
                                        </th>

                                        <th class="product-add-to-cart text-center">
                                            <span class="nobr">Order Details</span>
                                        </th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr class="text-center">

                                            <td class="product-name">
                                                <a href="#">{{ $order -> slug }}</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="electro-price"><span class="amount">&pound; {{ $order -> total }}</span></span>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{ $order -> getShippingStatus() }}</a>
                                            </td>

                                            <td class="product-add-to-cart">
                                                <!-- Date added -->

                                                <!-- Add to cart button -->
                                                <a href="{{ route('front.order.details', $order -> slug) }}" class="button">Order Details</a>
                                                <!-- Change wishlist -->

                                                <!-- Remove from wishlist -->
                                            </td>

                                        </tr>
                                    @endforeach
                                    @else
                                        <!-- TITLE -->
                                        <div class="wishlist-title ">
                                            <h2>No Orders Yet!</h2>
                                            <br>
                                            <div class="hero-action-btn fadeInDown-4">
                                                <a href="{{ route('front.shop') }}" class="big le-button text-gray-dark text-lg font-weight-bold">Shop Now</a>
                                            </div>
                                        </div>
                                    @endif


                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <td colspan="6"></td>
                                    </tr>
                                    </tfoot>

                                </table>

                                {{ $orders ->links('front.pagination.default') }}

                        </form>

                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .col-full -->
</div>
