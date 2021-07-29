<!DOCTYPE html>
<html   lang="{{ LaravelLocalization::getCurrentLocale() }}"
        dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>

    {!! $site_settings -> google_analytics !!}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $site_settings->title }}</title>

    <link rel="shortcut icon" href="{{ $site_settings -> favicon_path }}">

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Global styles END -->

    @if(LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
    <!-- Global styles START -->
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bootstrap/css/bootstrap-rtl.css" rel="stylesheet" type="text/css">
        <!-- Global styles END -->

        <!-- Page level plugin styles START -->
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bxslider/jquery.bxslider-rtl.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/layerslider/css/layerslider.css" type="text/css">
        <!-- Page level plugin styles END -->

        <!-- Theme styles START -->
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/style-metronic-rtl.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/style-rtl.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/style-responsive-rtl.css" rel="stylesheet" type="text/css">
        <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/custom-rtl.css" rel="stylesheet" type="text/css">
        <!-- Theme styles END -->
    @else
    <!-- Global styles START -->
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bxslider/jquery.bxslider.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/layerslider/css/layerslider.css" type="text/css">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/style-metronic.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/style-responsive.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/css/custom.css" rel="stylesheet" type="text/css">
    <!-- Theme styles END -->
    @endif

</head>


            @include('themes.metronic.includes.header.top_bar')

            @include('themes.metronic.includes.header.header')



<!-- BEGIN SLIDER -->
<div class="page-slider margin-bottom-35">
    <!--LayerSlider begin-->
    <div id="layerslider" style="width: 100%; height: 494px; margin: 0 auto;">
        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer1" style="slidedirection: right; transition2d: 24,25,27,28; ">
            <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/sliders/slide1/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 title" style=" top: 96px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                Tones of <strong>shop UI features</strong> designed
            </div>
            <div class="ls-s-1 mini-text" style=" top: 338px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; showuntil : 4000; white-space: nowrap;">
                Lorem ipsum dolor sit amet  constectetuer diam<br > adipiscing elit euismod ut laoreet dolore.
            </div>
        </div>

        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer2" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/sliders/slide2/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 ls-title title" style=" top: 40%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                <strong class="title">Unlimted</strong>
                Layout Options
                <em class="title">Fully Responsive</em>
            </div>

            <div class="ls-s-2 ls-price title" style=" top: 50%; left: 45%; slidedirection : fade; slideoutdirection : fade; durationout : 109750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
                <b>from</b>
                <strong><span>$</span>25</strong>
            </div>

            <a href="#" class="ls-s-1 ls-more mini-text" style=" top: 72%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; display: inline-block; white-space: nowrap;">
                See More Details
            </a>
        </div>

        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer3" style="slidedirection: right; transition2d: 92,93,105; ">
            <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/sliders/slide3/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 ls-title" style=" top: 83px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                Full Admin & Frontend
                <strong>eCommerce UI</strong>
                Is Ready For Your Project
            </div>

            <div class="ls-s-1" style=" top: 333px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap; font-size: 20px; font: 20px 'Open Sans Light', sans-serif;">
                <a href="#" class="ls-buy">
                    Buy It Now!
                </a>
                <div class="ls-price">
                    <span>All these for only:</span>
                    <strong>25<sup>$</sup></strong>
                </div>
            </div>
        </div>

        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer5" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/sliders/slide5/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 title" style=" top: 35%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                The most<br>
                wanted bijouterie
            </div>

            <div class="ls-s-1 mini-text" style=" top: 70%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
                <span>Lorem ipsum and</span>
                <a href="#">Buy It Now!</a>
            </div>
        </div>
    </div>
    <!--LayerSlider end-->
</div>
<!-- END SLIDER -->

<div class="main">
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>New Arrivals</h2>
                <div class="bxslider-wrapper">
                    <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="5" data-slide-margin="15">
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model6.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model6.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="#">Berry Lace Dress4</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model5.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model5.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress5</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model7.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-4">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Ladies</a></li>
                    <li class="list-group-item clearfix dropdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-angle-right"></i>
                            Mens
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="list-group-item dropdown clearfix">
                                <a href="javascript:void(0);"><i class="fa fa-circle"></i> Shoes <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="list-group-item dropdown clearfix">
                                        <a href="javascript:void(0);"><i class="fa fa-circle"></i> Classic <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Classic 1</a></li>
                                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Classic 2</a></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item dropdown clearfix">
                                        <a href="javascript:void(0);"><i class="fa fa-circle"></i> Sport  <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Sport 1</a></li>
                                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Sport 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Trainers</a></li>
                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Jeans</a></li>
                            <li><a href="product-list.html"><i class="fa fa-circle"></i> Chinos</a></li>
                            <li><a href="product-list.html"><i class="fa fa-circle"></i> T-Shirts</a></li>
                        </ul>
                    </li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Kids</a></li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Accessories</a></li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Sports</a></li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Brands</a></li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Electronics</a></li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Home & Garden</a></li>
                    <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> Custom Link</a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-8">
                <h2>Three items</h2>
                <div class="bxslider-wrapper">
                    <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="3" data-slide-margin="15">
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-new"></div>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress2</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress3</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress4</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress5</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress6</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
            <!-- BEGIN TWO PRODUCTS -->
            <div class="col-md-6 two-items-bottom-items">
                <h2>Two items</h2>
                <div class="bxslider-wrapper">
                    <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="2" data-slide-margin="15">
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">Berry Lace Dress</a></h3>
                                <div class="pi-price">$29.00</div>
                                <a href="#" class="btn btn-default add2cart">Add to cart</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END TWO PRODUCTS -->
            <!-- BEGIN PROMO -->
            <div class="col-md-6">
                <div class="content-slider">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/index-sliders/slide1.jpg" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/index-sliders/slide2.jpg" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                            <div class="item">
                                <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/index-sliders/slide3.jpg" class="img-responsive" alt="Berry Lace Dress">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->
    </div>
</div>

<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="bxslider-wrapper">
                <ul class="bxslider" data-slides-phone="1" data-slides-tablet="3" data-slides-desktop="6" data-slide-margin="15">
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/canon.jpg" alt="canon" title="canon"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/esprit.jpg" alt="esprit" title="esprit"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/gap.jpg" alt="gap" title="gap"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/next.jpg" alt="next" title="next"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/puma.jpg" alt="puma" title="puma"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/zara.jpg" alt="zara" title="zara"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/canon.jpg" alt="canon" title="canon"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/esprit.jpg" alt="esprit" title="esprit"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/gap.jpg" alt="gap" title="gap"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/next.jpg" alt="next" title="next"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/puma.jpg" alt="puma" title="puma"></a></li>
                    <li><a href="product-list.html"><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/brands/zara.jpg" alt="zara" title="zara"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END BRANDS -->

<!-- BEGIN STEPS -->
<div class="steps3 steps3red">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps3-col">
                <i class="fa fa-truck"></i>
                <div>
                    <h2>Free shipping</h2>
                    <em>Express delivery withing 3 days</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps3-col">
                <i class="fa fa-gift"></i>
                <div>
                    <h2>Daily Gifts</h2>
                    <em>3 Gifts daily for lucky customers</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps3-col">
                <i class="fa fa-phone"></i>
                <div>
                    <h2>477 505 8877</h2>
                    <em>24/7 customer care available</em>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STEPS -->

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
                <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM INFO BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Information</h2>
                <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Delivery Information</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Customer Service</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Order Tracking</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Shipping & Returns</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Careers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Payment Methods</a></li>
                </ul>
            </div>
            <!-- END INFO BLOCK -->
            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Latest Tweets</h2>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@keenthemes</a>
                        Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                        <span>3 min ago</span>
                    </dd>
                </dl>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@keenthemes</a>
                        Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                        <span>3 min ago</span>
                    </dd>
                </dl>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@keenthemes</a>
                        Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                        <span>3 min ago</span>
                    </dd>
                </dl>
            </div>
            <!-- END TWITTER BLOCK -->
            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Our Contacts</h2>
                <address class="margin-bottom-40">
                    35, Lorem Lis Street, Park Ave<br>
                    California, US<br>
                    Phone: 300 323 3456<br>
                    Fax: 300 323 1456<br>
                    Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
                    Skype: <a href="skype:metronic">metronic</a>
                </address>
            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
            <!-- BEGIN SOCIAL ICONS -->
            <div class="col-md-6 col-sm-6">
                <ul class="social-icons">
                    <li><a class="rss" data-original-title="rss" href="#"></a></li>
                    <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
                    <li><a class="linkedin" data-original-title="linkedin" href="#"></a></li>
                    <li><a class="youtube" data-original-title="youtube" href="#"></a></li>
                    <li><a class="vimeo" data-original-title="vimeo" href="#"></a></li>
                    <li><a class="skype" data-original-title="skype" href="#"></a></li>
                </ul>
            </div>
            <!-- END SOCIAL ICONS -->
            <!-- BEGIN NEWLETTER -->
            <div class="col-md-6 col-sm-6">
                <div class="pre-footer-subscribe-box pull-right">
                    <h2>Newsletter</h2>
                    <form action="#">
                        <div class="input-group">
                            <input type="text" placeholder="youremail@mail.com" class="form-control">
                            <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END NEWLETTER -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer padding-top-15">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                2014 © Metronic Shop UI. ALL Rights Reserved.
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-6 col-sm-6">
                <ul class="list-unstyled list-inline pull-right margin-bottom-15">
                    <li><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
                    <li><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
                    <li><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
                    <li><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
                    <li><img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
                </ul>
            </div>
            <!-- END PAYMENTS -->
        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- BEGIN fast view of a product -->
<div id="product-pop-up" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-3">
                <div class="product-main-image">
                    <img src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                </div>
                <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/temp/products/model5.jpg"></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-9">
                <h1>Cool green dress with red bell</h1>
                <div class="price-availability-block clearfix">
                    <div class="price">
                        <strong><span>$</span>47.00</strong>
                        <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                        Availability: <strong>In Stock</strong>
                    </div>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat
                        Nostrud duis molestie at dolore.</p>
                </div>
                <div class="product-page-options">
                    <div class="pull-left">
                        <label class="control-label">Size:</label>
                        <select class="form-control input-sm">
                            <option>L</option>
                            <option>M</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <div class="pull-left">
                        <label class="control-label">Color:</label>
                        <select class="form-control input-sm">
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Black</option>
                        </select>
                    </div>
                </div>
                <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <button class="btn btn-default" type="submit">More details</button>
                </div>
            </div>

            <div class="sticker sticker-sale"></div>
        </div>
    </div>
</div>
<!-- END fast view of a product -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/respond.min.js"></script>
<![endif]-->
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/back-to-top.js"></script>
<script type="text/javascript" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- pop up -->
<script type="text/javascript" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bxslider/jquery.bxslider.min.js"></script><!-- slider for products -->
<script type="text/javascript" src='{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/zoom/jquery.zoom.min.js'></script><!-- product zoom -->
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<!-- BEGIN LayerSlider -->
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/layerslider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/layerslider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<script type="text/javascript" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/scripts/app.js"></script>
<script type="text/javascript" src="{{ asset('front/metronic/' . LaravelLocalization::getCurrentLocaleDirection()) }}/scripts/index.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initBxSlider();
        Index.initLayerSlider();
        App.initImageZoom();
        App.initTouchspin();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>

</html>
