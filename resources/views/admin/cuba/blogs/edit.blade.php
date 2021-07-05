@extends('layouts.admin.cuba')

@section('title', 'Edit | Blogs')

@section('breadcrumb-title')
    <h5>Blogs</h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Blogs</li>
    <li class="breadcrumb-item">{{ $blog -> title }}</li>
@stop

@section('content')

    @include('admin.cuba.partials._session')
    @include('admin.cuba.partials._errors')
    <!-- Default box -->
    <div class="card card-solid ">
        <div class="card-body">
<<<<<<< HEAD
            <div class="row">

                <form class="col-12 form-user-create" action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                    enctype="multipart/form-data">
=======
            <div class="row  add-create-blog">
                <form class="col-md-12 m-auto" action="{{ route('admin.blogs.store') }}" method="post"
                      enctype="multipart/form-data">
>>>>>>> 7a5d956361d8932cb4f3f1c9e74745e4a2df8425

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <ul class="nav nav-pills mb-3" id="lang-tab" role="tablist">
                        @foreach (config('translatable.locales') as $index => $locale)
                            <li class="nav-item">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="'pills-{{$locale}}-tab'" data-toggle="pill" href="#{{ $locale }}" role="tab" aria-controls="{{ $locale }}" aria-selected="true">@lang('site.' . $locale . '.name')</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="lang-tabContent">

                        @foreach (config('translatable.locales') as $locale)
                            <div class="tab-pane fade  show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="pills-{{ $locale }}-tab">
                                <div class="col-sm-12 col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="labelBlog" class="labelBlog" for="{{ $locale }}[title]">Blog Title in @lang('site.' . $locale .
                                            '.name')</label>
                                                @error($locale . '.title')
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control  input-thick input-blog-create text-center" type="text" name="{{ $locale }}[title]"
                                                       value="{{ $blog -> translate($locale) -> title }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="labelBlog" for="{{ $locale }}[slug]">Slug in @lang('site.' . $locale .
                                            '.slug')</label>
                                                @error($locale . '.slug')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick input-blog-create" type="text"
                                                       name="{{ $locale }}[slug]" value="{{$blog -> translate($locale) -> slug }}">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group w-100">
                                                <label class="labelBlog" for="{{ $locale }}[description]">Blog Description in @lang('site.' .
                                            $locale . '.name')</label>
                                                @error($locale . '.description')
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <textarea class="form-control input-thick textareaBlog" type="text"
                                                          name="{{ $locale }}[description]"
                                                          value="{{ $blog -> translate($locale) -> description }}"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="labelBlog" for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' . $locale . '.meta_title')</label>
                                                @error($locale . '.meta_title')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick" type="text"
                                                       name="{{ $locale }}[meta_title]"
                                                       value="{{ $blog -> translate($locale) -> meta_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="labelBlog" for="{{ $locale }}[meta_keywords]">Meta Keywords in @lang('site.' .
                                            $locale .
                                            '.meta_keywords')</label>
                                                @error($locale . '.meta_keywords')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick input-blog-create" type="text"
                                                       name="{{ $locale }}[meta_keywords]"
                                                       value="{{ $blog -> translate($locale) -> meta_keywords }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="labelBlog" for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' .
                                            $locale .
                                            '.meta_description')</label>
                                                @error($locale . '.meta_description')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                                @enderror
                                                <input class="form-control input-thick input-blog-create" type="text"
                                                       name="{{ $locale }}[meta_description]"
                                                       value="{{ $blog -> translate($locale) -> meta_description }}">
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">

                        <div class="form-group col-sm-12 col-md-6 m">
                            <label>Image</label>
                            @error('image')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="image" class="form-control input-sm image" accept="jpg, png, jpeg, svg">

                            <img src="{{ asset('uploads/blogs/default.png') }}" width="100px"
                                 class="img-thumbnail image-preview mt-1" alt="">
                        </div> {{-- end of form group image --}}
                        <div class="form-group col-md-6 mt-5">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Create Blog</button>
                        </div>
                    </div> {{-- end of translatable data --}}


                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection

@section('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection
