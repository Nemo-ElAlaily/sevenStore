@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Categories') .  ' | ' . trans('site.edit'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Categories') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop


@section('content')
    <!-- Default box -->


    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group col-sm-12 col-md-6">
                            <div class="form-check checkbox checkbox-solid-secondary">
                                <input class="" type="checkbox" class="custom-control-input" id="is_active"
                                    name="is_active" checked>
                                <label class="custom-control-label" for="is_active">{{ trans('site.Active ?') }}</label>
                            </div>
                            @error('is_active')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-primary mb-3" id="pills-infotab" role="tablist">

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

            <div class="card">
                <div class="card-body">
                    <div class="row">
        
                        @include('admin.cuba.partials._errors')
                        @include('admin.cuba.partials._session')
                        <form action="{{ route('admin.main_categories.store') }}" method="post"
                            enctype="multipart/form-data">
        
                            {{ csrf_field() }}
                                <div class="row">
        
        
                                    <div class="tab-content container" id="pills-infotabContent">
                                        @foreach (config('translatable.locales') as $index => $locale)
                                            <div class="row tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                                <div class="row d-flex">
                                                    <div class="form-group col-md-6">
                                                        <label class="label-page after" for="{{ $locale }}[name]">{{ trans('site.Category name') }} @lang('site.' .
                                                        $locale . '.in name')</label>
                                                        @error($locale . '.name')
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                        @enderror
                                                        <input class="form-control input-thick create-category-input" type="text"
                                                               name="{{ $locale }}[name]" value="">
                                                    </div>
            
                                                    <div class="form-group col-md-6">
                                                        <label class="label-page after" for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' .
                                                        $locale . '.in name')</label>
                                                        @error($locale . '.slug')
                                                        <span class="text-danger mx-5">{{ $message }}</span>
                                                        @enderror
                                                        <input class="form-control input-thick create-category-input " type="text"
                                                               name="{{ $locale }}[slug]" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
        
                                    </div>
        
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="label-page after" for="parent_id">{{ trans('site.Parent Category') }}</label>
                                            @error('parent_id')
                                                <span class="text-danger mx-5">{{ $message }}</span>
                                            @enderror
                                            <select name="parent_id" class="form-select form-control-inverse">
                                                <option value="0">{{ trans('site.Is Parent') }}</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label class="label-page after" for="image">{{ trans('site.Image') }}</label>
                                        @error('image')
                                            <span class="text-danger mx-1">{{ $message }}</span>
                                        @enderror
                                        <input type="file" name="image" class="form-control input-sm image mb-4">
        
                                        <img src=""
                                            class="img-thumbnail image-preview mt-1 image-preview img-fluid d-block m-auto"
                                            alt="">
                                    </div> {{-- end of form group image --}}
                                </div>
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-pill btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>
                                    {{ trans('site.add') }} {{ trans('site.Category') }}</button>
                                </div>
        
                        </form><!-- end of form -->
        
                    </div>
        
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <!-- /.card -->
@stop
