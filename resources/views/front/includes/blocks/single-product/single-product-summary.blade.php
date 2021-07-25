<div class="summary entry-summary" xmlns:wire="http://www.w3.org/1999/xhtml">

    <span class="loop-product-categories">
        <a href="#" rel="tag">Headphones</a>
    </span><!-- /.loop-product-categories -->

    @php
        $witems = Cart::instance('wishlist')
            ->content()
            ->pluck('id');
        $compareItems = Cart::instance('compare')
            ->content()
            ->pluck('id');
    @endphp

    <h1 itemprop="name" class="product_title entry-title">{{ $product->name }}</h1>

    <div class="woocommerce-product-rating">
        <div class="star-rating" title="Rated 4.33 out of 5">
            <span style="width:86.6%">
                <strong itemprop="ratingValue" class="rating">4.33</strong>
                out of <span itemprop="bestRating">5</span> based on
                <span itemprop="ratingCount" class="rating">3</span>
                customer ratings
            </span>
        </div>

        <a href="#reviews" class="woocommerce-review-link">
            (<span itemprop="reviewCount" class="count">3</span> customer reviews)
        </a>
    </div><!-- .woocommerce-product-rating -->

    <div class="brand">
        <a href="#">
            {{-- <img src="assets/images/single-product/brand.png" alt="Gionee" />  change this to brand incase found --}}
        </a>
    </div><!-- .brand -->

    <div class="availability in-stock">
        Availablity:
        @if ($product->stock == 0)
            <span class="text-danger"> Out Of Stock</span>
        @elseif ($product -> stock > 0 && $product -> stock < 5) <span class=""> Low Stock</span>
            @else
                <span class="text-success"> Available</span>
        @endif
    </div><!-- .availability -->

    <hr class="single-product-title-divider" />

    <div class="action-buttons">

        @if ($witems->contains($product->id))
            <a href="#" rel="nofollow" style="color: #ea1b25"
                wire:click.prevent="removeFromWishlist('{{ $product->id }}')">
                <i class="fa fa-heart"></i>
                Wishlist
            </a>
        @else
            <a href="#" rel="nofollow" class="btn-add-to-wishlist"
                wire:click.prevent="addToWishlist('{{ $product->id }}', '{{ $product->name }}', '{{ $product->sale_price }}')">
                <i class="fa fa-heart-o"></i>
                Wishlist
            </a>
        @endif

        @if ($compareItems->contains($product->id))
            <a class="add-to-compare-link" href="#" rel="nofollow" style="color: #ea1b25"
                wire:click.prevent="removeFromCompare('{{ $product->id }}')">
                Compare
            </a>
        @else
            <a class="add-to-compare-link" href="#" rel="nofollow" class="btn-add-to-wishlist"
                wire:click.prevent="addToCompare('{{ $product->id }}', '{{ $product->name }}', '{{ $product->sale_price }}')">
                Compare
            </a>
        @endif

    </div><!-- .action-buttons -->


    <div itemprop="description">
        {!! html_entity_decode($product->features) !!}

        {{-- {!! html_entity_decode( $product -> description ) !!} --}}

        <p><strong>SKU</strong>: {{ $product->sku }}</p>
    </div><!-- .description -->

    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

        <p class="price">
            <span class="electro-price">
                <ins><span class="amount">&pound; {{ $product->sale_price }}</span>
                </ins>
                <del>
                    <span class="amount">&pound; {{ $product->regular_price }}</span>
                </del>
            </span>
        </p>

        <meta itemprop="price" content="1215" />
        <meta itemprop="priceCurrency" content="USD" />
        <link itemprop="availability" href="http://schema.org/InStock" />

    </div><!-- /itemprop -->

    <form class="variations_form cart" method="post">
        <table class="variations">
            <tbody>

            </tbody>
        </table>

        <div class="single_variation_wrap">
            <div class="woocommerce-variation single_variation"></div>
            <div class="woocommerce-variation-add-to-cart variations_button">
                <div class="quantity buttons_added">
                    <label>Quantity:</label>
                    <input type="number" class="input-text qty text" value="1" name="qty" max="29" min="1"
                        wire:model="qty">
                    <a class="btn btn-increase plus" href="#" wire:click.prevent="increaseQty">+</a>
                    <a class="btn btn-reduce minus" href="#" wire:click.prevent="decreaseQty">-</a>
                </div>
                <button
                    wire:click.prevent="store( '{{ $product->id }}', '{{ $product->name }}', '{{ $product->sale_price }}' )"
                    class="single_add_to_cart_button button">Add to cart</button>
                <input type="hidden" name="add-to-cart" value="2452" />
                <input type="hidden" name="product_id" value="2452" />
                <input type="hidden" name="variation_id" class="variation_id" value="0" />
            </div>
        </div>
    </form>



</div><!-- .summary -->
