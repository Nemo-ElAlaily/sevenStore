@extends('layouts.admin.cuba')

@section('title', $page -> title)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item">Show</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12">

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">Page Title in @lang('site.' . $locale . '.name')</label>
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                           value="{{ $page->translate($locale)-> title }}">
                                </div>
                                <div class="form-group">
                                    <label for="{{ $locale }}[slug]">Page Slug in @lang('site.' . $locale . '.name')</label>
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                           value="{{ $page->translate($locale)-> name }}">
                                </div>


                                <div class="form-group">
                                    <label for="{{ $locale }}[content]">Page Content in @lang('site.' . $locale . '.name')</label>
                                    <textarea class="form-control input-thick ckeditor" type="text" name="{{ $locale }}[content]">{{ $page->translate($locale)-> content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_title]">Meta Title in @lang('site.' .
                                        $locale . '.meta_title')</label>
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                           name="{{ $locale }}[meta_title]"
                                           value="{{ $site_settings->translate($locale)->meta_title }}">
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_description]">Meta Description in @lang('site.' .
                                        $locale .
                                        '.meta_description')</label>
                                    <input class="form-control input-thick bg-dark text-center" type="text"
                                           name="{{ $locale }}[meta_description]"
                                           value="{{ $site_settings->translate($locale)->meta_description }}">
                                </div>

                                <div class="form-group">
                                    <label class="labelSetting" for="{{ $locale }}[meta_keyword]">Meta Keyword in @lang('site.' .
                                        $locale . '.meta_keyword')</label>
                                    <input class="form-control   input-thick bg-dark text-center" type="text"
                                           name="{{ $locale }}[meta_keyword]"
                                           value="{{ $site_settings->translate($locale)->meta_keyword }}">
                                </div>

                            </div>
                        @endforeach
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
