<?php
$categories = App\Models\MainCategories\MainCategory::whereTranslation('name', 'not like', 'بدون تصنيف')
    ->where('parent_id', 0)
    ->get();
?>
<section class="sidebar-header-parent">
    <aside id="sidebarHeader1" class="" aria-labelledby="sidebarHeaderInvokerMenu"
        style="animation-duration: 500ms; left: -335px;">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-header-sidebar__footer-offset pb-0">

                    <!-- Content -->
                    <div class="js-scrollbar u-sidebar__body mCustomScrollbar _mCS_1 mCS-autoHide"
                        style="position: relative; overflow: visible;">
                        <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside"
                            style="max-height: none;" tabindex="0">
                            <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                                dir="ltr">
                                <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                    <!-- Toggle Button -->
                                    <div class="btnClose">
                                        <i class="ec ec-close-remove text-gray-90 font-size-20"></i>
                                    </div>
                                    <!-- End Toggle Button -->

                                    <div class="header-front-side">
                                        <!-- Logo -->
                                        <a class="ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical"
                                            href="#" aria-label="Electro">
                                            <img src="{{ $site_settings->logo_path }}"
                                                class="logoBrand animate__backInDown" alt="">
                                        </a>
                                        <!-- End Logo -->

                                    </div>
                                    <!-- List -->
                                    <ul id="headerSidebarList" class="u-header-collapse__nav">

                                        @foreach ($categories as $category)

                                            <!-- Home Section -->
                                            <li class="u-has-submenu u-header-collapse__submenu">
                                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer"
                                                    href="javascript:;" role="button" data-toggle="collapse"
                                                    aria-expanded="false" aria-controls="{{ $category->id }}"
                                                    data-target="#{{ $category->id }}">
                                                    {{ $category->name }}
                                                </a>


                                                <div id="{{ $category->id }}" class="collapse"
                                                    data-parent="#{{ $category->id }}">
                                                    <ul id="headerSidebarHomeMenu" class="u-header-collapse__nav-list">
                                                        @foreach ($category->sub_categories as $sub_category)
                                                            <!-- Home - v1 -->
                                                            <li><a class="u-header-collapse__submenu-nav-link"
                                                                    href="{{ route('front.product.category', $sub_category->slug) }}">{{ $sub_category->name }}</a>
                                                            </li>
                                                            <!-- End Home - v1 -->
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </li>
                                            <!-- End Home Section -->
                                        @endforeach

                                    </ul>
                                    <!-- End List -->
                                </div>
                            </div>
                        </div>
                        <div id="mCSB_1_scrollbar_vertical"
                            class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical"
                            style="display: block;">
                            <div class="mCSB_draggerContainer">
                                <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 50px; top: 0px; height: 141px; display: block; max-height: 206px;">
                                    <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                                </div>
                                <div class="mCSB_draggerRail"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    </aside>
</section>
