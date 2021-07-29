@extends('admin.cuba.layouts.cuba')

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
    <div class="w-80 bg-white border-radius card-solid">
        <div class="card-body">
            <ul class="nav nav-pills nav-info mt-3 " id="pills-infotab" role="tablist">
                @foreach (config('translatable.locales') as $index => $locale)
                    <li class="nav-item">
                        <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}-tab" data-bs-toggle="pill" href="#{{ $locale }}" role="tab" aria-controls="{{ $locale }}" aria-selected="true" data-bs-original-title="" title="">
                            <div class="media">
                                <i class="{{ $locale == 'en' ? 'us' : 'ae' }}"></i>
                            </div>
                            {{ trans('site.' . $locale . '.name' ) }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="row mt-4">
                <form class="col-12" action="{{ route('admin.blogs.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="tab-content container" id="pills-infotabContent">

                        @foreach (config('translatable.locales') as $locale)
                        <div class="w-80 tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                <div class="form-group">
                                    <label class="label-page" for="{{ $locale }}[title]">{{ trans('site.title') }} @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.title')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control p-2px" type="text" name="{{ $locale }}[title]"
                                        value="{{ old($locale . '.title') }}">
                                </div>

                                <div class="form-group">
                                    <label class="label-page"
                                        for="{{ $locale }}[description]">{{ trans('site.' . $locale . '.description') }}
                                        @lang('site.' .
                                        $locale . '.in name')</label>
                                    @error($locale . '.description')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick box-shadow textaarea-page" type="text"
                                        name="{{ $locale }}[description]"
                                        value="{{ old($locale . '.description') }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="label-page" for="{{ $locale }}[creator]">{{ trans('site.Creator Name') }}
                                        @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.creator')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control p-2px" type="text" name="{{ $locale }}[creator]"
                                        value="{{ old($locale . '.creator') }}">
                                </div>

                                <div class="form-group">
                                    <label class="label-page" for="{{ $locale }}[meta_title]">{{ trans('site.Meta Title') }}
                                        @lang('site.' . $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_title')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control p-2px" type="text"
                                        name="{{ $locale }}[meta_title]"
                                        value="{{ old($locale . '.meta_title') }}">
                                </div>

                                <div class="form-group">
                                    <label class="label-page" for="{{ $locale }}[meta_keywords]">{{ trans('site.Meta Keywords') }}
                                        @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_keywords')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control p-2px" type="text"
                                        name="{{ $locale }}[meta_keywords]"
                                        value="{{ old($locale . '.meta_keywords') }}">
                                </div>

                                <div class="form-group">
                                    <label class="label-page" 
                                        for="{{ $locale }}[meta_description]">{{ trans('site.Meta Description') }}
                                        @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_description')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control p-2px" type="text"
                                        name="{{ $locale }}[meta_description]"
                                        value="{{ old($locale . '.meta_description') }}">
                                </div>

                                <div class="form-group">
                                    <label class="label-page" for="{{ $locale }}[meta_slug]">{{ trans('site.slug') }} @lang('site.' .
                                        $locale .
                                        '.in name')</label>
                                    @error($locale . '.meta_slug')
                                        <br />
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control p-2px" type="text"
                                        name="{{ $locale }}[meta_slug]" value="{{ old($locale . '.meta_slug') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5 mb-4">
                        <div class="form-group col-sm-6 col-lg-6 ">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="is_active">
                                <label class="label-page" for="is_active">{{ trans('site.Active ?') }}</label>
                            </div>

                        </div>
                        <div class="form-group col-sm-6 col-lg-6">
                            <div class="form-check checkbox checkbox-solid-secondary">
                            <input type="checkbox" name="show_in_homepage" class="custom-control-input" id="show_in_homepage">
                            <label class="label-page" for="show_in_homepage" >{{ trans('site.Show in Home Page ?')}}</label>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label class="label-page" >{{ trans('site.Tags') }}</label>
                            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value={{ $tag->id }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-lg-6">
                            <label class="label-page" >{{ trans('site.Category') }}</label>
                            <select class="js-example-basic form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value={{ $category->id }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row pt-3">

                        <div class="form-group col-sm-12 col-lg-12">
                            <label class="label-page" >{{ trans('site.Image') }}</label>
                            @error('image')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="image" class="form-control input-sm image">

                            <img src="{{ asset('uploads/blogs/default.png') }}" width="500px"
                                class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}

                    </div>

                    <div class="form-group my-5">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-plus"></i>
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
