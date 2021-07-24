@extends('layouts.admin.cuba')

@section('title', trans('site.create') . ' ' . trans('site.Page'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Pages') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._session')
                @include('admin.cuba.partials._errors')

                <form class="col-12" action="{{ route('admin.pages.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input class="radio" type="checkbox" class="custom-control-input" id="is_active"
                                    name="is_active" checked>
                                <label class="custom-control-label" for="is_active">{{ trans('site.Active ?') }}</label>
                            </div>
                            @error('is_active')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input class="radio" type="checkbox" class="custom-control-input" id="show_in_footer"
                                    name="show_in_navbar" checked>
                                <label class="custom-control-label" for="show_in_navbar">{{ trans('site.Show in Navbar') }}</label>
                            </div>
                            @error('show_in_navbar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input class="radio" type="checkbox" class="custom-control-input" id="show_in_footer"
                                    name="show_in_sidebar" checked>
                                <label class="custom-control-label" for="show_in_sidebar">{{ trans('site.Show in Sidebar') }}</label>
                            </div>
                            @error('show_in_sidebar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input class="radio" type="checkbox" class="custom-control-input" id="show_in_footer"
                                    name="show_in_footer" checked>
                                <label class="custom-control-label" for="show_in_footer">{{ trans('site.Show in Footer') }}</label>
                            </div>
                            @error('show_in_footer')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">{{ trans('site.Page Title') }} @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.slug')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                        value="">
                                </div>


                                <div class="form-group">
                                    <label for="{{ $locale }}[content]">{{ trans('site.Page Content') }} @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.content')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text"
                                        name="{{ $locale }}[content]">
                                        </textarea>
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_title]">{{ trans('site.Meta Title') }} @lang('site.' .
                                        $locale . '.in name')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                        name="{{ $locale }}[meta_title]" value="">
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_description]">{{ trans('site.Meta Description') }} @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_description')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                        name="{{ $locale }}[meta_description]" value="">
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_keyword]">{{ trans('site.Meta Keywords') }}                                         @lang('site.' .
                                        $locale . '.in name')</label>
                                    @error($locale . '.meta_keyword')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                        name="{{ $locale }}[meta_keyword]" value="">
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            {{ trans('site.add') }} {{ trans('site.Page') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
