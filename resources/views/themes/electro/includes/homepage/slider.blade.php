<?php
    $sliders = \App\Models\Sliders\Slider::all();
?>

<div class="home-v1-slider">
    <!-- ========================================== SECTION – HERO : END========================================= -->

    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

        @foreach($sliders as $index => $slider)
        <div class="item" style="background-image: url({{ $slider -> image_path }})">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-5">
                        <div class="caption vertical-center text-left">
                            <div class="hero-1 fadeInDown-1">
                                {{ $slider -> title }}
                            </div>

                            <div class="hero-subtitle fadeInDown-2">
                                {{ $slider -> sub_title }}
                            </div>

                            <div class="hero-action-btn fadeInDown-4">
                                <a href="{{ $slider -> link == null ? route('front.shop') : $slider -> link }}" class="big le-button ">Go To Page</a>
                            </div>
                        </div><!-- /.caption -->
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.item -->

        @endforeach


    </div><!-- /.owl-carousel -->

    <!-- ========================================= SECTION – HERO : END ========================================= -->

</div><!-- /.home-v1-slider -->
