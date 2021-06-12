<li class="nav-item">
    <a href="{{ route('front.product.wishlist') }}" class="nav-link">
        <i class="ec ec-favorites"></i>
        @if(Cart::instance('wishlist') -> count() > 0 )
            <span class="cart-items-count count">{{ Cart::instance('wishlist')-> count() }}</span>
        @endif
    </a>
</li>
