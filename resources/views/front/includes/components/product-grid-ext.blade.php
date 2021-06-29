<div role="tabpanel" class="tab-pane" id="grid-extended" aria-expanded="true">

    <ul class="products columns-3">
        @php
            $witems = Cart::instance('wishlist')->content()->pluck('id');
            $compareItems = Cart::instance('compare')->content()->pluck('id');
        @endphp

        @foreach($products as $product)
            <li class="product ">
                <div class="product-outer">
                    <div class="product-inner">
                        <span class="loop-product-categories"><a href="{{ route('front.product.category', $product -> mainCategory -> slug) }}" rel="tag">{{ $product -> mainCategory -> name }}</a></span>
                        <a href="{{ route('front.product.details', $product -> slug) }}">
                            <h3>{{ $product -> name }}</h3>
                            <div class="product-thumbnail">
                                <img class="wp-post-image" data-echo="{{ $product -> image_path }}" src="{{ $product -> image_path }}" alt="{{ $product -> slug }}">
                            </div>

                            <div class="product-rating">
                                <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                            </div>

                            <div class="product-short-description text-sm">
                                {!! html_entity_decode( $product -> description ) !!}
                            </div>

                            <div class="product-sku">SKU: {{ $product -> sku }}</div>
                        </a>
                        <div class="price-add-to-cart">
                            <span class="price">
                                <span class="electro-price">
                                    <ins><span class="amount">&pound; {{ $product -> sale_price }}</span></ins>
                                    <del><span class="amount">&pound; {{ $product -> regular_price }}</span></del>
                                </span>
                            </span>
                            <a rel="nofollow" href="#" class="button add_to_cart_button">Add to cart</a>
                        </div><!-- /.price-add-to-cart -->
                        <div class="hover-area">
                            <div class="action-buttons">

                                @if($witems -> contains($product -> id))
                                    <a href="#" rel="nofollow" class="btn-add-to-wishlist" style="color: #ea1b25" wire:click.prevent="removeFromWishlist('{{ $product -> id }}')">
                                        <i class="fa fa-heart"></i>
                                        Wishlist
                                    </a>
                                @else
                                    <a href="#" rel="nofollow" class="" wire:click.prevent="addToWishlist('{{$product -> id}}', '{{$product -> name}}', '{{$product -> sale_price}}')">
                                        <i class="fa fa-heart-o"></i>
                                        Wishlist
                                    </a>
                                @endif

                                @if($compareItems -> contains($product -> id))
                                    <a class="add-to-compare-link" href="#" rel="nofollow" style="color: #ea1b25" wire:click.prevent="removeFromCompare('{{ $product -> id }}')">
                                        Compare
                                    </a>
                                @else
                                    <a class="add-to-compare-link" href="#" rel="nofollow" class="btn-add-to-wishlist" wire:click.prevent="addToCompare('{{$product -> id}}', '{{$product -> name}}', '{{$product -> sale_price}}')">
                                        Compare
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div><!-- /.product-inner -->
                </div><!-- /.product-outer -->
            </li>
        @endforeach
    </ul>
</div>
