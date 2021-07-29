@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Tags') . ' | ' . trans('site.add'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Tags') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="w-80 bg-white border-radius box-shadow card-solid">
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

            <div class="row mt-5">

                <form class="col-12" action="{{ route('admin.tags.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="tab-content container" id="pills-infotabContent">
                                @foreach (config('translatable.locales') as $locale)
                                  <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                    <div class="d-flex justify-content-between">

                                        <div class="form-group col-sm-12 col-lg-5">
                                            <label>{{ trans('site.name') }} @lang('site.' . $locale . '.name')</label>
                                            @error($locale . '.in name')
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                                value="{{ old($locale . '.name') }}" required>
                                        </div>

                                        <div class="form-group col-sm-12 col-lg-5">
                                            <label for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' . $locale .
                                                '.in name')</label>
                                            @error($locale . '.slug')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control input-thick" type="text" name="{{ $locale }}[slug]"
                                                value="{{ old($locale . '.slug') }}">
                                        </div>
                                  </div>
                                  </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                                <div class="form-check checkbox checkbox-solid-secondary">
                                    <input class="" type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                        checked>
                                    <label class="custom-control-label" for="is_active">{{ trans('site.Active ?') }}</label>
                                </div>
                                @error('is_active')
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                                <div class="form-check checkbox checkbox-solid-secondary">
                                    <input class="" type="checkbox" class="custom-control-input" id="is_popular_tag"
                                        name="is_popular_tag" checked>
                                    <label class="custom-control-label" for="is_popular_tag">{{ trans('site.Is Popular') }}</label>
                                </div>
                                @error('is_popular_tag')
                                    <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                            {{ trans('site.add') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
