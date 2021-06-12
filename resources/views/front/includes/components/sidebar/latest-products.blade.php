<aside class="widget widget_products">
    <h3 class="widget-title">Latest Products</h3>
    <ul class="product_list_widget">

        @foreach($latest_products as $product)
        <li>
            <a href="{{ route('front.product.details', $product -> slug) }}" title="{{ $product -> name }}">
                <img width="180" height="180" src="{{ $product -> image_path }}" alt="{{ $product -> slug }}" class="wp-post-image">
                <span class="product-title">{{ $product -> name }}</span>
            </a>
            <span class="electro-price">
                <ins>
                    <span class="amount">&pound; {{ $product -> sale_price }}</span>
                </ins>
                <del>
                    <span class="amount">&pound; {{ $product -> regular_price }}</span>
                </del>
            </span>
        </li>
        @endforeach

    </ul>
</aside>
