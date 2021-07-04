@extends('layouts.admin.cuba')

@section('title', 'Product | ' . $product -> name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Edit</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                @include('admin.cuba.partials._errors')
                <form class="col-12"  action="{{ route('admin.products.update', $product -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label class="prodLabel" for="name">Product Name</label>
                                @error('name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="name"
                                       value="{{ $product -> name }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="prodLabel" for="stock">Stock
                                    @if ($product -> stock == 0)
                                        <span class="right badge badge-danger">Out Of Stock</span>
                                    @elseif ($product -> stock > 0 && $product -> stock < 5)
                                        <span class="right badge badge-primary">Low Stock</span>
                                    @else
                                        <span class="right badge badgeAvailable">Available</span>
                                    @endif
                                </label>
                                @error('stock')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="number" name="stock"
                                       value="{{ $product -> stock }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="prodLabel" for="slug">Slug</label>
                                @error('slug')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="slug"
                                       value="{{ $product -> slug }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="prodLabel" for="regular_price">Regular Price</label>
                                @error('regular_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="regular_price"
                                       value="{{ $product -> regular_price }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="prodLabel" for="sku">Sku</label>
                                @error('sku')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sku"
                                       value="{{ $product -> sku }}">
                            </div>


                            <div class="form-group col-lg-6">
                                <label class="prodLabel" for="sale_price">Sale Price</label>
                                @error('sale_price')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="sale_price"
                                       value="{{ $product -> sale_price }}">
                            </div>

{{--                            <div class="form-group col-lg-6">--}}
{{--                                <label for="{{ $product -> vendor -> billing_full_name }}">Vendor</label>--}}
{{--                                <table class="form-control input-thick">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th><a class="text-left" href="#">{{ $product -> vendor -> billing_full_name }}</a></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                </table>--}}
{{--                            </div>--}}

                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label class="prodLabel" for="main_category">Sub Category</label>
                                    @error('main_category')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="main_category" class="form-control">
                                        <option value="">All Sub Categories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category -> id }}" {{ $product->main_category_id == $category->id ? 'selected' : '' }}>{{ $category -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="prodLabel" for="description">Product Description</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick ckeditor textareaBlog" type="text" name="description">
                                        {{ $product -> description  }}
                                </textarea>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="prodLabel" for="features">Product Features</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick ckeditor textareaBlog" type="text" name="features">
                                        {{ $product -> features  }}
                                </textarea>
                            </div>

                            <div class="form-group col-sm-12 col-lg-12">
                                <label label for="image">Image</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image">

                                <img src="{{ $product -> image_path }}" width="400px"
                                     class="img-thumbnail image-preview mt-1" alt="">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btnEdit"><i class="fa fa-edit"></i>
                            Update Product</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
