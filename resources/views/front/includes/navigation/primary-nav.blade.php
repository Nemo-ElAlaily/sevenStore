<?php
    $navbar_pages =  App\Models\Pages\Page::where([['is_active','1'],['show_in_navbar','1']])->get();
?>
<div class="clearfix">
    <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse"
        data-target="#header-v3">
        &#9776;
    </button>
</div>

<div class="collapse navbar-toggleable-xs" id="header-v3">
    <ul class="nav navbar-nav">
          <!-- Dropdown -->
    <li class="nav-item dropdown menu-item m-auto">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{ trans('site.Pages') }}</a>
      <div class="dropdown-menu">
      @foreach ($navbar_pages as $page)
                <a class="dropdown-item" href='{{route("front.page.details",$page->slug)}}'>{{ $page->title }}</a>
       @endforeach


      </div>
    </li>
        @foreach ($main_categories->where('parent_id', 0)->slice(1, LaravelLocalization::getCurrentLocale() == 'ar' ? 7 : 8) as $main_category)
            <li class="menu-item m-auto">
                <a title="Gadgets"
                    href="{{ route('front.product.category', $main_category->slug) }}">{{ $main_category->name }}</a>
            </li>
        @endforeach
    </ul>
</div><!-- /.collpase -->
