@extends('layouts.admin.cuba')

@section('title', 'Categories | Edit')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Categories</li>
    <li class="breadcrumb-item">Add</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                @include('admin.cuba.partials._errors')
                <form class="col-12"  action="{{ route('admin.main_categories.store' ) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="create-category-form">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <div class="custom-control custom-switch">
                                            <input class="" type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                            <label class="custom-control-label" for="is_active">Is Active</label>
                                        </div>
                                        @error('is_active')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-sm-12 col-md-6 ">
                                        <div class="custom-control custom-switch">
                                            <input class="" type="checkbox" class="custom-control-input" id="show_in_navbar" name="show_in_navbar" checked >
                                            <label class="custom-control-label" for="show_in_navbar">Show in Navbar</label>
                                        </div>
                                        @error('show_in_navbar')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                    </div>
        
                                    <div class="form-group col-sm-12 col-md-6 ">
                                        <div class="custom-control custom-switch">
                                            <input class="" type="checkbox" class="custom-control-input" id="show_in_sidebar" name="show_in_sidebar" checked >
                                            <label class="custom-control-label" for="show_in_sidebar">Show in Sidebar</label>
                                        </div>
                                        @error('show_in_sidebar')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                    </div>
            
                                    <div class="form-group col-sm-12 col-md-6 ">
                                        <div class="custom-control custom-switch">
                                            <input  class="" type="checkbox" class="custom-control-input" id="show_in_footer" name="show_in_footer" checked >
                                            <label class="custom-control-label" for="show_in_footer">Show in Footer</label>
                                        </div>
                                        @error('show_in_footer')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="create-category-label" for="name"></label>
                                        @error('name')
                                        <span class="text-danger mx-5"></span>
                                        @enderror
                                        <input class="form-control input-thick create-category-input" type="text" name="name" placeholder="Category Name"
                                               value="{{old('name')}}">
                                    </div>
            
                                    <div class="form-group col-md-6">
                                        <label class="create-category-label" for="slug"></label>
                                        @error('slug')
                                        <span class="text-danger mx-5"> </span>
                                        @enderror
                                        <input class="form-control input-thick create-category-input " type="text" name="slug" placeholder="Slug"
                                               value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="create-category-label" for="parent_id">Parent Category</label>
                                        @error('parent_id')
                                        <span class="text-danger mx-5"> </span>
                                        @enderror
                                        <select name="parent_id" class="form-control select-css ">
                                            <option value="0">All Categories</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label class="create-category-label" label for="image">Image</label>
                                        @error('image')
                                        <span class="text-danger mx-1"> </span>
                                        @enderror
                                        <input type="file" name="image" class="form-control input-sm image mb-4">
        
                                        <img src=""
                                             class="img-thumbnail image-preview mt-1 image-preview img-fluid d-block m-auto" alt="">
                                    </div> {{-- end of form group image --}}
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-received"><i class="fa fa-edit"></i>
                                        Add Category</button>
                                </div>
                            </div>
                        </div>
                    </div>

       

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
