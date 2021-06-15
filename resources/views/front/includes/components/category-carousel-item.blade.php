@foreach($categories as $category)
<div class="product">
    <div class="product-outer" style="height: 331px;">
        <div class="product-inner">
            <span class="loop-product-categories">
                <a href="{{ route('front.product.category', $category -> slug) }}" rel="tag">{{ $category -> name }}</a></span>
            <a href="{{ route('front.product.category', $category -> slug ) }}">
                <h3>{{ $category -> name }}</h3>
                <div class="product-thumbnail">
                    <img style="height: 150px;margin: auto" src="{{ $category -> image_path }}" class="img-responsive" alt="{{ $category -> slug }}">
                </div>
            </a>

        </div><!-- /.product-inner -->
    </div>
</div>
@endforeach
