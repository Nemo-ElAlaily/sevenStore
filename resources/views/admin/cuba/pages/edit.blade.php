@extends('admin.cuba.layouts.cuba')

@section('title', $page->title)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Pages') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="bg-white border-radius p-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group text-md">
                        <div class="form-check checkbox checkbox-solid-secondary">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" @if ($page->is_active == 1) checked @endif>
                        <label class="" class="custom-control-label" for="is_active">{{ trans('site.Active ?') }}</label>
                        </div>
                        @error('is_active')
                            <span class="text-danger mx-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8 mt-4">
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
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
    <!-- Default box -->
    <div class="bg-white w-80 border-radius p-4 box-shadow mb-4 card-solid">
        <div class="card-body">
            <div class="row">
                <form class="" action="{{ route('admin.pages.update', $page->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="setting-general-title">Edit Page</h2>
                        </div>
                        <div class="tab-content container" id="pills-infotabContent">
                            @foreach (config('translatable.locales') as $locale)
                            <div class="row tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                <div class="row">    
                                    <div class="form-group mb-2 col-md-6">
                                        <label class="label-page after" for="{{ $locale }}[title]">{{ trans('site.Page Title') }} @lang('site.' . $locale .
                                              '.in name')</label>
                                          @error($locale . '.title')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control form-control-solid" type="text" name="{{ $locale }}[title]"
                                              value="{{ $page->translate($locale)->title }}">
                                  </div>
                                      <div class="form-group mb-2 col-md-6">
                                         <label class="label-page after" for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' . $locale .
                                              '.in name')</label>
                                          @error($locale . '.slug')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control form-control-solid" type="text" name="{{ $locale }}[slug]"
                                              value="{{ $page->translate($locale)->slug }}">
                                      </div>
      
      

      
                                      <div class="form-group mb-2 col-md-6">
                                         <label class="label-page after" for="{{ $locale }}[meta_title]">{{ trans('site.Meta Title') }}                                         @lang('site.' .
                                              $locale . '.in name')</label>
                                          @error($locale . '.meta_title')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control form-control-solid" type="text"
                                              name="{{ $locale }}[meta_title]" value="{{ $page->meta_title }}">
                                      </div>
      
                                      <div class="form-group mb-2 col-md-6">
                                         <label class="label-page after" for="{{ $locale }}[meta_description]">{{ trans('site.Meta Description') }} @lang('site.' .
                                              $locale .
                                              '.in name')</label>
                                          @error($locale . '.meta_description')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control form-control-solid" type="text"
                                              name="{{ $locale }}[meta_description]"
                                              value="{{ $page->meta_description }}">
                                      </div>
      
                                      <div class="form-group mb-2 col-md-6">
                                         <label class="label-page after" for="{{ $locale }}[meta_keyword]">{{ trans('site.Meta Keywords') }}                                        @lang('site.' .
                                              $locale . '.in name')</label>
                                          @error($locale . '.meta_keyword')
                                              <br />
                                              <span class="text-danger mx-5">{{ $message }}</span>
                                          @enderror
                                          <input class="form-control form-control-solid" type="text"
                                              name="{{ $locale }}[meta_keyword]" value="{{ $page->meta_keyword }}">
                                      </div>

                                      <div class="form-group mb-2 col-md-12">
                                        <label class="label-page" for="{{ $locale }}[content]">{{ trans('site.Page Content') }} @lang('site.' . $locale .
                                             '.in name')</label>
                                         @error($locale . '.content')
                                             <br />
                                             <span class="text-danger mx-5">{{ $message }}</span>
                                         @enderror
                                         <textarea class="textaarea-page box-shadow form-control form-control-solid " type="text"
                                             name="{{ $locale }}[content]">{{ $page->translate($locale)->content }}</textarea>
                                     </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group my-12 text-center m-auto mt-4">
                        <button type="submit" class="btn btn-square btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>
                            {{ trans('site.update') }} {{ trans('site.Page') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
</div>




@endsection
