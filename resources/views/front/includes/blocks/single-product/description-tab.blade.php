<div class="electro-description">
    {!! html_entity_decode($product -> description) !!}
</div><!-- /.electro-description -->

<div class="product_meta">
    <span class="sku_wrapper">SKU: <span class="sku" itemprop="sku">{{ $product -> sku }}</span></span>


    <span class="posted_in">Category:
		 <a href="index.php?page=product-category" rel="tag">{{ $product -> mainCategory -> name }}</a>
	</span>

{{--    <span class="tagged_as">Tags:--}}
{{--		<a href="index.php?page=product-category" rel="tag">Fast</a>,--}}
{{--		<a href="index.php?page=product-category" rel="tag">Gaming</a>, <a href="index.php?page=product-category" rel="tag">Strong</a>--}}
{{--	</span>--}}

</div><!-- /.product_meta -->
