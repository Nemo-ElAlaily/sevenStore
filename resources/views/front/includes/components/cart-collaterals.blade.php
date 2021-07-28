<div class="cart-collaterals">

    <div class="cart_totals ">

        <h2>{{ trans('front.Cart Totals') }}</h2>

        <table class="shop_table shop_table_responsive">

            <tbody>
                <tr class="cart-subtotal">
                    <th>{{ trans('front.Subtotal') }}</th>
                    <td data-title="Subtotal"><span class="amount">&pound;
                            {{ Cart::instance('cart')->subtotal() }}</span></td>
                </tr>


                <tr class="shipping">
                    <th>{{ trans('front.Shipping') }}</th>
                    <td data-title="Shipping"><span class="amount">{{ trans('front.Free Shipping') }}</span> <input type="hidden"
                            class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0"
                            name="shipping_method[0]">
                    </td>
                </tr>

                <tr class="shipping">
                    <th>{{ trans('front.Tax') }}</th>
                    <td data-title="Shipping"><span class="amount">{{ Cart::instance('cart')->tax() }}</span> <input
                            type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0"
                            data-index="0" name="shipping_method[0]">
                    </td>
                </tr>

                <tr class="order-total">
                    <th>{{ trans('front.Total') }}</th>
                    <td data-title="Total"><strong><span class="amount">&pound;
                                {{ Cart::instance('cart')->total() }}</span></strong> </td>
                </tr>
            </tbody>
        </table>

        <div class="wc-proceed-to-checkout">

            <a class="checkout-button button alt wc-forward" href="{{ route('front.checkout') }}">{{ trans('front.Proceed to Checkout') }}</a>
        </div>
    </div>
</div>
