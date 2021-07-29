<?php
    $item = Cart::instance('cart');
?>
<div class="cart-block">
    <div class="cart-info">
        <a href="javascript:void(0);" class="cart-info-count">{{ Cart::instance('cart')->count() }} items</a>
        <a href="javascript:void(0);" class="cart-info-value">&pound; {{ Cart::instance('cart')->subtotal() }}</a>
    </div>
    <i class="fa fa-shopping-cart"></i>
    <!-- BEGIN CART CONTENT -->
    <div class="cart-content-wrapper">
        <div class="cart-content">
            <ul class="scroller" style="height: 200px">
                @if (Cart::instance('cart')->count() > 0)
                    @foreach (Cart::instance('cart')->content() as $item)

                        <li>
                            <a href="#"><img src="{{ $item->model->image_path }}" alt="{{ $item->model->slug }}" width="37" height="34"></a>
                            <span class="cart-content-count">x {{ $item->qty }}</span>
                            <strong><a href="#">{{ $item->model->name }}&nbsp;</a></strong>
                            <em>&pound; {{ $item->model->sale_price }}</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>

                    @endforeach
                @endif

            </ul>
            <div class="text-right">
                <a href="{{ route('front.product.cart') }}" class="btn btn-default">{{ trans('front.Cart') }}</a>
                <a href="{{ route('front.checkout') }}" class="btn btn-primary">{{ trans('front.Checkout') }}</a>
            </div>
        </div>
    </div>
    <!-- END CART CONTENT -->
</div>
