@php
    $witems = Cart::instance('wishlist')->content()->pluck('id');
@endphp

@foreach($latest_products as $product)
<div class="product">
    <div class="product-outer" style="height: 331px;">
        <div class="product-inner">
            <span class="loop-product-categories">
                <a href="{{ route('front.product.category', $product -> mainCategory -> slug) }}" rel="tag">{{ $product -> mainCategory -> name }}</a></span>
            <a href="{{ route('front.product.details', $product -> slug ) }}">
                <h3>{{ $product -> name }}</h3>
                <div class="product-thumbnail">
                    <img style="height: 150px;margin: auto" src="{{ $product -> image_path }}" class="img-responsive" alt="{{ $product -> slug }}">
                </div>
            </a>

            <div class="price-add-to-cart">
            <span class="price">
                <span class="electro-price">
                    <ins>
                        <span class="amount"> </span>
                    </ins>
                    <span class="amount">&pound; {{ $product -> sale_price }}</span>
                </span>
            </span>
                <a rel="nofollow" wire:click.prevent="store( '{{$product -> id}}', '{{$product -> name}}', '{{$product -> sale_price}}' )" class="button add_to_cart_button">Add to cart</a>
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

                    <a href="#" class="add-to-compare-link"> Compare</a>
                </div>
            </div>
        </div><!-- /.product-inner -->
    </div>
</div>
@endforeach
