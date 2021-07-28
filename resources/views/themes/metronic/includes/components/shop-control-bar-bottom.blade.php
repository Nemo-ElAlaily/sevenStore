<div class="shop-control-bar-bottom">
    <form class="form-electro-wc-ppp">
        <select class="electro-wc-wppp-select c-select" name="ppp" wire:model="pagesize">
            <option value="12" selected='selected'>{{ trans('front.Show') }} 12</option>
            <option value="16" selected='selected'>{{ trans('front.Show') }} 16</option>
            <option value="20" selected='selected'>{{ trans('front.Show') }} 20</option>
            <option value="24" selected='selected'>{{ trans('front.Show') }} 24</option>
            <option value="-1">{{ trans('front.Show All') }}</option>
        </select>
        </select>
    </form>
    <p class="woocommerce-result-count">
        {{ trans('front.Showing') }} {{ ($products->currentpage() - 1) * $products->perpage() + 1 }} -
        {{ $products->currentpage() * $products->perpage() }}
        {{ trans('front.of') }} {{ $products->total() }} {{ trans('front.products') }}
    </p>

    {{ $products->links('themes.electro.pagination.default') }}

</div>
