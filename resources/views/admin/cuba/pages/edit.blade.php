@extends('admin.cuba.layouts.cuba')

@section('title', $page->title)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Pages') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="bg-white w-80 border-radius p-4 box-shadow mb-4 card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.pages.update', $page->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6  text-md">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" @if ($page->is_active == 1) checked @endif>
                               <label class="label-page" class="custom-control-label" for="is_active">{{ trans('site.Active ?') }}</label>
                            </div>
                            @error('is_active')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6  text-md">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input type="checkbox" class="custom-control-input" id="show_in_footer"
                                    name="show_in_navbar" @if ($page->show_in_navbar == 1) checked @endif>
                               <label class="label-page" class="custom-control-label" for="show_in_navbar">{{ trans('site.Show in Navbar') }}</label>
                            </div>
                            @error('show_in_navbar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6  text-md">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input type="checkbox" class="custom-control-input" id="show_in_footer"
                                    name="show_in_sidebar" @if ($page->show_in_sidebar == 1) checked @endif>
                               <label class="label-page" class="custom-control-label" for="show_in_sidebar">{{ trans('site.Show in Sidebar') }}</label>
                            </div>
                            @error('show_in_sidebar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6  text-md">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input type="checkbox" class="custom-control-input" id="show_in_footer"
                                    name="show_in_footer" @if ($page->show_in_footer == 1) checked @endif>
                               <label class="label-page" class="custom-control-label" for="show_in_footer">{{ trans('site.Show in Footer') }}</label>
                            </div>
                            @error('show_in_footer')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <ul class="nav nav-pills nav-info my-3 " id="pills-infotab" role="tablist">
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

                        <div class="tab-content container" id="pills-infotabContent">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="row tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                            <div class="row d-flex">    
                                <div class="w-50">
                                    <div class="form-group">
                                        <label class="label-page" class="label-page" for="{{ $locale }}[title]">{{ trans('site.Page Title') }} @lang('site.' . $locale .
                                              '.in name')</label>
                                          @error($locale . '.title')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control input-thick" type="text" name="{{ $locale }}[title]"
                                              value="{{ $page->translate($locale)->title }}">
                                  </div>
                                      <div class="form-group">
                                         <label class="label-page" for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' . $locale .
                                              '.in name')</label>
                                          @error($locale . '.slug')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                              value="{{ $page->translate($locale)->slug }}">
                                      </div>
      
      
                                      <div class="form-group">
                                         <label class="label-page" for="{{ $locale }}[content]">{{ trans('site.Page Content') }} @lang('site.' . $locale .
                                              '.in name')</label>
                                          @error($locale . '.content')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <textarea class="textaarea-page box-shadow form-control input-thick " type="text"
                                              name="{{ $locale }}[content]">{{ $page->translate($locale)->content }}</textarea>
                                      </div>
      
                                      <div class="form-group">
                                         <label class="label-page" class="labelSetting" for="{{ $locale }}[meta_title]">{{ trans('site.Meta Title') }}                                         @lang('site.' .
                                              $locale . '.in name')</label>
                                          @error($locale . '.meta_title')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control   input-thick  text-center" type="text"
                                              name="{{ $locale }}[meta_title]" value="{{ $page->meta_title }}">
                                      </div>
      
                                      <div class="form-group">
                                         <label class="label-page" class="labelSetting" for="{{ $locale }}[meta_description]">{{ trans('site.Meta Description') }} @lang('site.' .
                                              $locale .
                                              '.in name')</label>
                                          @error($locale . '.meta_description')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control   input-thick  text-center" type="text"
                                              name="{{ $locale }}[meta_description]"
                                              value="{{ $page->meta_description }}">
                                      </div>
      
                                      <div class="form-group">
                                         <label class="label-page" class="labelSetting" for="{{ $locale }}[meta_keyword]">{{ trans('site.Meta Keywords') }}                                        @lang('site.' .
                                              $locale . '.in name')</label>
                                          @error($locale . '.meta_keyword')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control   input-thick  text-center" type="text"
                                              name="{{ $locale }}[meta_keyword]" value="{{ $page->meta_keyword }}">
                                      </div>
      
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group my-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            {{ trans('site.update') }} {{ trans('site.Page') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
