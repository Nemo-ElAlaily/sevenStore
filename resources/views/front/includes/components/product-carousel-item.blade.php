@foreach($latest_products as $product)
<div class="product">
    <div class="product-outer" style="height: 331px;">
        <div class="product-inner">
            <span class="loop-product-categories"><a href="index.php?page=product-category" rel="tag">{{  }}</a></span>
            <a href="index.php?page=single-product">
                <h3>Laptop Yoga 21 80JH0035GE  W8.1 (Copy)</h3>
                <div class="product-thumbnail">
                    <img src="assets/images/product-category/5.jpg" class="img-responsive" alt="">
                </div>
            </a>

            <div class="price-add-to-cart">
            <span class="price">
                <span class="electro-price">
                    <ins><span class="amount"> </span></ins>
                                        <span class="amount"> $1,999.00</span>
                </span>
            </span>
                <a rel="nofollow" href="index.php?page=single-product" class="button add_to_cart_button">Add to cart</a>
            </div><!-- /.price-add-to-cart -->

            <div class="hover-area">
                <div class="action-buttons">

                    <a href="#" rel="nofollow" class="add_to_wishlist"> Wishlist</a>

                    <a href="index.php?page=compare" class="add-to-compare-link"> Compare</a>
                </div>
            </div>
        </div><!-- /.product-inner -->
    </div>
</div>
@endforeach
