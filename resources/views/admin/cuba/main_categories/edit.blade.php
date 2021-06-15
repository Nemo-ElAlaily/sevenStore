@extends('layouts.admin.cuba')

@section('title', 'Categories | Edit')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Categories</li>
    <li class="breadcrumb-item">Edit</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12"  action="{{ route('admin.main_categories.update', $main_category -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label class="bg-warning my-2" for="name">Category Name</label>
                                @error('name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick bg-dark text-center " type="text" name="name"
                                       value="{{ $main_category -> name }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="bg-warning my-2" for="slug">Slug</label>
                                @error('slug')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick bg-dark text-center " type="text" name="slug"
                                       value="{{ $main_category -> slug }}">
                            </div>

       

                     


                     

{{--                            <div class="form-group col-lg-6">--}}
{{--                                <label class="bg-warning my-2" for="{{ $main_category -> vendor -> billing_full_name }}">Vendor</label>--}}
{{--                                <table class="form-control input-thick bg-dark text-center ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th><a class="text-left" href="#">{{ $main_category -> vendor -> billing_full_name }}</a></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                </table>--}}
{{--                            </div>--}}

                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label class="bg-warning my-2" for="main_category">Sub Category</label>
                                    @error('main_category')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="main_category" class="form-control bg-dark text-center ">
                                        <option value="">All Sub Categories</option>
                                
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="bg-warning my-2" for="description">Product Description</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick bg-dark text-center  ckeditor" type="text" name="description">
                                        {{ $main_category -> description  }}
                                </textarea>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="bg-warning my-2" for="features">Product Features</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick bg-dark text-center  ckeditor" type="text" name="features">
                                        {{ $main_category -> features  }}
                                </textarea>
                            </div>

                            <div class="form-group col-sm-12 col-lg-12">
                                <label class="bg-warning my-2" label for="image">Image</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image mb-4">

                                <img src="{{ $main_category -> image_path }}" 
                                     class="img-thumbnail image-preview mt-1 image-preview img-fluid d-block m-auto" alt="">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-received"><i class="fa fa-edit"></i>
                            Update Product</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
