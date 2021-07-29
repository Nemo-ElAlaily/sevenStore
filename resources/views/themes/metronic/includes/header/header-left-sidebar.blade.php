<?php
$categories = App\Models\MainCategories\MainCategory::where([['parent_id', 0],['is_active','1'],['show_in_sidebar','1']])->get();
    $sidebar_pages =  App\Models\Pages\Page::where([['is_active','1'],['show_in_sidebar','1']])->get();
?>

<!-- BEGIN NAVIGATION -->
<div class="collapse navbar-collapse mega-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                Woman
                <i class="fa fa-angle-down"></i>
            </a>
            <!-- BEGIN DROPDOWN MENU -->
            <ul class="dropdown-menu" aria-labelledby="mega-menu">
                <li>
                    <div class="nav-content">
                        <!-- BEGIN DROPDOWN MENU - COLUMN -->
                        <div class="nav-content-col">
                            <h3>Footwear</h3>
                            <ul>
                                <li><a href="product-list.html">Astro Trainers</a></li>
                                <li><a href="product-list.html">Basketball Shoes</a></li>
                                <li><a href="product-list.html">Boots</a></li>
                                <li><a href="product-list.html">Canvas Shoes</a></li>
                                <li><a href="product-list.html">Football Boots</a></li>
                                <li><a href="product-list.html">Golf Shoes</a></li>
                                <li><a href="product-list.html">Hi Tops</a></li>
                                <li><a href="product-list.html">Indoor and Court Trainers</a></li>
                            </ul>
                        </div>
                        <!-- END DROPDOWN MENU - COLUMN -->
                        <!-- BEGIN DROPDOWN MENU - COLUMN -->
                        <div class="nav-content-col">
                            <h3>Clothing</h3>
                            <ul>
                                <li><a href="product-list.html">Base Layer</a></li>
                                <li><a href="product-list.html">Character</a></li>
                                <li><a href="product-list.html">Chinos</a></li>
                                <li><a href="product-list.html">Combats</a></li>
                                <li><a href="product-list.html">Cricket Clothing</a></li>
                                <li><a href="product-list.html">Fleeces</a></li>
                                <li><a href="product-list.html">Gilets</a></li>
                                <li><a href="product-list.html">Golf Tops</a></li>
                            </ul>
                        </div>
                        <!-- END DROPDOWN MENU - COLUMN -->
                        <!-- BEGIN DROPDOWN MENU - COLUMN -->
                        <div class="nav-content-col">
                            <h3>Accessories</h3>
                            <ul>
                                <li><a href="product-list.html">Belts</a></li>
                                <li><a href="product-list.html">Caps</a></li>
                                <li><a href="product-list.html">Gloves, Hats and Scarves</a></li>
                            </ul>

                            <h3>Clearance</h3>
                            <ul>
                                <li><a href="product-list.html">Jackets</a></li>
                                <li><a href="product-list.html">Bottoms</a></li>
                            </ul>
                        </div>
                        <!-- END DROPDOWN MENU - COLUMN -->
                        <!-- BEGIN DROPDOWN MENU - BRANDS -->
                        <div class="nav-brands">
                            <ul>
                                <li><a href="product-list.html"><img title="esprit" alt="esprit" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/esprit.jpg"></a></li>
                                <li><a href="product-list.html"><img title="gap" alt="gap" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/gap.jpg"></a></li>
                                <li><a href="product-list.html"><img title="next" alt="next" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/next.jpg"></a></li>
                                <li><a href="product-list.html"><img title="puma" alt="puma" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/puma.jpg"></a></li>
                                <li><a href="product-list.html"><img title="zara" alt="zara" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/zara.jpg"></a></li>
                            </ul>
                        </div>
                        <!-- END DROPDOWN MENU - BRANDS -->
                    </div>
                </li>
            </ul>
            <!-- END DROPDOWN MENU -->
        </li>
        <li><a href="product-list.html">Men</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                Kids
                <i class="fa fa-angle-down"></i>
            </a>
            <!-- BEGIN DROPDOWN MENU -->
            <ul class="dropdown-menu">
                <li class="dropdown-submenu">
                    <a href="product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="product-list.html">Second Level Link</a></li>
                        <li><a href="product-list.html">Second Level Link</a></li>
                        <li class="dropdown-submenu">
                            <a href="product-list.html">Second Level Link <i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="product-list.html">Third Level Link</a></li>
                                <li><a href="product-list.html">Third Level Link</a></li>
                                <li><a href="product-list.html">Third Level Link</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="product-list.html">Running Shoes</a></li>
                <li><a href="product-list.html">Jackets and Coats</a></li>
                <li><a href="product-list.html">Tennis Clothing</a></li>
                <li class="dropdown-submenu">
                    <a href="product-list.html">Running Clothing <i class="fa fa-angle-right"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="product-list.html">Second Level Link</a></li>
                        <li><a href="product-list.html">Second Level Link</a></li>
                        <li class="dropdown-submenu">
                            <a href="product-list.html">Second Level Link <i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="product-list.html">Third Level Link</a></li>
                                <li><a href="product-list.html">Third Level Link</a></li>
                                <li><a href="product-list.html">Third Level Link</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END DROPDOWN MENU -->
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                New
                <i class="fa fa-angle-down"></i>
            </a>
            <!-- BEGIN DROPDOWN MENU -->
            <ul class="dropdown-menu" aria-labelledby="mega-menu-catalogue">
                <li>
                    <div class="nav-content">
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <a href="item.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                            </div>
                            <h3><a href="item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">$29.00</div>
                            <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <a href="item.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                            </div>
                            <h3><a href="item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">$29.00</div>
                            <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <a href="item.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                            </div>
                            <h3><a href="item.html">Berry Lace Dress</a></h3>
                            <div class="pi-price">$29.00</div>
                            <a href="#" class="btn btn-default add2cart">Add to cart</a>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- END DROPDOWN MENU -->
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="#" href="#">
                Pages
                <i class="fa fa-angle-down"></i>
            </a>
            <!-- BEGIN DROPDOWN MENU -->
            <ul class="dropdown-menu">
                <li><a href="index-light-footer.html">Light Footer</a></li>
                <li><a href="product-list.html">Product List</a></li>
                <li><a href="search-result.html">Search Result</a></li>
                <li><a href="item.html">Product Page</a></li>
                <li><a href="shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>
                <li><a href="shopping-cart.html">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="reg-page.html">Registration Page</a></li>
                <li><a href="login-page.html">Login Page</a></li>
                <li><a href="forgotton-password.html">Forget Password</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contacts.html">Contacts</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                <li><a href="terms-conditions-page.html">Terms & Conditions</a></li>
                <li><a href="site-map.html">Site Map</a></li>
                <li><a href="page-404.html">404</a></li>
                <li><a href="page-500.html">500</a></li>
            </ul>
            <!-- END DROPDOWN MENU -->
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="#" href="#">
                Features
                <i class="fa fa-angle-down"></i>
            </a>
            <!-- BEGIN DROPDOWN MENU -->
            <ul class="dropdown-menu">
                <li><a href="feature-typography.html">Typography</a></li>
                <li><a href="feature-forms.html">Forms</a></li>
                <li><a href="feature-buttons.html">Buttons</a></li>
                <li><a href="feature-icons.html">Icons</a></li>
            </ul>
            <!-- END DROPDOWN MENU -->
        </li>
        <li><a href="http://keenthemes.com/preview/metronic_admin/ecommerce_index.html">Admin theme</a></li>
        <!-- BEGIN TOP SEARCH -->
        <li class="menu-search">
            <span class="sep"></span>
            <i class="fa fa-search search-btn"></i>
            <div class="search-box">
                <form action="#">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                    </div>
                </form>
            </div>
        </li>
        <!-- END TOP SEARCH -->
    </ul>
</div>
<!-- END NAVIGATION -->
