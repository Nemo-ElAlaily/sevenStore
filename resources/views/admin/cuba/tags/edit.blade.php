@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Tag') . ' | ' . $tag->name )

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Tags') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')


<div class="row">
    <div class="col-md-4">
        <div class="bg-white border-radius">
            <div class="row p-1">
                <div class="col-md-4 mt-2">
                    <div class="form-group col-sm-12 col-lg-12 text-md">
                        <div class="form-check checkbox checkbox-solid-secondary">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" @if ($tag->is_active == 1) checked @endif>
                            <label class="" for="is_active">{{ trans('site.Active ?') }}</label>
                        </div>
                        @error('is_active')
                            <span class="text-danger mx-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="nav nav-pills nav-primary mt-3 " id="pills-infotab" role="tablist">
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
    <div class="w-80 bg-white border-radius box-shadow card-solid">
        <div class="card-body">
            <div class="row mt-5">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.tags.update', $tag->id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="setting-general-title">
                                Edit Tag
                            </h2>
                        </div>
                        <div class="tab-content container" id="pills-infotabContent">
                            @foreach (config('translatable.locales') as $locale)
                                <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                  
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5 mr-1">
                                            <label class="label-page">  {{ trans('site.name') }} @lang('site.' . $locale . '.name')</label>
                                            @error($locale . '.in name')
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control  form-control-solid" type="text" name="{{ $locale }}[name]"
                                                value="{{ $tag->translate($locale)->name }}" required>
                                        </div>
    
                                        <div class="form-group col-md-5">
                                            <label class="label-page" for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' . $locale .
                                                '.in name')</label>
                                            @error($locale . '.slug')
                                                <br />
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <input class="form-control form-control-solid" type="text" name="{{ $locale }}[slug]"
                                                value="{{ $tag->translate($locale)->slug }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group col-md-12 text-center mt-5">
                        <button type="submit" class="btn btn-square btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>
                            {{ trans('site.edit') }}</button>
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
