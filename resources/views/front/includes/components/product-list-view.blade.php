<div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
    <ul class="products columns-3">
        @php
            $witems = Cart::instance('wishlist')->content()->pluck('id');
            $compareItems = Cart::instance('compare')->content()->pluck('id');
        @endphp

        @foreach($products as $product)
            <li class="product list-view">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="wp-post-image" data-echo="{{ $product -> image_path }}" src="{{ $product -> image_path }}" alt="{{ $product -> slug }}">
                        </a>
                    </div>
                    <div class="media-body media-middle">
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="loop-product-categories">
                                    <a rel="tag" href="{{ route('front.product.category', $product -> mainCategory -> slug) }}">{{ $product -> mainCategory -> name }}</a>
                                </span>
                                <a href="{{ route('front.product.details', $product -> slug) }}">
                                    <h3>{{ $product -> name }}</h3>
                                    <div class="product-rating">
                                        <div title="Rated 4 out of 5" class="star-rating"><span style="width:80%"><strong class="rating">4</strong> out of 5</span></div> (3)
                                    </div>
                                    <div class="product-short-description">
                                        {!! html_entity_decode( $product -> description ) !!}
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-12">

                                <div class="availability in-stock">
                                    Availablity:
                                    @if ($product -> stock == 0)
                                        <span class="text-danger"> Out Of Stock</span>
                                    @elseif ($product -> stock > 0 && $product -> stock < 5)
                                        <span class=""> Low Stock</span>
                                    @else
                                        <span class="text-success"> Available</span>
                                    @endif
                                </div>


                                <span class="price"><span class="electro-price"><span class="amount">&pound; {{ $product -> sale_price }}</span></span></span>
                                <a class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_sku="{{ $product -> sku }}" data-product_id="{{ $product -> id }}" data-quantity="1" href="#" rel="nofollow">Add to cart</a>
                                <div class="hover-area">
                                    <div class="action-buttons">
                                        @if($witems -> contains($product -> id))
                                            <a href="#" rel="nofollow" class="" style="color: #ea1b25" wire:click.prevent="removeFromWishlist('{{ $product -> id }}')">
                                                <i class="fa fa-heart"></i>
                                                Wishlist
                                            </a>
                                        @else
                                            <a href="#" rel="nofollow" class="" wire:click.prevent="addToWishlist('{{$product -> id}}', '{{$product -> name}}', '{{$product -> sale_price}}')">
                                                <i class="fa fa-heart-o"></i>
                                                Wishlist
                                            </a>
                                        @endif
                                        <div class="clear"></div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
