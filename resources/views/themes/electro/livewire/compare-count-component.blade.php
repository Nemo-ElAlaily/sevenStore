<li class="nav-item">
    <a href="{{ route('front.product.compare') }}" class="nav-link">
        <i class="ec ec-compare"></i>
        @if (Cart::instance('compare')->count() > 0)
            <span class="cart-items-count count">{{ Cart::instance('compare')->count() }}</span>
        @endif
    </a>
</li>
