
<?php
 $categories = App\Models\MainCategory::where('name', 'not like', 'بدون تصنيف')->where('parent_id', 0)->get();
?>

<aside id="sidebarHeader1" class="" aria-labelledby="sidebarHeaderInvokerMenu" style="animation-duration: 500ms; left: -335px;">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset pb-0">
                <!-- Toggle Button -->
                <div class="btnClose">
                    <i class="ec ec-close-remove text-gray-90 font-size-20"></i>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body mCustomScrollbar _mCS_1 mCS-autoHide" style="position: relative; overflow: visible;"><div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                        <!-- Logo -->
                        <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="#" aria-label="Electro">
                            <img src="{{ $site_settings -> logo_path }}" class="logoBrand" alt="">
                        </a>
                        <!-- End Logo -->

                        <!-- List -->
                        <ul id="headerSidebarList" class="u-header-collapse__nav">

                        @foreach($categories as $category)

                            <!-- Home Section -->
                            <li class="u-has-submenu u-header-collapse__submenu">
                                <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarHomeCollapse" data-target="#headerSidebarHomeCollapse">
                                    Home &amp; Static Pages
                                </a>

                                <div id="headerSidebarHomeCollapse" class="collapse" data-parent="#headerSidebarContent">
                                    <ul id="headerSidebarHomeMenu" class="u-header-collapse__nav-list">
                                        <!-- Home - v1 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v1</a></li>
                                        <!-- End Home - v1 -->
                                        <!-- Home - v2 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v2</a></li>
                                        <!-- End Home - v2 -->
                                        <!-- Home - v3 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v3</a></li>
                                        <!-- End Home - v3 -->
                                        <!-- Home - v3-full-color-bg -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v3.1</a></li>
                                        <!-- End Home - v3-full-color-bg -->
                                        <!-- Home - v4 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v4</a></li>
                                        <!-- End Home - v4 -->
                                        <!-- Home - v5 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v5</a></li>
                                        <!-- End Home - v5 -->
                                        <!-- Home - v6 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v6</a></li>
                                        <!-- End Home - v6 -->
                                        <!-- Home - v7 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Home v7</a></li>
                                        <!-- End Home - v7 -->
                                        <!-- About -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">About</a></li>
                                        <!-- End About -->
                                        <!-- Contact v1 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Contact v1</a></li>
                                        <!-- End Contact v1 -->
                                        <!-- Contact v2 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Contact v2</a></li>
                                        <!-- End Contact v2 -->
                                        <!-- FAQ -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">FAQ</a></li>
                                        <!-- End FAQ -->
                                        <!-- Store Directory -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Store Directory</a></li>
                                        <!-- End Store Directory -->
                                        <!-- Terms and Conditions -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">Terms and Conditions</a></li>
                                        <!-- End Terms and Conditions -->
                                        <!-- 404 -->
                                        <li><a class="u-header-collapse__submenu-nav-link" href="#">404</a></li>
                                        <!-- End 404 -->
                                    </ul>
                                </div>
                            </li>
                            <!-- End Home Section -->
                        @endforeach

                        </ul>
                        <!-- End List -->
                    </div>
                </div></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; top: 0px; height: 141px; display: block; max-height: 206px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
