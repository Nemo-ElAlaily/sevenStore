@extends('layouts.admin.cuba')

@section('title', 'Create Page')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item">Create</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._session')
                @include('admin.cuba.partials._errors')

                <form class="col-12" action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">Page Title in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.title')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                           value="">
                                </div>
                                <div class="form-group">
                                    <label for="{{ $locale }}[slug]">Page Slug in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.slug')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                           value="">
                                </div>


                                <div class="form-group">
                                    <label for="{{ $locale }}[content]">Page Content in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.content')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control input-thick ckeditor" type="text" name="{{ $locale }}[content]">
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' .
                                        $locale . '.meta_title')</label>
                                    @error($locale . '.meta_title')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                           name="{{ $locale }}[meta_title]"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' .
                                        $locale .
                                        '.meta_description')</label>
                                    @error($locale . '.meta_description')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                           name="{{ $locale }}[meta_description]"
                                           value="">
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_keyword]">Meta Keyword in @lang('site.' .
                                        $locale . '.meta_keyword')</label>
                                    @error($locale . '.meta_keyword')
                                    <br />
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                           name="{{ $locale }}[meta_keyword]"
                                           value="">
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Create Page</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection