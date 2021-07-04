@extends('layouts.admin.cuba')

@section('title', 'Product | Create')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Create</li>
@stop

@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row add-create-blog">
                @include('admin.cuba.partials._errors')
                <form class="col-12"  action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    <input class="form-control input-blog-create" hidden name="vendor_id" value="{{ $user }}">

                    <div class="col-sm-12 col-md-3 mb-5">
                        <div class="form-group">
                            <label class="labelProd" class="labelProd" for="main_category_id">Sub Category</label>
                            @error('main_category_id')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <select class="select-css" name="main_category_id" class="form-control">
                                <option value="0">All Sub Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row ">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label class="labelProd" for="{{ $locale }}[name]">Product Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-blog-create" type="text" name="{{ $locale }}[name]"
                                           value="{{ old($locale.'.name') }}">
                                </div>

                                <div class="form-group">
                                    <label class="labelProd" for="{{ $locale }}[description]">Product Description in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick textareaBlog" type="text" name="{{ $locale }}[description]">
                                    {{ old($locale.'.description') }}
                                </textarea>
                                </div>

                                <div class="form-group">
                                    <label class="labelProd" for="{{ $locale }}[features]">Product Features in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.features')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control textareaBlogtextareaBlog" type="text" name="{{ $locale }}[features]">{{ old($locale.'.features') }}</textarea>
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
                                <label class="labelProd" class="labelProd"for="stock">Stock </label>
                                @error('stock')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="number" name="stock"
                                       value="{{ old('stock') }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelProd" class="labelProd"for="regular_price">Regular Price</label>
                                @error('regular_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="text" name="regular_price"
                                       value="{{ old('regular_price') }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label class="labelProd" class="labelProd"for="sku">Sku</label>
                                @error('sku')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sku"
                                       value="{{ old('sku') }}">
                            </div>


                            <div class="form-group col-md-3">
                                <label class="labelProd" class="labelProd"for="sale_price">Sale Price</label>
                                @error('sale_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-blog-create" type="text" name="sale_price"
                                       value="{{ old('sale_price') }}">
                            </div>

                            <div class="form-group col-sm-12 col-md-6 mb-5">
                                <label class="labelProd" class="labelProd"label for="image">Image</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm  image">

                                <img src="{{ asset('uploads/products/default.png') }}" width="400px"
                                     class="img-thumbnail image-preview mt-1" alt="Upload Image">
                            </div> {{-- end of form group image --}}

                            <div class="form-group col-sm-12 col-md-6 card card-primary card-outline mt-5">
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
                            </div> {{-- end of property Media --}}
                        </div>
                    </div>

<<<<<<< HEAD
   
=======
                    <div class="form-group col-sm-12 card card-primary card-outline">
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
>>>>>>> e2f93f38afbb69024cf2a62d70880d8a75d2a66c

                    <div class="form-group">
                        <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                            Add Product</button>
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
