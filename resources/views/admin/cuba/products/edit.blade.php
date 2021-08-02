@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.products') . ' | ' . $product->name)

@section('breadcrumb-items')
@stop

@section('content')


<div class="row">
    <div class="col-md-3">
            <div class="bg-white border-radius p-4">        
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="label-page after"  class="label-page after" for="main_category_id">{{ trans('site.subcategory') }}</label>
                            @error('main_category_id')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <select class="form-select form-control-danger" name="main_category_id" class="form-control">
                                <option value="0">{{ trans('site.all') . ' ' . trans('site.subcategories') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-info my-5 " id="pills-infotab" role="tablist">
                            @foreach (config('translatable.locales') as $index => $locale)
                                <li class="nav-item">
                                    <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}-tab" data-bs-toggle="pill" href="#{{ $locale }}" role="tab" aria-controls="{{ $locale }}" aria-selected="true" data-bs-original-title="" title="">
                                        <div class="media">
                                            <i class="{{ $locale == 'en' ? 'us' : 'ae' }}"></i>
                                        </div>
                                        {{ trans('site.' . $locale . '.name' ) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
        
                </div>
            </div>
    </div>
    <div class="col-md-9">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    @include('admin.cuba.partials._errors')
                    <form class="col-12" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
    
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
    
                        <input class="form-control input-blog-create" hidden name="product_id" value="{{ $product -> id }}">
    
    
    
                        <div class="row">
                            <div class="tab-content container" id="pills-infotabContent">
                                <div class="col-md-12 pt-2">
                                    <h2 class="setting-general-title text-center">
                                        Edit Product
                                    </h2>
                                </div>
                            @foreach (config('translatable.locales') as $locale)
                            <div class=" tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                    <div class="form-group col-md-6">
                                        <label class="label-page after"  for="{{ $locale }}[name]">{{ trans('site.product name') }} @lang('site.' . $locale .
                                            '.in name')</label>
                                        @error($locale . '.name')
                                            <br />
                                            <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                            value="{{ $product->translate($locale)->name }}">
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label class="label-page after"  for="{{ $locale }}[description]">{{ trans('site.description') }} @lang('site.' .
                                            $locale . '.in name')</label>
                                        @error($locale . '.description')
                                            <br />
                                            <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <textarea class="form-control" type="text"
                                            name="{{ $locale }}[description]">
                                                    {{ $product->translate($locale)->description }}
                                                </textarea>
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label class="label-page after"  for="{{ $locale }}[features]">{{ trans('site.Product Features') }} @lang('site.' . $locale
                                            . '. in name')</label>
                                        @error($locale . '.features')
                                            <br />
                                            <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <textarea class="form-control" type="text"
                                            name="{{ $locale }}[features]">{{ $product->translate($locale)->features }}</textarea>
                                    </div>
    
                                </div>
                            @endforeach
                        </div> {{-- end of translatable data --}}
                        </div> 
    
                        <div class="row">
    
                            <div class="setting-general-title text-center">
                                <h3 class="m-3">{{ trans('site.Inventory Information') }}</h3>
                                <hr>
                            </div>
    
                            <div class="row">
    
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="label-page after"  class="labelProd" for="stock">{{ trans('site.Stock') }} </label>
                                                @error('stock')
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick" type="number" name="stock"
                                                    value="{{ $product->stock }}">
                                            </div>
                
                                            <div class="form-group col-md-12">
                                                <label class="label-page after"  class="labelProd" for="regular_price">{{ trans('site.Regular Price') }}</label>
                                                @error('regular_price')
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick" type="text" name="regular_price"
                                                    value="{{ $product->regular_price }}">
                                            </div>
                
                                            <div class="form-group col-md-12">
                                                <label class="label-page after"  class="labelProd" for="sku">{{ trans('site.sku') }}</label>
                                                @error('sku')
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick" type="text" name="sku"
                                                    value="{{ $product->sku != null ? $product->sku : 0 }}">
                                            </div>
                
                
                                            <div class="form-group col-md-12">
                                                <label class="label-page after"  class="labelProd" for="sale_price">{{ trans('site.Sale Price') }}</label>
                                                @error('sale_price')
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick" type="text" name="sale_price"
                                                    value="{{ $product->sale_price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-sm-12 col-md-12 mb-5">
                                                <label class="label-page after"  class="labelProd" label for="image">{{ trans('site.Image') }}</label>
                                                @error('image')
                                                    <span class="text-danger mx-1">{{ $message }}</span>
                                                @enderror
                                                <input type="file" name="image" class="form-control input-sm image">
                
                                                <img src="{{ $product->image_path }}" width="400px"
                                                    class="img-thumbnail image-preview mt-1" alt="Upload Image">
                                            </div> {{-- end of form group image --}}
                
                                        </div>
                                        </div>
                                    </div>

                        </div>
    
                        <div class="form-group col-sm-12 card card-primary card-outline">
                            <div class="text-center col-sm-12">
                                <h3 class="setting-general-title text-center">{{ trans('site.Gallery') }}</h3>
                                <hr>
                            </div>
    
                            <div class="input-field">
                                <div class="gallery p-2">
                                    @error('gallery')
                                        <br />
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
    
                                </div>
                            </div>
                        </div> {{-- end of product gallery --}}
    
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-pill btn-outline-secondary btn-sm"><i class="fa fa-plus"></i>
                                {{ trans('site.update') . ' ' . trans('site.product') }}</button>
                        </div>
    
                    </form><!-- end of form -->
    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    @stop
    
        </div>
    </div>        
</div>
    <!-- Default box -->

@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('admins/cuba/assets/js/image-uploader.min.js') }}"></script>

    <script>
        $('.gallery').imageUploader();
    </script>
@stop
