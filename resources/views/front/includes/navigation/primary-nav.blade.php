<div class="clearfix">
    <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse"
        data-target="#header-v3">
        &#9776;
    </button>
</div>

<div class="collapse navbar-toggleable-xs" id="header-v3">
    <ul class="nav navbar-nav">

        @foreach ($main_categories->where('parent_id', 0)->slice(1, 9) as $main_category)
            <li class="menu-item">
                <a title="Gadgets"
                    href="{{ route('front.product.category', $main_category->slug) }}">{{ $main_category->name }}</a>
            </li>
        @endforeach
    </ul>
</div><!-- /.collpase -->
