<form class="woocommerce-ordering" method="get" xmlns:wire="http://www.w3.org/1999/xhtml"
    xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
    <select name="orderby" class="orderby" wire:model="sorting">
        <option value="default" selected='selected'>{{ trans('front.Default sorting') }}</option>
        <option value="date">{{ trans('front.Sort by newness') }}</option>
        <option value="price">{{ trans('front.Sort by price: low to high') }}</option>
        <option value="price-desc">{{ trans('front.Sort by price: high to low') }}</option>
    </select>
</form>
<form class="form-electro-wc-ppp">
    <select name="ppp" class="electro-wc-wppp-select c-select" wire:model="pagesize">
        <option value="12" selected='selected'>{{ trans('front.Show') }} 12</option>
        <option value="16" selected='selected'>{{ trans('front.Show') }} 16</option>
        <option value="20" selected='selected'>{{ trans('front.Show') }} 20</option>
        <option value="24" selected='selected'>{{ trans('front.Show') }} 24</option>
        <option value="-1">{{ trans('front.Show All') }}</option>
    </select>
</form>
<nav class="electro-advanced-pagination">
    <form method="post" class="form-adv-pagination">
        <input id="goto-page" size="2" min="1" max="2" step="1" type="number" class="form-control"
            value="{{ $products->currentpage() }}" />
    </form> of 2
    <a class="next page-numbers" href="#">{{ LaravelLocalization::getCurrentLocale() == 'ar' ? html_entity_decode('&larr;')  : html_entity_decode('&rarr;') }}</a>
    <script>
        jQuery(document).ready(function($) {
            $('.form-adv-pagination').on('submit', function() {
                var link = '#',
                    goto_page = $('#goto-page').val(),
                    new_link = link.replace('%#%', goto_page);

                window.location.href = new_link;
                return false;
            });
        });
    </script>
</nav>
