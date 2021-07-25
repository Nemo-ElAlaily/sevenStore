<form xmlns:wire="http://www.w3.org/1999/xhtml" wire:submit.prevent="placeOrder">

    @include('front.partials._errors')
    @include('front.partials._session')

    <div id="customer_details" class="col2-set">
        <div class="col-1">
            <div class="woocommerce-billing-fields">

                <h3>Shipping Details</h3>

                <p id="first_name" class="form-row form-row form-row-first validate-required">
                    <label class="" for="first_name">First Name
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="text" wire:model="first_name" id="first_name" name="first_name" class="input-text ">
                    @error('first_name')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="last_name" class="form-row form-row form-row-last validate-required">
                    <label class="" for="last_name">Last Name
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="text" wire:model="last_name" id="last_name" name="last_name" class="input-text ">
                    @error('last_name')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <div class="clear"></div>

                <p id="company" class="form-row form-row form-row-wide">
                    <label class="" for="company">Company Name</label>
                    <input type="text" wire:model="company" id="company" name="company" class="input-text ">
                    @error('company')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="email" class="form-row form-row form-row-first validate-required validate-email">
                    <label class="" for="email">Email Address
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="email" wire:model="email" disabled id="email" name="email" class="input-text ">

                    @error('email')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="phone" class="form-row form-row form-row-last validate-required validate-phone">
                    <label class="" for="phone">Phone
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="tel" wire:model="phone" id="phone" name="phone" class="input-text ">
                    @error('phone')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <div class="clear"></div>


                <p id="shipping_address_1" class="form-row form-row form-row-wide address-field">
                    <label class="" for="shipping_address_1">Address 1
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="text" wire:model="shipping_address_1" id="shipping_address_1" name="shipping_address_1"
                        class="input-text ">
                    @error('shipping_address_1')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="shipping_address_2" class="form-row form-row form-row-wide address-field">
                    <input type="text" wire:model="shipping_address_2" id="shipping_address_2" name="shipping_address_2"
                        class="input-text ">

                    @error('shipping_address_2')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="shipping_city" class="form-row form-row form-row-wide address-field validate-required"
                    data-o_class="form-row form-row form-row-wide address-field validate-required">
                    <label class="" for="shipping_city">Town / City
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="text" wire:model="shipping_city" id="shipping_city" name="shipping_city"
                        class="input-text ">
                    @error('shipping_city')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="shipping_country" class="form-row form-row form-row-first validate-required validate-email">
                    <label class="" for="shipping_country">State / County
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="text" wire:model="shipping_country" id="shipping_country" name="shipping_country"
                        class="input-text ">
                    @error('shipping_country')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <p id="shipping_postcode"
                    class="form-row form-row form-row-last address-field validate-postcode validate-required"
                    data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                    <label class="" for="shipping_postcode">Postcode / ZIP
                        <abbr title="required" class="required">*</abbr>
                    </label>
                    <input type="text" wire:model="shipping_postcode" id="shipping_postcode" name="shipping_postcode"
                        class="input-text ">
                    @error('shipping_postcode')
                        <span class="text-danger mx-1">{{ $message }}</span>
                    @enderror
                </p>

                <div class="clear"></div>

                {{-- <p class="form-row form-row-wide create-account"> --}}
                {{-- <input type="checkbox" value="1" name="use_current_data" id="make_main_data" class="input-checkbox" wire:model="use_current_data"> --}}
                {{-- <label class="checkbox" for="use_current_data">Use Current Address</label> --}}
                {{-- </p> --}}

                <p class="form-row form-row-wide create-account">
                    <input type="checkbox" value="1" name="make_main_data" id="make_main_data" class="input-checkbox"
                        wire:model="make_main_data">
                    <label class="checkbox" for="make_main_data">Save as Main Address</label>
                </p>

            </div>
        </div>

        <div class="col-2">
            <h3 id="order_review_heading">Your order</h3>

            <div class="woocommerce-checkout-review-order" id="order_review">
                <table class="shop_table woocommerce-checkout-review-order-table"
                    style="background: rgba(0, 0, 0, 0.035);">
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::instance('cart')->content() as $item)
                            <tr class="cart_item">
                                <td class="product-name">
                                    {{ $item->model->name }}
                                    <strong class="product-quantity">× {{ $item->qty }}</strong>
                                </td>
                                <td class="product-total">
                                    <span class="amount">&pound; {{ $item->subtotal }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td><span class="amount">&pound; {{ Cart::instance('cart')->subtotal() }}</span></td>
                        </tr>

                        <tr class="shipping">
                            <th>Shipping</th>
                            <td data-title="Shipping">Flat Rate:
                                <span class="amount">&pound; {{ Cart::instance('cart')->total }}</span>
                            </td>
                        </tr>

                        <tr class="order-total">
                            <th>Total</th>
                            <td>
                                <strong>
                                    <span class="amount">&pound; {{ Cart::instance('cart')->total }}</span>
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <div class="woocommerce-checkout-payment" id="payment">
                    <ul class="wc_payment_methods payment_methods methods">
                        @error('payment_method')
                            <span class="text-danger mx-1">{{ $message }}</span>
                        @enderror
                        <li class="wc_payment_method payment_method_bacs">
                            <input type="radio" data-order_button_text="" value="bacs" name="payment_method"
                                class="input-radio" id="payment_method_bacs" wire:model="payment_method">
                            <label for="payment_method_bacs">Direct Bank Transfer</label>
                            <div class="payment_box payment_method_bacs">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order won’t be shipped until the funds have cleared in our
                                    account.</p>
                            </div>
                        </li>

                        <li class="wc_payment_method payment_method_cod">
                            <input type="radio" data-order_button_text="" value="cod" name="payment_method"
                                class="input-radio" id="payment_method_cod" wire:model="payment_method">

                            <label for="payment_method_cod">Cash on Delivery</label>
                            <div style="display:none;" class="payment_box payment_method_cod">
                                <p>Pay with cash upon delivery.</p>
                            </div>
                        </li>

                        <li class="wc_payment_method payment_method_paypal">
                            <input type="radio" data-order_button_text="Proceed to PayPal" value="fawry"
                                name="payment_method" class="input-radio" id="payment_method_fawry"
                                wire:model="payment_method">

                            <label for="payment_method_fawry">Fawry <img alt="PayPal Acceptance Mark"
                                    src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg">
                                <a title="What is PayPal?"
                                    onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"
                                    class="about_paypal" href="#">What is Fawry?</a>
                            </label>
                            <div style="display:none;" class="payment_box payment_method_paypal">
                                <p>Pay via Fawry. </p>
                            </div>
                        </li>

                        <li class="wc_payment_method payment_method_paypal">
                            <input type="radio" data-order_button_text="Proceed to PayPal" value="paymob"
                                name="payment_method" class="input-radio" id="payment_method_paymob"
                                wire:model="payment_method">

                            <label for="payment_method_paymob">PayMob <img alt="PayPal Acceptance Mark"
                                    src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg">
                                <a title="What is PayMob?"
                                    onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"
                                    class="about_paypal" href="#">What is PayMob?</a>
                            </label>
                            <div style="display:none;" class="payment_box payment_method_paypal">
                                <p>Pay via PayMob; you can pay with your credit card if you don’t have a PayMob account.
                                </p>
                            </div>
                        </li>

                    </ul>

                    <div class="form-row place-order">

                        <p class="form-row terms wc-terms-and-conditions">
                            <input type="checkbox" id="terms" name="terms" class="input-checkbox" wire:model="terms"
                                value="1">
                            <label class="checkbox" for="terms">I’ve read and accept the <a target="_blank"
                                    href="#">terms &amp; conditions</a> <span class="required">*</span></label>
                            @error('terms')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </p>

                        <input type="submit" data-value="Place order" value="Place order" class="button alt">

                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
