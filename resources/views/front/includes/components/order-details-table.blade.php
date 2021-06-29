<form>

    @include('front.partials._errors')
    @include('front.partials._session')

    <div id="customer_details" class="col2-set">
        <div class="col-1">
            <div class="woocommerce-billing-fields">

                <h3>Shipping Details</h3>

                <p id="first_name" class="form-row form-row form-row-first validate-required">
                    <label class="" for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="input-text" value="{{ $order -> user -> first_name }}">
                </p>

                <p id="last_name" class="form-row form-row form-row-last validate-required">
                    <label class="" for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="input-text" value="{{ $order -> user -> last_name }}">

                </p>

                <div class="clear"></div>

                <p id="email" class="form-row form-row form-row-first validate-required validate-email">
                    <label class="" for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="input-text " value="{{ $order -> email }}">
                </p>

                <p id="phone" class="form-row form-row form-row-last validate-required validate-phone">
                    <label class="" for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" class="input-text " value="{{ $order -> phone }}">
                </p>

                <div class="clear"></div>


                <p id="shipping_address_1" class="form-row form-row form-row-wide address-field">
                    <label class="" for="shipping_address_1">Address 1</label>
                    <input type="text"  id="shipping_address_1" name="shipping_address_1" class="input-text" value="{{ $order -> address_1 }}">
                </p>

                <p id="shipping_address_2" class="form-row form-row form-row-wide address-field">
                    <input type="text" class="input-text" value="{{ $order -> address_2 }}">
                </p>

                <p id="shipping_city" class="form-row form-row form-row-first address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                    <label class="" for="shipping_city">Region / State</label>
                    <input type="text" class="input-text" value="{{ $order -> state }}">

                </p>

                <p id="shipping_city" class="form-row form-row form-row-last address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                    <label class="" for="shipping_city">Town / City</label>
                    <input type="text" class="input-text" value="{{ $order -> city }}">

                </p>

                <p id="shipping_country" class="form-row form-row form-row-first validate-required validate-email">
                    <label class="" for="shipping_country">State / County</label>
                    <input type="text" class="input-text " value="{{ $order -> country }}">
                </p>

                <div class="clear"></div>

            </div>
        </div>

        <div class="col-2">
            <h3 id="order_review_heading">Your order</h3>

            <div class="woocommerce-checkout-review-order" id="order_review">
                <table class="shop_table woocommerce-checkout-review-order-table" style="background: rgba(0, 0, 0, 0.035);">
                    <thead>
                    <tr>
                        <th class="product-name">Product</th>
                        <th class="product-total">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order -> orderItems as $item)
                        <tr class="cart_item">
                            <td class="product-name">
                                <a href="{{ route('front.product.details', $item -> product -> slug) }}">{{ $item -> product -> name }}</a>
                                <strong class="product-quantity">× {{ $item -> qty }}</strong>
                            </td>
                            <td class="product-total">
                                <span class="amount">&pound; {{ $item -> item_total }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>

                    <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td><span class="amount">&pound; {{ $order -> subtotal }}</span></td>
                    </tr>

                    <tr class="shipping">
                        <th>Shipping</th>
                        <td data-title="Shipping">Flat Rate:
                            <span class="amount">&pound; {{ $order -> shipping_cost }}</span>
                        </td>
                    </tr>

                    <tr class="order-total">
                        <th>Total</th>
                        <td>
                            <strong>
                                <span class="amount">&pound; {{ $order -> total }}</span>
                            </strong>
                        </td>
                    </tr>

                    <tr class="order-total">
                        <th>Payment Method</th>
                        <td>
                            <strong>
                                <span class="amount">{{ $order -> getPaymentMethod() }}</span>
                            </strong>
                        </td>
                    </tr>


                    </tfoot>
                </table>

            </div>
        </div>
    </div>

</form>
