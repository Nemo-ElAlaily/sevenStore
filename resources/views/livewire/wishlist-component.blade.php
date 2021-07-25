<div tabindex="-1" class="site-content" id="content">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">Home</a>
            <span class="delimiter">
                <i class="fa fa-angle-right"></i>
            </span>Wishlist
        </nav>

        <div class="content-area" id="primary">

            @include('front.partials._session')
            @include('front.partials._errors')

            <main class="site-main" id="main">
                <article class="page type-page status-publish hentry">
                    <div itemprop="mainContentOfPage" class="entry-content">
                        <div id="yith-wcwl-messages"></div>
                        <form class="woocommerce" method="post" id="yith-wcwl-form">

                            <input type="hidden" value="68bc4ab99c" name="yith_wcwl_form_nonce"
                                id="yith_wcwl_form_nonce">
                            <input type="hidden" value="/electro/wishlist/" name="_wp_http_referer">


                            @if (Cart::instance('wishlist')->content()->count() > 0)
                                <!-- TITLE -->
                                <div class="wishlist-title ">
                                    <h2>My Wishlist</h2>
                                </div>

                                <!-- WISHLIST TABLE -->
                                <table data-token="" data-id="" data-page="1" data-per-page="5" data-pagination="no"
                                    class="shop_table cart wishlist_table">

                                    <thead>
                                        <tr>

                                            <th class="product-remove"></th>

                                            <th class="product-thumbnail"></th>

                                            <th class="product-name">
                                                <span class="nobr">Product Name</span>
                                            </th>

                                            <th class="product-price">
                                                <span class="nobr">Unit Price</span>
                                            </th>
                                            <th class="product-stock-stauts">
                                                <span class="nobr">Stock Status</span>
                                            </th>

                                            <th class="product-add-to-cart"></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (Cart::instance('wishlist')->content() as $witem)
                                            <tr>
                                                <td class="product-remove">
                                                    <div>
                                                        <a title="Remove this product"
                                                            class="remove remove_from_wishlist" href="#"
                                                            wire:click.prevent="removeFromWishlist('{{ $witem->model->id }}')">×</a>
                                                    </div>
                                                </td>

                                                <td class="product-thumbnail">
                                                    <a
                                                        href="{{ route('front.product.details', $witem->model->slug) }}">
                                                        <img width="180" height="180"
                                                            alt="{{ $witem->model->slug }}" class="wp-post-image"
                                                            src="{{ $witem->model->image_path }}"></a>
                                                </td>

                                                <td class="product-name">
                                                    <a
                                                        href="{{ route('front.product.details', $witem->model->slug) }}">{{ $witem->model->name }}</a>
                                                </td>

                                                <td class="product-price">
                                                    <span class="electro-price"><span class="amount">&pound;
                                                            {{ $witem->model->sale_price }}</span></span>
                                                </td>

                                                <td class="product-stock-status">
                                                    @if ($witem->model->stock == 0)
                                                        <span class="text-danger"> Out Of Stock</span>
                                                    @elseif ($witem -> model -> stock > 0 && $witem -> model ->
                                                        stock < 5) <span class=""> Low Stock</span>
                                                        @else
                                                            <span class="text-success"> Available</span>
                                                    @endif
                                                </td>

                                                <td class="product-add-to-cart">
                                                    <!-- Date added -->

                                                    <!-- Add to cart button -->
                                                    <a href="#" class="button"
                                                        wire:click.prevent="moveProductFromWishlistToCart( '{{ $witem->rowId }}' )">
                                                        Move to Cart</a>
                                                    <!-- Change wishlist -->

                                                    <!-- Remove from wishlist -->
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <!-- TITLE -->
                                        <div class="wishlist-title ">
                                            <h2>Your Wishlist is Empty !</h2>
                                            <br>
                                            <div class="hero-action-btn fadeInDown-4">
                                                <a href="{{ route('front.shop') }}"
                                                    class="big le-button text-gray-dark text-lg font-weight-bold">Start
                                                    Shopping</a>
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

                            <input type="hidden" value="85fe311a9d" name="yith_wcwl_edit_wishlist"
                                id="yith_wcwl_edit_wishlist"><input type="hidden" value="/electro/wishlist/"
                                name="_wp_http_referer">

                        </form>

                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .col-full -->
</div>
