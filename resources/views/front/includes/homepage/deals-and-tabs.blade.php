<div class="home-v1-deals-and-tabs deals-and-tabs row animate-in-view fadeIn animated" data-animation="fadeIn">

    <div class="tabs-block col-lg-12">
        <div class="products-carousel-tabs">
            <ul class="nav nav-inline">
                <li class="nav-item"><a class="nav-link active" href="#tab-products-1" data-toggle="tab">Featured</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#tab-products-2" data-toggle="tab">On Sale</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-products-3" data-toggle="tab">Top Rated</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab-products-1" role="tabpanel">
                    <div class="woocommerce columns-3">
                        @include('front.includes.components.product-item_featured')
                    </div>
                </div>

                <div class="tab-pane active" id="tab-products-2" role="tabpanel">
                    <div class="woocommerce columns-3">
                        @include('front.includes.components.product-item_on_sale')
                    </div>
                </div>

                <div class="tab-pane" id="tab-products-3" role="tabpanel">
                    <div class="woocommerce columns-3">
                        @include('front.includes.components.product-item_top_rated')
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.tabs-block -->
</div><!-- /.deals-and-tabs -->
