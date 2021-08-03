@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.edit') . ' | ' . trans('site.Blogs'))

@section('breadcrumb-title')
    <h5>{{ trans('site.Blogs') }}</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Blogs') }}</li>
    <li class="breadcrumb-item">{{ $blog->title }}</li>
@stop

@section('content')

    @include('admin.cuba.partials._session')
    @include('admin.cuba.partials._errors')

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="bg-white border-radius p-2px">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" @if ($blog->is_active) checked @endif>
                                <label for="is_active">{{ trans('site.Active ?') }}</label>
                            </div>
     
                        </div>
                    </div>
                    <div class="col-md-8 mt-4">
                        <ul class="nav nav-pills nav-primary " id="pills-infotab" role="tablist">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
                    <!-- Default box -->
        <div class="bg-white border-radius box-shadow w-80 card-solid">
            <div class="card-body">
               <div class="row mt-5">


                <form class="col-12 form-user-create" action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                    enctype="multipart/form-data">

                <div class="row">
                    <form class="col-md-12 m-auto" action="{{ route('admin.blogs.store') }}" method="post"

                        <form class="col-12" action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                            enctype="multipart/form-data">


                        <form class="col-12" action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="row">
                                <div class="tab-content container" id="pills-infotabContent">
                                    @foreach (config('translatable.locales') as $locale)
                                    <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                            
                                        <div class="row">

                                                <div class="form-group col-md-6 mb-1">
                                                        <label class="label-page after" for="{{ $locale }}[title]">{{ trans('site.title') }} @lang('site.' .
                                                            $locale .
                                                            '.in name')</label>
                                                        @error($locale . '.title')
                                                            <span class="text-danger mx-5">{{ $message }}</span>
                                                        @enderror
                                                        <input class="form-control form-control-solid" type="text" name="{{ $locale }}[title]"
                                                            value="{{ $blog->translate($locale)->title }}">
                                                </div>
                                                <div class="form-group col-md-6 mb-1">
                                                    <label class="label-page after" for="{{ $locale }}[creator]">{{ trans('site.Creator Name') }}
                                                        @lang('site.' . $locale .
                                                        '.in name')</label>
                                                    @error($locale . '.creator')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control form-control-solid" type="text" name="{{ $locale }}[creator]"
                                                        value="{{ $blog->translate($locale)->creator }}">
                                                </div>

                                                <div class="form-group col-md-6 mb-1">
                                                    <label class="label-page after" for="{{ $locale }}[meta_title]">{{ trans('site.Meta Title') }}
                                                        @lang('site.' . $locale .
                                                        '.in name')</label>
                                                    @error($locale . '.meta_title')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control form-control-solid" type="text"
                                                        name="{{ $locale }}[meta_title]"
                                                        value="{{ $blog->translate($locale)->meta_title }}">
                                                </div>

                                                <div class="form-group col-md-6 mb-1">
                                                    <label class="label-page after" for="{{ $locale }}[meta_keywords]">{{ trans('site.Meta keywords') }}
                                                        @lang('site.' .
                                                        $locale .
                                                        '.in name')</label>
                                                    @error($locale . '.meta_keywords')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control form-control-solid" type="text"
                                                        name="{{ $locale }}[meta_keywords]"
                                                        value="{{ $blog->translate($locale)->meta_keywords }}">
                                                </div>

                                                <div class="form-group col-md-6 mb-1">
                                                    <label class="label-page after"
                                                        for="{{ $locale }}[meta_description]">{{ trans('site.Meta description') }}
                                                        @lang('site.' .
                                                        $locale .
                                                        '.in name')</label>
                                                    @error($locale . '.meta_description')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control form-control-solid" type="text"
                                                        name="{{ $locale }}[meta_description]"
                                                        value="{{ $blog->translate($locale)->meta_description }}">
                                                </div>

                                                <div class="form-group col-md-6 mb-1">
                                                    <label class="label-page after" for="{{ $locale }}[meta_slug]">{{ trans('site.slug') }} @lang('site.' .
                                                        $locale .
                                                        '.in name')</label>
                                                    @error($locale . '.meta_slug')
                                                        <br />
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control form-control-solid" type="text"
                                                        name="{{ $locale }}[meta_slug]"
                                                        value="{{ $blog->translate($locale)->meta_slug }}">
                                                </div>

                                                <div class="form-group col-md-12 mb-1">
                                                    <label class="label-page after" for="{{ $locale }}[description]">{{ trans('site.description') }}
                                                        @lang('site.' .
                                                        $locale . '.in name')</label>
                                                    @error($locale . '.description')
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <textarea class="form-control form-control-solid textaarea-page" type="text"
                                                        name="{{ $locale }}[description]"
                                                        value="">{{ $blog->translate($locale)->description }}</textarea>
                                                </div>

                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label class="label-page after"> {{ trans('site.Tags') }}</label>
                                    <select class="form-select form-control-inverse" name="tags[]" multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" @if (in_array($tag->id, $blog_tags)) selected @endif>
                                                {{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-12 col-lg-6">
                                    <label class="label-page after"> {{ trans('site.Category') }}</label>
                                    <select class="form-select form-control-inverse" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($blog->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="row pt-3">

                                <div class="form-group col-sm-12 col-lg-12">
                                    <label class="label-page after"> {{ trans('site.Image') }}</label>
                                    @error('image')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="image" class="form-control input-sm image">

                                    <img src="{{ $blog->image_path }}" width="300px" class="img-thumbnail image-preview mt-1"
                                        alt="">
                                </div> 
                                
                                <div class="form-group text-center col-md-12 text-center mt-5">
                                    <button type="submit" class="btn btn-square btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>
                                        {{ trans('site.update') }} {{ trans('site.Blog') }}</button>
                                </div>

                            </div>



                    </form>
                </div>
        <!-- /.card-body -->
         </div>
         </div>
         </div>
    <!-- /.card -->
        </div>
    </div>


@endsection

@section('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endsection
