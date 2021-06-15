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


                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label class="bg-warning my-2" for="parent_id">Sub Category</label>
                                    @error('parent_id')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="parent_id" class="form-control bg-dark text-center ">
                                        <option value="0">All Sub Categories</option>
                                        @foreach($all_categories as $item)
                                        <option value="{{ $item -> id  }}">{{ $item -> name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-sm-12 col-lg-12">
                                <label class="bg-warning my-2" label for="image">Image</label>
                                @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image">

                                <img src="{{ $main_category -> image_path }}"
                                     class="img-thumbnail image-preview mt-1 w-25 img-fluid d-block m-auto" alt="">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-received"><i class="fa fa-edit"></i>
                            Update Category</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
