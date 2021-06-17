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

                {{--                        @include('partials._errors')--}}
                <form class="col-12">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="{{ $locale }}[title]">Page Title in @lang('site.' . $locale . '.name')</label>
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                           value="{{ $page->translate($locale)-> title }}">
                                </div>
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Page Title in @lang('site.' . $locale . '.name')</label>
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ $page->translate($locale)-> name }}">
                                </div>


                                <div class="form-group">
                                    <label for="{{ $locale }}[content]">Page Content in @lang('site.' . $locale . '.name')</label>
                                    <textarea class="form-control input-thick ckeditor" type="text" name="{{ $locale }}[content]">{{ $page->translate($locale)-> content }}</textarea>
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
