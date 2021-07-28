@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Categories') .  ' | ' . trans('site.edit'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Categories') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="card mx-5 shadow-lg">
        <div class="card-body">
            <div class="row">
                @include('admin.cuba.partials._errors')
                <form action="{{ route('admin.main_categories.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                        <div class="row">
                            <div class="row mb-5">
                                <div class="form-group col-sm-12 col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input class="" type="checkbox" class="custom-control-input" id="is_active"
                                            name="is_active" checked>
                                        <label class="custom-control-label" for="is_active">{{ trans('site.Active ?') }}</label>
                                    </div>
                                    @error('is_active')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6 ">
                                    <div class="custom-control custom-switch">
                                        <input class="" type="checkbox" class="custom-control-input" id="show_in_navbar"
                                            name="show_in_navbar" checked>
                                        <label class="custom-control-label" for="show_in_navbar">{{ trans('site.Show in Navbar') }}</label>
                                    </div>
                                    @error('show_in_navbar')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-sm-12 col-md-6 ">
                                    <div class="custom-control custom-switch">
                                        <input class="" type="checkbox" class="custom-control-input"
                                            id="show_in_sidebar" name="show_in_sidebar" checked>
                                        <label class="custom-control-label" for="show_in_sidebar">{{ trans('site.Show in Sidebar') }}</label>
                                    </div>
                                    @error('show_in_sidebar')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="form-group col-sm-12 col-md-6 ">
                                    <div class="custom-control custom-switch">
                                        <input class="" type="checkbox" class="custom-control-input" id="show_in_footer"
                                            name="show_in_footer" checked>
                                        <label class="custom-control-label" for="show_in_footer">{{ trans('site.Show in Footer') }}</label>
                                    </div>
                                    @error('show_in_footer')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            @foreach (config('translatable.locales') as $locale)
                                <div class="form-group col-md-6">
                                    <label class="create-category-label" for="{{ $locale }}[name]">{{ trans('site.Category name') }} @lang('site.' .
                                            $locale . '.in name')</label>
                                    @error($locale . '.name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick create-category-input" type="text"
                                        name="{{ $locale }}[name]" placeholder="" value="{{ old($locale . '.name') }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="create-category-label" for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' .
                                            $locale . '.in name')</label>
                                    @error($locale . '.slug')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick create-category-input " type="text"
                                        name="{{ $locale }}[slug]" placeholder="" value="{{ old($locale . '.slug') }}">
                                </div>

                            @endforeach

                            <div class="form-group col-md-6">
                                <label class="create-category-label" for="parent_id">{{ trans('site.Parent Category') }}</label>
                                @error('parent_id')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <select name="parent_id" class="form-control select-css ">
                                    <option value="0">{{ trans('site.all') }} {{ trans('site.Categories') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label class="create-category-label" for="image">{{ trans('site.Image') }}</label>
                                @error('image')
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="image" class="form-control input-sm image mb-4">

                                <img src=""
                                    class="img-thumbnail image-preview mt-1 image-preview img-fluid d-block m-auto"
                                    alt="">
                            </div> {{-- end of form group image --}}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-received"><i class="fa fa-edit"></i>
                            {{ trans('site.add') }} {{ trans('site.Category') }}</button>
                        </div>

                </form><!-- end of form -->

            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
