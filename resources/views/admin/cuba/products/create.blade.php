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
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12"  action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    <input class="form-control input-thick" hidden name="vendor_id" value="{{ $user }}">

                    <div class="row">
                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label class="labelProd"for="name">Product Name</label>
                                @error('name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="name"
                                       value="{{ old('name') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="labelProd"for="stock">Stock </label>
                                @error('stock')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="number" name="stock"
                                       value="{{ old('stock') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="labelProd"for="regular_price">Regular Price</label>
                                @error('regular_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="regular_price"
                                       value="{{ old('regular_price') }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="labelProd"for="sku">Sku</label>
                                @error('sku')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sku"
                                       value="{{ old('sku') }}">
                            </div>


                            <div class="form-group col-lg-6">
                                <label class="labelProd"for="sale_price">Sale Price</label>
                                @error('sale_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sale_price"
                                       value="{{ old('sale_price') }}">
                            </div>

                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label class="labelProd"for="main_category">Sub Category</label>
                                    @error('main_category')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select class="select-css" name="main_category" class="form-control">
                                        <option value="0">All Sub Categories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="labelProd"for="description">Product Description</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick textareaBlog" type="text" name="description">
                                        {{ old('description') }}
                                </textarea>
                            </div>

                            <div class="form-group col-lg-12">
<<<<<<< HEAD
                                <label class="labelProd"for="features">Product Features</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick textareaBlog" type="text" name="features">
=======
                                <label for="features">Product Features</label>
                                <textarea class="form-control input-thick ckeditor" type="text" name="features">
>>>>>>> f23477f20af378a74bc975f52de51f56fee0c41f
                                        {{ old('features') }}
                                </textarea>
                            </div>

                            <div class="form-group col-sm-12 col-lg-12">
                                <label class="labelProd"label for="image">Image</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image">

                                <img src="{{ asset('public/uploads/products/default.png') }}" width="400px"
                                     class="img-thumbnail image-preview mt-1" alt="Upload Image">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

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
