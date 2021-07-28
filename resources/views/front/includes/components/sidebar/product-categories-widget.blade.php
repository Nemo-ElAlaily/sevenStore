<aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
    <ul class="product-categories category-single">
        <li class="product_cat">
            <ul class="show-all-cat">
                <li class="product_cat"><span class="show-all-cat-dropdown">{{ trans('front.Show All Categories') }}</span></li>
            </ul>
            <ul>
                @foreach ($categories as $category)
                    <li class="cat-item current-cat">
                        <a href="{{ route('front.product.category', $category->slug) }}">
                            {{ $category->name }}
                        </a>
                        <span class="count">({{ $category->sub_categories->count() }})</span>
                    </li>
                @endforeach

            </ul>
        </li>
    </ul>
</aside>
