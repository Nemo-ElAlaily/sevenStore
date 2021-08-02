<!-- BEGIN TOP SEARCH -->
<li class="menu-search">
    <span class="sep"></span>
    <i class="fa fa-search search-btn"></i>
    <div class="search-box">
        <form action="{{ route('front.shop') }}" method="GET">
            <div class="input-group">
                <input type="text" id="search" class="form-control" value="{{ request()->search }}"
                       name="search" placeholder="{{ trans('site.Search Here') }}...">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">{{ trans('site.Search Here') }}</button>
                </span>
            </div>
        </form>
    </div>
</li>
<!-- END TOP SEARCH -->
