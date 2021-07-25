<form xmlns:wire="http://www.w3.org/1999/xhtml">

    <table class="shop_table shop_table_responsive cart">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>
                <th class="product-thumbnail">&nbsp;</th>
                <th class="product-name">{{ trans('front.Product') }}</th>
                <th class="product-price">{{ trans('front.Price') }}</th>
                <th class="product-quantity">{{ trans('front.Quantity') }}</th>
                <th class="product-subtotal">{{ trans('front.Total') }}</th>
            </tr>
        </thead>
        <tbody>

            @if (Cart::instance('cart')->count() > 0)
                @foreach (Cart::instance('cart')->content() as $item)
                    <tr class="cart_item">

                        <td class="product-remove">
                            <a class="remove" href="#" wire:click.prevent="destroy('{{ $item->rowId }}')">×</a>
                        </td>

                        <td class="product-thumbnail">
                            <a href="#"><img width="180" height="180" src="{{ $item->model->image_path }}"
                                    alt="{{ $item->model->slug }}"></a>
                        </td>

                        <td data-title="Product" class="product-name">
                            <a
                                href="{{ route('front.product.details', $item->model->slug) }}">{{ $item->model->name }}</a>
                        </td>

                        <td data-title="Price" class="product-price">
                            <span class="amount">&pound; {{ $item->model->sale_price }}</span>
                        </td>

                        <td data-title="Quantity" class="product-quantity">
                            <div class="quantity buttons_added">
                                <input type="button" class="minus" value="{{ $item->model->qty }}">
                                <label>{{ trans('front.Quantity') }}:</label>
                                <input type="number" size="4" class="input-text qty text" title="Qty"
                                    value="{{ $item->qty }}" name="{{ $item->model->qty }}" max="29" min="0"
                                    step="1">
                                <a class="btn btn-increase plus" href="#"
                                    wire:click.prevent="increaseQty('{{ $item->rowId }}')">+</a>
                                <a class="btn btn-reduce minus" href="#"
                                    wire:click.prevent="decreaseQty('{{ $item->rowId }}')">-</a>
                            </div>
                        </td>

                        <td data-title="Total" class="product-subtotal">
                            <span class="amount">&pound; {{ $item->subtotal }}</span>
                        </td>
                    </tr>
                @endforeach
            @else
                <p class="cart_item">

                    {{ trans('front.No Items added to the Cart') }}

                </p>
            @endif


            <tr>
                <td class="actions" colspan="6">

                    {{-- <div class="coupon"> --}}

                    {{-- <label for="coupon_code">Coupon:</label> <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code"> --}}
                    {{-- <input type="submit" value="Apply Coupon" name="apply_coupon" class="button"> --}}

                    {{-- </div> --}}

                    <a class="button font-weight-bold" wire:click.prevent="destroyAll()">{{ trans('front.Delete All') }}</a>

                    <div class="wc-proceed-to-checkout">

                        <a class="checkout-button button alt wc-forward" href="{{ route('front.checkout') }}">{{ trans('front.Proceed to Checkout') }}</a>
                    </div>

                    <input type="hidden" value="1eafc42c5e" name="_wpnonce" id="_wpnonce"><input type="hidden"
                        value="/electro/cart/" name="_wp_http_referer">
                </td>
            </tr>
        </tbody>
    </table>
</form>
