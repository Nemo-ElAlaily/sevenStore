@extends('layouts.admin.cuba')

@section('title', 'Product | ' . $product -> name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">{{ $product -> name }}</li>
@stop

@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row add-create-blog">
   
                @include('admin.cuba.partials._errors')
                <form class="col-12 form-user-create"  action="{{ route('admin.products.update', $product -> id) }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="col-sm-12 col-md-6 mb-5">
                        <div class="form-group col-md-6">
                            <label class="labelProd" for="main_category_id">Sub Category</label>
                            @error('main_category_id')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <select class="select-css" name="main_category_id" class="form-control">
                                <option value="0">All Sub Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category -> id }}" {{ $product -> main_category_id == $category -> id ? 'selected' : '' }}>{{ $category -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">

                            <div class="row">
                                <div class="form-group mb-5 col-md-12">
                                    <label class="labelPage" for="{{ $locale }}[name]">Product Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-blog-create" type="text" name="{{ $locale }}[name]"
                                           value="{{ $product -> translate($locale) -> name}}">
                                </div>

                                <div class="form-group mb-5 col-md-6">
                                    <label class="labelPage" for="{{ $locale }}[description]">Product Description in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control  textareaBlog" type="text" name="{{ $locale }}[description]">
                                        {{ $product -> translate($locale) -> description}}
                                    </textarea>
                                </div>

                                <div class="form-group mb-5 col-md-6">
                                    <label class="labelPage" for="{{ $locale }}[features]">Product Features in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.features')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control textareaBlog" type="text" name="{{ $locale }}[features]">{{ $product -> translate($locale) -> features}}</textarea>
                                </div>
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
                                <label class="labelPage" for="stock">Stock </label>
                                @error('stock')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="number" name="stock"
                                       value="{{ $product -> stock }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelPage" for="regular_price">Regular Price</label>
                                @error('regular_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="text" name="regular_price"
                                       value="{{  $product -> regular_price }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelPage"for="sku">Sku</label>
                                @error('sku')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="text" name="sku"
                                       value="{{  $product -> sku != null ? $product -> sku : 0 }}">
                            </div>


                            <div class="form-group col-md-3">
                                <label class="labelPage"for="sale_price">Sale Price</label>
                                @error('sale_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="text" name="sale_price"
                                       value="{{  $product -> sale_price }}">
                            </div>

                            <div class="form-group col-sm-12 col-md-4  my-5">
                                <label class="labelPage"label for="image">Image</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image">

                                <img src="{{ $product -> image_path }}" width="400px"
                                     class="img-thumbnail image-preview mt-1" alt="Upload Image">
                            </div> {{-- end of form group image --}}

                            
                    <div class="form-group col-sm-12 col-md-8 mt-5 card card-primary card-outline">
                        <div class="text-center col-sm-12">
                            <h3 class="m-3">Gallery</h3>
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
                            Update Product</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop

@section('script')
    <!-- ARCHIVES JS -->
    <script src="{{ asset('admins/cuba/assets/js/image-uploader.min.js') }}"></script>

    <script>
        $('.gallery').imageUploader();
    </script>
@stop
