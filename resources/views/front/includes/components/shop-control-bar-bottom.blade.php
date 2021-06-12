<div class="shop-control-bar-bottom">
    <form class="form-electro-wc-ppp">
        <select class="electro-wc-wppp-select c-select" name="ppp" wire:model="pagesize">
            <option value="12"  selected='selected'>Show 12</option>
            <option value="16"  selected='selected'>Show 16</option>
            <option value="20"  selected='selected'>Show 20</option>
            <option value="24"  selected='selected'>Show 24</option>
            <option value="-1" >Show All</option></select>
        </select>
    </form>
    <p class="woocommerce-result-count">
        Showing {{($products->currentpage()-1)*$products->perpage()+1}} - {{$products->currentpage()*$products->perpage()}}
        of  {{$products->total()}} Product
    </p>

    {{ $products->links('front.pagination.default') }}

</div>
