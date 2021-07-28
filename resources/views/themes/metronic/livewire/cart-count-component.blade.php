<?php
    $item = Cart::instance('cart');
?>
<li class="nav-item dropdown">
    <a href="{{ route('front.product.cart') }}" class="nav-link" data-toggle="dropdown">
        <i class="ec ec-shopping-bag"></i>
        <span class="cart-items-count count" style="color: #fff">{{ Cart::instance('cart')->count() }}</span>
        <span class="cart-items-total-price total-price"><span class="amount">&pound;
                {{ Cart::instance('cart')->subtotal() }}</span></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-mini-cart">
        <li>
            <div class="widget_shopping_cart_content">

                <ul class="cart_list product_list_widget ">

                    @if (Cart::instance('cart')->count() > 0)
                        @foreach (Cart::instance('cart')->content() as $item)
                            <li class="mini_cart_item">
                                <a title="Remove this item" class="remove" href="#">×</a>
                                <a href="#">
                                    <img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                        src="{{ $item->model->image_path }} "
                                        alt="{{ $item->model->slug }}">{{ $item->model->name }}&nbsp;
                                </a>

                                <span class="quantity">{{ $item->qty }} × <span class="amount">&pound;
                                        {{ $item->model->sale_price }}</span></span>
                            </li>
                        @endforeach
                    @endif


                </ul><!-- end product list -->


                <p class="total"><strong>{{ trans('front.Subtotal') }}:</strong> <span class="amount">{{ $item->subtotal }}</span></p>


                <p class="buttons">
                    <a class="button wc-forward" href="{{ route('front.product.cart') }}">{{ trans('front.Cart') }}</a>
                    <a class="button checkout wc-forward" href="{{ route('front.checkout') }}">{{ trans('front.Checkout') }}</a>
                </p>


            </div>
        </li>
    </ul>
</li>
