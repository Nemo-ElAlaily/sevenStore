<ul class="products columns-5">
    @php
        $witems = Cart::instance('wishlist')->content()->pluck('id');
    @endphp

    @foreach($products_top_rated as $index => $product)
        <li class="product {{ $index == 0 ? 'first' : '' }}">
            <div class="product-outer">
                <div class="product-inner">
                        <span class="loop-product-categories">
                            <a href="{{ route('front.product.category', $product -> mainCategory -> slug) }}" rel="tag">{{ $product -> mainCategory -> name }}</a>
                        </span>
                    <a href="{{ route('front.product.details', $product -> slug) }}">
                        <h3>{{ $product -> name }}</h3>
                        <div class="product-thumbnail">

                            <img data-echo="{{ $product -> image_path }}" src="{{ $product -> image_path }}" alt="{{ $product ->slug }}">

                        </div>
                    </a>

                    <div class="price-add-to-cart">
                            <span class="price">
                                <span class="electro-price">
                                    <ins><span class="amount">&pound; {{ $product -> sale_price }}</span></ins>
                                    <del><span class="amount">&pound; {{ $product -> regular_price }}</span></del>
                                </span>
                            </span>
                        <a rel="nofollow" href="#" class="button add_to_cart_button" wire:click.prevent="store( '{{$product -> id}}', '{{$product -> name}}', '{{$product -> sale_price}}' )">Add to cart</a>
                    </div><!-- /.price-add-to-cart -->

                    <div class="hover-area">
                        <div class="action-buttons">

                            @if($witems -> contains($product -> id))
                                <a href="#" rel="nofollow" style="color: #ea1b25" wire:click.prevent="removeFromWishlist('{{ $product -> id }}')">
                                    <i class="fa fa-heart"></i>
                                    Wishlist
                                </a>
                            @else
                                <a href="#" rel="nofollow" class="btn-add-to-wishlist" wire:click.prevent="addToWishlist('{{$product -> id}}', '{{$product -> name}}', '{{$product -> sale_price}}')">
                                    <i class="fa fa-heart-o"></i>
                                    Wishlist
                                </a>
                            @endif

                            <a href="#" class="add-to-compare-link">Compare</a>
                        </div>
                    </div>
                </div><!-- /.product-inner -->
            </div><!-- /.product-outer -->
        </li>
    @endforeach
</ul>
