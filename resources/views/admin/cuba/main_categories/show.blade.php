@extends('layouts.admin.cuba')

@section('title', 'Product | ' . $main_category->name)

@section('content-header')
    <div class="col-sm-6">
        <h1>{{ $main_category->name }} <span class="small text-muted"></span></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">@lang('admin.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">@lang('admin.products')</a></li>
        </ol>
    </div>

@endsection

@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12">
                    <a href="{{ route('admin.main_categories.edit', $main_category->id) }}"
                        class="btn btn-received  mb-4">
                        <i class="fa fa-edit fa-lg"></i> Edit This Categories
                    </a>

                    <div class="show-category">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="form-group col-sm-12 col-lg-12">
                                    <label class=" my-2 p-2">Categories Image</label>
                                    <img src="{{ $main_category->image_path }}" width="300"
                                        class="img-thumbnail image-preview m-1 img-fluid d-block m-auto"
                                        alt="{{ $main_category->name }}">
                                </div> {{-- end of form group image --}}

                                <div class="form-group col-sm-12 col-md-6text-md">
                                    <div class="custom-control custom-switch">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control custom-switch">
                                                    <input disabled type="checkbox" class="custom-control-input"
                                                        id="is_active" name="is_active" @if ($main_category->is_active == 1) checked @endif>
                                                    <label class="custom-control-label" for="is_active">Is Active</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input disabled type="checkbox" class="custom-control-input"
                                                        id="show_in_navbar" name="show_in_navbar" @if ($main_category->show_in_navbar == 1) checked @endif>
                                                    <label class="custom-control-label" for="show_in_navbar">Show in
                                                        Navbar</label>
                                                </div>

                                                <div class="custom-control custom-switch">
                                                    <input disabled type="checkbox" class="custom-control-input"
                                                        id="show_in_sidebar" name="show_in_sidebar" @if ($main_category->show_in_sidebar == 1) checked @endif>
                                                    <label class="custom-control-label" for="show_in_sidebar">Show in
                                                        Sidebar</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input disabled type="checkbox" class="custom-control-input"
                                                        id="show_in_footer" name="show_in_footer" @if ($main_category->show_in_footer == 1) checked @endif>
                                                    <label class="custom-control-label" for="show_in_footer">Show in
                                                        Footer</label>
                                                </div>


                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="my-2 p-2" for="{{ $main_category->name }}"></label>
                                                    <input disabled class="form-control input-thick" type="text"
                                                        name="{{ $main_category->name }}" placeholder="Categories Name"
                                                        value="{{ $main_category->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="my-2 p-2" for="{{ $main_category->slug }}"></label>
                                                    <input disabled class="form-control input-thick" type="text"
                                                        name="{{ $main_category->slug }}" placeholder="Slug"
                                                        value="{{ $main_category->slug }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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
