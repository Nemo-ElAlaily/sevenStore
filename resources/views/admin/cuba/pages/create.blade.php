@extends('layouts.admin.cuba')

@section('title', 'Create Page')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item">Create</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body page-create-parent">
            <div class="row">

                @include('admin.cuba.partials._session')
                @include('admin.cuba.partials._errors')

                <form class="col-12 page-create-form" action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">

                        <div class="form-group col-sm-12 col-md-3 my-5 text-md">
                            <div class="checkbox checkbox-solid-primary">
                                <input class=""  type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                <label class="labelPage" for="is_active">Is Active</label>
                            </div>
                            @error('is_active')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-3 my-5 text-md">
                            <div class="checkbox checkbox-solid-warning">
                                <input class=""  type="checkbox" class="custom-control-input" id="show_in_footer" name="show_in_navbar" checked >
                                <label class="labelPage" for="show_in_navbar">Show in Navbar</label>
                            </div>
                            @error('show_in_navbar')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-3 my-5 text-md">
                            <div class="checkbox checkbox-solid-secondary">
                                <input class=""  type="checkbox" class="custom-control-input" id="show_in_footer" name="show_in_sidebar" checked >
                                <label class="labelPage" for="show_in_sidebar">Show in Sidebar</label>
                            </div>
                            @error('show_in_sidebar')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-3 my-5 text-md">
                            <div class="checkbox checkbox-solid-info">
                                <input class=""  type="checkbox" class="custom-control-input" id="show_in_footer" name="show_in_footer" checked >
                                <label class="labelPage" for="show_in_footer">Show in Footer</label>
                            </div>
                            @error('show_in_footer')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group col-md-8">
                                    <label class="labelPage" for="{{ $locale }}[title]">Page Title in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.title')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-blog-create" type="text" name="{{ $locale }}[title]"
                                           value="">
                                </div>
                                <div class="form-group  col-md-8">
                                    <label class="labelPage" for="{{ $locale }}[slug]">Page Slug in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.slug')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-blog-create" type="text" name="{{ $locale }}[slug]"
                                           value="">
                                </div>


                                <div class="form-group col-md-8">
                                    <label class="labelPage" for="{{ $locale }}[content]">Page Content in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.content')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control  textareaBlog" type="text" name="{{ $locale }}[content]">
                                    </textarea>
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="labelPage" for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' .
                                        $locale . '.meta_title')</label>
                                    @error($locale . '.meta_title')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-blog-create text-center" type="text"
                                           name="{{ $locale }}[meta_title]"
                                           value="">
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="labelPage" for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' .
                                        $locale .
                                        '.meta_description')</label>
                                    @error($locale . '.meta_description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-blog-create  text-center" type="text"
                                           name="{{ $locale }}[meta_description]"
                                           value="">
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="labelPage" for="{{ $locale }}[meta_keyword]">Meta Keyword in @lang('site.' .
                                        $locale . '.meta_keyword')</label>
                                    @error($locale . '.meta_keyword')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-blog-create  text-center" type="text"
                                           name="{{ $locale }}[meta_keyword]"
                                           value="">
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="form-group my-5">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-plus"></i>
                            Create Page</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
