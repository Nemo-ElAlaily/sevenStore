@extends('admin.cuba.layouts.cuba')

@section('title',  trans('site.create') . ' | ' . trans('site.product'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.products') }}</li>
    <li class="breadcrumb-item">{{ trans('site.create') }}</li>
@stop

@section('content')


<div class="row">
    <div class="col-md-3">
            <div class="bg-white border-radius p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="label-page " for="main_category_id">{{ trans('site.subcategory') }}</label>
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
        <div class="card-solid">
            <div class="card-body">

                
                <div class="row add-create-blog">
                    @include('admin.cuba.partials._errors')
                    <form class="col-12" action="{{ route('admin.products.store') }}" method="POST"
                        enctype="multipart/form-data">
    
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
    
                        <input class="form-control " hidden name="vendor_id" value="{{ $user }}">
    
                        <div class="row ">
                            <div class="tab-content container" id="pills-infotabContent">
                                <div class="col-md-12 pt-2">
                                    <h2 class="setting-general-title text-center">
                                        Create Page
                                    </h2>
                                </div>
                            @foreach (config('translatable.locales') as $locale)
                            <div class=" tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                <div class="row">
                                    <div class="d-flex flex-wrap justify-content-around">

                                        <div class="form-group">
                                            <label class="label-page" for="{{ $locale }}[name]">{{ trans('site.product name') }} @lang('site.' .
                                                $locale . '.in name')</label>
                                            @error($locale . '.name')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control " type="text"
                                                name="{{ $locale }}[name]" value="{{ old($locale . '.name') }}">
                                        </div>
        
                                        <div class="form-group">
                                            <label class="label-page" for="{{ $locale }}[description]">{{ trans('site.description') }} @lang('site.' . $locale . '.in name')</label>
                                            @error($locale . '.description')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <textarea class="form-control input-thick" rows="1" type="text"
                                                name="{{ $locale }}[description]">
                                                {{ old($locale . '.description') }}
                                            </textarea>
                                        </div>
        
                                        <div class="form-group">
                                            <label class="label-page" for="{{ $locale }}[features]">{{ trans('site.Product Features') }} @lang('site.' . $locale . '.in name')</label>
                                            @error($locale . '.features')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <textarea class="form-control" rows="1" type="text"
                                                name="{{ $locale }}[features]">{{ old($locale . '.features') }}</textarea>
                                        </div>

                                    </div>
    
                                </div>
                            
                            </div>
                            @endforeach
                            </div> {{-- end of translatable data --}}
                        </div> {{-- end of translatable data --}}
    
                        <div class="row">
    
                            <div class="text-center mt-5">
                                <h3 class="text-left setting-general-title ">{{ trans('site.Inventory Information') }}</h3>
                                <hr>
                            </div>
    
                            <div class="col-sm-12 row">
    
                                <div class="form-group col-md-3">
                                    <label class="label-page " for="stock">{{ trans('site.Stock') }} </label>
                                    @error('stock')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control " type="number" name="stock"
                                        value="{{ old('stock') }}">
                                </div>
    
                                <div class="form-group col-md-3">
                                    <label class="label-page " for="regular_price">{{ trans('site.Regular Price') }}</label>
                                    @error('regular_price')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control " type="text" name="regular_price"
                                        value="{{ old('regular_price') }}">
                                </div>
    
                                <div class="form-group col-md-3">
                                    <label class="label-page " for="sku">{{ trans('site.sku') }}</label>
                                    @error('sku')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="sku" value="{{ old('sku') }}">
                                </div>
    
    
                                <div class="form-group col-md-3">
                                    <label class="label-page " for="sale_price">{{ trans('site.Sale Price') }}</label>
                                    @error('sale_price')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control " type="text" name="sale_price"
                                        value="{{ old('sale_price') }}">
                                </div>
    
                                <div class="form-group col-sm-12 col-md-6 my-5">
                                    <label class="label-page " label for="image">{{ trans('site.Image') }}</label>
                                    @error('image')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="image" class="form-control input-sm  image">
    
                                    <img src="{{ asset('uploads/products/default.png') }}" width="400px"
                                        class="img-thumbnail image-preview mt-1" alt="Upload Image">
                                </div> {{-- end of form group image --}}
                                
    
                                <div class="form-group col-sm-12 col-md-6 my-5 card card-primary card-outline">
                                    <div class="text-center col-sm-12">
                                        <h3 class="text-left setting-general-title ">{{ trans('site.Gallery') }}</h3>
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
                            </div>
    
    
                        </div>
    
                <div class="form-group">
                    <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                        {{ trans('site.add') . ' ' . trans('site.product') }}</button>
                </div>
    
                </form><!-- end of form -->
    
            </div>
        </div>
        <!-- /.card-body -->
        </div>
    </div>
</div>
    <!-- Default box -->
  
    <!-- /.card -->
@stop

@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('admins/cuba/assets/js/image-uploader.min.js') }}"></script>

    <script>
        $('.gallery').imageUploader();
    </script>
@stop
