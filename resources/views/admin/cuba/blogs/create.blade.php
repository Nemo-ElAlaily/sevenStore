@extends('admin.cuba.layouts.app')

@section('title', trans('site.create') . ' | ' . trans('site.Blogs'))

@section('breadcrumb-title')
    <h5>{{ trans('site.Blogs') }}</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Blogs') }}</li>
    <li class="breadcrumb-item">{{ trans('site.create') }}</li>
@stop

@section('content')

    @include('admin.cuba.partials._session')
    @include('admin.cuba.partials._errors')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.blogs.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">{{ trans('site.title') }} @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.title')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                        value="{{ old($locale . '.title') }}">
                                </div>

                                <div class="form-group">
                                    <label
                                        for="{{ $locale }}[description]">{{ trans('site.' . $locale . '.description') }}
                                        @lang('site.' .
                                        $locale . '.in name')</label>
                                    @error($locale . '.description')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text"
                                        name="{{ $locale }}[description]"
                                        value="{{ old($locale . '.description') }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[creator]">{{ trans('site.Creator Name') }}
                                        @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.creator')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[creator]"
                                        value="{{ old($locale . '.creator') }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_title]">{{ trans('site.Meta Title') }}
                                        @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_title]"
                                        value="{{ old($locale . '.meta_title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_keywords]">{{ trans('site.Meta Keywords') }}
                                        @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_keywords')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_keywords]"
                                        value="{{ old($locale . '.meta_keywords') }}">
                                </div>

                                <div class="form-group">
                                    <label
                                        for="{{ $locale }}[meta_description]">{{ trans('site.Meta Description') }}
                                        @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_description')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_description]"
                                        value="{{ old($locale . '.meta_description') }}">
                                </div>

                                <div class="form-group">
                                    <label for="{{ $locale }}[meta_slug]">{{ trans('site.slug') }} @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_slug')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text"
                                        name="{{ $locale }}[meta_slug]" value="{{ old($locale . '.meta_slug') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>{{ trans('site.Active ?') }}</label>
                            <input type="checkbox" name="is_active" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 col-lg-6">
                            <label>{{ trans('site.Show in Home Page ?') }}</label>
                            <input type="checkbox" name="show_in_homepage" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>{{ trans('site.Tags') }}</label>
                            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value={{ $tag->id }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>{{ trans('site.Category') }}</label>
                            <select class="js-example-basic form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row pt-3">

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>{{ trans('site.Image') }}</label>
                            @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="image" class="form-control input-sm image">

                            <img src="{{ asset('uploads/blogs/default.png') }}" width="500px"
                                class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            {{ trans('site.create') }} {{ trans('site.Blog') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

@section('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endsection
