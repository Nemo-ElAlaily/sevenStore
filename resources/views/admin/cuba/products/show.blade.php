@extends('admin.cuba.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admins/cuba/assets/css/vendors/photoswipe.css') }}">
@endsection

@section('title', 'Product | ' . $product->name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Show</li>
@stop

@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')

                <form class="col-sm-12">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btnEdit mb-4">
                        <i class="fa fa-edit fa-lg"></i> Edit This Product
                    </a>

                    <div class="col-sm-12 col-md-3 mb-5">
                        <div class="form-group">
                            <label class="labelProd" for="main_category_id">Sub Category</label>
                            @error('main_category_id')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <select class="select-css" name="main_category_id" class="form-control">
                                <option value="0">All Sub Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->main_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Product Name in @lang('site.' . $locale .
                                        '.name')</label>
                                    @error($locale . '.name')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                        value="{{ $product->translate($locale)->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[description]">Product Description in @lang('site.' .
                                        $locale . '.name')</label>
                                    @error($locale . '.description')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text"
                                        name="{{ $locale }}[description]">
                                            {{ $product->translate($locale)->description }}
                                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[features]">Product Features in @lang('site.' . $locale
                                        . '.name')</label>
                                    @error($locale . '.features')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick" type="text"
                                        name="{{ $locale }}[features]">{{ $product->translate($locale)->features }}</textarea>
                                </div>

                            </div>
                        @endforeach
                    </div> {{-- end of translatable data --}}

                    <div class="row">

                        <div class="text-center mt-5">
                            <h3 class="m-3">Inventory Information</h3>
                            <hr>
                        </div>

                        <div class="col-sm-12 row">

                            <div class="form-group col-md-3">
                                <label class="labelProd" for="stock">Stock </label>
                                @error('stock')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="number" name="stock"
                                    value="{{ $product->stock }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelProd" for="regular_price">Regular Price</label>
                                @error('regular_price')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="regular_price"
                                    value="{{ $product->regular_price }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelProd" for="sku">Sku</label>
                                @error('sku')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sku"
                                    value="{{ $product->sku }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelProd" for="sale_price">Sale Price</label>
                                @error('sale_price')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sale_price"
                                    value="{{ $product->sale_price }}">
                            </div>


                            <div class="form-group col-sm-12 col-lg-12 mt-5">
                                <label>Product Image</label>
                                <img src="{{ $product->image_path }}" width="300"
                                    class="img-thumbnail image-preview m-1" alt="{{ $product->name }}">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

                </form><!-- end of form -->
            </div>

        </div>
        <!-- /.card-body -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Product Gallery <span class="digits">{{ $product->gallery->count() }}</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="row my-gallery gallery" id="aniimated-thumbnials" itemscope="">
                            @foreach ($product->gallery as $index => $gallery_item)
                                <figure class="col-md-3 col-6 img-hover hover-1" itemprop="associatedMedia" itemscope="">
                                    <a href="{{ $gallery_item->image }}" itemprop="contentUrl" data-size="1600x950">
                                        <div>
                                            <img src="{{ $gallery_item->image }}" itemprop="thumbnail"
                                                alt="{{ $product->slug . $index }}">
                                        </div>
                                    </a>
                                    <figcaption itemprop="caption description">{{ $product->slug . ' 1' }}</figcaption>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of gallery -->

    </div>
    <!-- /.card -->

    <!-- Root element of PhotoSwipe. Must have class pswp.-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!--
                Background of PhotoSwipe.
                It's a separate element, as animating opacity is faster than rgba().
                -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden.-->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory.-->
            <!-- don't modify these 3 pswp__item elements, data is added later on.-->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed.-->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!-- Controls are self-explanatory. Order can be changed.-->
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR-->
                    <!-- element will get class pswp__preloader--active when preloader is running-->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('admins/cuba/assets/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/photoswipe/photoswipe.js') }}"></script>
@endsection
