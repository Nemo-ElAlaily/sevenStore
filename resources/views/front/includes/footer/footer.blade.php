<footer id="colophon" class="site-footer">
    <div class="footer-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7">
                    <h5 class="newsletter-title">Sign up to Newsletter</h5>
                    <span class="newsletter-marketing-text">...and receive <strong>$20 coupon for first
                            shopping</strong></span>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button">Sign Up</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom-widgets">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5">
                    <div class="columns">
                        <aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
                            <div class="body">
                                <h4 class="widget-title">Find It Fast</h4>
                                <div class="menu-footer-menu-1-container">
                                    <ul id="menu-footer-menu-1" class="menu">
                                        <li class="menu-item"><a href="#">Laptops &#038; Computers</a></li>
                                        <li class="menu-item"><a href="#">Cameras &#038; Photography</a></li>
                                        <li class="menu-item"><a href="#">Smart Phones &#038; Tablets</a></li>
                                        <li class="menu-item"><a href="#">Video Games &#038; Consoles</a></li>
                                        <li class="menu-item"><a href="#">TV &#038; Audio</a></li>
                                        <li class="menu-item"><a href="#">Gadgets</a></li>
                                        <li class="menu-item "><a href="#">Car Electronic &#038; GPS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div><!-- /.columns -->

                    <div class="columns">
                        <aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
                            <div class="body">
                                <h4 class="widget-title">&nbsp;</h4>
                                <div class="menu-footer-menu-2-container">
                                    <ul id="menu-footer-menu-2" class="menu">
                                        <li class="menu-item"><a href="#">Printers &#038; Ink</a></li>
                                        <li class="menu-item "><a href="#">Software</a></li>
                                        <li
                                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-2742">
                                            <a href="#">Office Supplies</a></li>
                                        <li class="menu-item "><a href="#">Computer Components</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div><!-- /.columns -->

                    <div class="columns">
                        <aside id="nav_menu-4" class="widget clearfix widget_nav_menu">
                            <div class="body">
                                <h4 class="widget-title">Customer Care</h4>
                                <div class="menu-footer-menu-3-container">
                                    <ul id="menu-footer-menu-3" class="menu">
                                        <li class="menu-item"><a href="#">My Account</a></li>
                                        <li class="menu-item"><a href="#">Track your Order</a></li>
                                        <li class="menu-item"><a href="#">Wishlist</a></li>
                                        <li class="menu-item"><a href="#">Customer Service</a></li>
                                        <li class="menu-item"><a href="#">Returns/Exchange</a></li>
                                        <li class="menu-item"><a href="#">FAQs</a></li>
                                        <li class="menu-item"><a href="#">Product Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div><!-- /.columns -->

                </div><!-- /.col -->

                <div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
                    <div class="footer-logo">
                        <img src="{{ $site_settings->logo_path }}" style="height: 100px;"
                            alt="{{ $site_settings->title }}" />
                    </div><!-- /.footer-contact -->

                    <div class="footer-call-us">
                        <div class="media">
                            <span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
                            <div class="media-body">
                                <span class="call-us-text">Got Questions ? Call us 24/7!</span>
                                <span class="call-us-number">{{ $site_settings->phone }}</span>
                            </div>
                        </div>
                    </div><!-- /.footer-call-us -->


                    <div class="footer-address">
                        <strong class="footer-address-title">Contact Info</strong>
                        <address>{{ $site_settings->address }}, {{ $site_settings->city }},
                            {{ $site_settings->country }}</address>
                    </div><!-- /.footer-address -->

                    <div class="footer-social-icons">
                        <ul class="social-icons list-unstyled">
                            @foreach ($social_settings as $link)
                                @php
                                    $social_key = $link->where('key', $link->key)->first()->key;
                                    $social_value = $link->where('key', $link->key)->first()->value;
                                @endphp
                                <li><a class="fa fa-{{ strtolower($social_key) }}" href="{{ $social_value }}"></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="pull-left flip copyright">&copy; <a href="#">{{ $site_settings->title }}</a> - All Rights
                Reserved</div>
            <div class="pull-right flip payment">
                <div class="footer-payment-logo">
                    <ul class="cash-card card-inline">
                        <li class="card-item"><img src="{{ asset('front') }}/images/footer/payment-icon/1.png" alt=""
                                width="52"></li>
                        <li class="card-item"><img src="{{ asset('front') }}/images/footer/payment-icon/2.png" alt=""
                                width="52"></li>
                        <li class="card-item"><img src="{{ asset('front') }}/images/footer/payment-icon/3.png" alt=""
                                width="52"></li>
                        <li class="card-item"><img src="{{ asset('front') }}/images/footer/payment-icon/4.png" alt=""
                                width="52"></li>
                        <li class="card-item"><img src="{{ asset('front') }}/images/footer/payment-icon/5.png" alt=""
                                width="52"></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->
</footer><!-- #colophon -->
