<div tabindex="-1" class="site-content" id="content">
    <div class="container">

        <nav class="woocommerce-breadcrumb"><a href="{{ route('front.index') }}">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Compare</nav>
        <div class="content-area" id="primary">
            <main class="site-main" id="main">
                <article class="post-2917 page type-page status-publish hentry" id="post-2917">
                    <div itemprop="mainContentOfPage" class="entry-content">
                        <div class="table-responsive">

                            @include('front.partials._session')
                            @include('front.partials._errors')


                            @if(Cart::instance('compare') -> content() -> count() > 0)

                            <table class="table table-compare compare-list">
                                <tbody>
                                <tr>
                                    <th>Product</th>
                                    @foreach(Cart::instance('compare') -> content() as $compareItem)
                                    <td>
                                        <a class="product" href="{{ route('front.product.details', $compareItem -> model -> slug) }}">
                                            <div class="product-image">
                                                <div class="">
                                                    <img width="250" height="232" alt="1" class="wp-post-image" src="{{ $compareItem -> model -> image_path }}">
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h3 class="product-title">{{ $compareItem -> model -> name }}</h3>

                                            </div>
                                        </a><!-- /.product -->
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    @foreach(Cart::instance('compare') -> content() as $compareItem)
                                    <td>
                                        <div class="product-price price"><span class="electro-price"><span class="amount">&pound; {{ $compareItem -> model -> sale_price }}</span></span></div>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Availability</th>

                                    @foreach(Cart::instance('compare') -> content() as $compareItem)
                                        <td>
                                            @if ($compareItem -> model ->stock == 0)
                                                <span class="text-danger"> Out Of Stock</span>
                                            @elseif ($compareItem -> model -> stock > 0 && $compareItem -> model -> stock < 5)
                                                <span class=""> Low Stock</span>
                                            @else
                                                <span class="text-success"> In stock</span>
                                            @endif
                                        </td>
                                    @endforeach

                                </tr>

                                <tr>
                                    <th>Add to cart</th>
                                    @foreach(Cart::instance('compare') -> content() as $compareItem)
                                        <td>
                                            <a class="button" href="#" rel="nofollow" wire:click.prevent="moveProductFromCompareToCart( '{{ $compareItem -> rowId }}' )">Add to cart</a>
                                        </td>
                                    @endforeach
                                </tr>
                               <tr>
                                    <th>&nbsp;</th>
                                    @foreach(Cart::instance('compare') -> content() as $compareItem)
                                        <td class="text-center">
                                            <a href="#" title="Remove" class="remove-icon" wire:click.prevent="removeFromCompare('{{ $compareItem -> model -> id }}')"><i class="fa fa-times"></i></a>
                                        </td>
                                    @endforeach
                                </tr>

                                </tbody>
                            </table>

                            @else
                            <!-- TITLE -->
                                <div class="wishlist-title ">
                                    <h2>No Product Added Yet!</h2>
                                    <br>
                                    <div class="hero-action-btn fadeInDown-4">
                                        <a href="{{ route('front.shop') }}" class="big le-button text-gray-dark text-lg font-weight-bold">Shop Now</a>
                                    </div>
                                </div>
                            @endif
                        </div><!-- /.table-responsive -->
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .col-full -->
</div>
