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
            <ul class="nav nav-pills nav-info" id="pills-infotab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="pills-infohome-tab" data-bs-toggle="pill" href="#pills-infohome" role="tab" aria-controls="pills-infohome" aria-selected="true" data-bs-original-title="" title="">
                    <div class="media">
                    <i class="flag-icon flag-icon-eg"></i>
                  </div>AR</a></li>
                <li class="nav-item"><a class="nav-link" id="pills-infoprofile-tab" data-bs-toggle="pill" href="#pills-infoprofile" role="tab" aria-controls="pills-infoprofile" aria-selected="false" data-bs-original-title="" title=""> <div class="media">
                    <i class="flag-icon flag-icon-my"></i>
                  </div>EN</a></li>
            </ul>
            <div class="row">
                <div class="tab-content" id="pills-infotabContent">
                    <div class="tab-pane fade show active" id="pills-infohome" role="tabpanel" aria-labelledby="pills-infohome-tab">
                        <p class="mb-0 m-t-30">Ar Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                    <div class="tab-pane fade" id="pills-infoprofile" role="tabpanel" aria-labelledby="pills-infoprofile-tab">
                        <p class="mb-0 m-t-30">En Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    </div>
                </div>
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

                    <div class="form-group my-4">
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
