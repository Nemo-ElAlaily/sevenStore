@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Categories') . ' | ' . trans('site.edit') )

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Categories') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop


@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-sm-12 col-md-6 text-md">
                            <div class="form-check checkbox checkbox-solid-primary">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" @if ($main_category->is_active == 1) checked @endif>
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
    </div>
    <div class="col-md-8">
        <div class=" card-solid">
            <div class="card-body p-0">
                <div class="row">
                    <div class="bg-white border-radius py-4">
                        @include('admin.cuba.partials._errors')
                        <form class=""
                            action="{{ route('admin.main_categories.update', $main_category->id) }}" method="post"
                            enctype="multipart/form-data">
    
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="row mt-4">
                                <div class="tab-content container" id="pills-infotabContent">
                                    @foreach (config('translatable.locales') as $index => $locale)
                                        <div class="row tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="{{ $locale }}" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                                            <div class="row d-flex">
                                                <div class="form-group col-md-6">
                                                    <label class="create-category-label" for="{{ $locale }}[name]">{{ trans('site.Category name') }} @lang('site.' .
                                                    $locale . '.in name')</label>
                                                    @error($locale . '.name')
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control input-thick create-category-input" type="text"
                                                           name="{{ $locale }}[name]" value="{{ $main_category->translate($locale)->name }}">
                                                </div>
        
                                                <div class="form-group col-md-6">
                                                    <label class="create-category-label" for="{{ $locale }}[slug]">{{ trans('site.slug') }} @lang('site.' .
                                                    $locale . '.in name')</label>
                                                    @error($locale . '.slug')
                                                    <span class="text-danger mx-5">{{ $message }}</span>
                                                    @enderror
                                                    <input class="form-control input-thick create-category-input " type="text"
                                                           name="{{ $locale }}[slug]" value="{{ $main_category->translate($locale)->slug }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
    
                                </div>
    
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label class="  my-2" for="parent_id">{{ trans('site.Parent Category') }}</label>
                                        @error('parent_id')
                                            <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <select name="parent_id" class="form-control select-css ">
                                            <option value="0">{{ trans('site.Is Parent') }}</option>
                                            @foreach ($all_categories as $item)
                                                <option value="{{ $item->id }}" @if ($main_category->parent_id == $item->id) selected @endif>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
    
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="  my-2" label for="image">{{ trans('site.Image') }}</label>
                                    @error('image')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="image" class="form-control input-sm image mb-4">
    
                                    <img src="{{ $main_category->image_path }}"
                                        class="img-thumbnail image-preview mt-1 image-preview img-fluid d-block m-auto"
                                        alt="{{ $main_category->slug }}">
                                </div> {{-- end of form group image --}}
    
                                <div class="form-group col-md-12 text-center mt-5">
                                    <button type="submit" class="btn btn-pill btn-outline-secondary btn-sm"><i class="fa fa-edit"></i>
                                        {{ trans('site.update') }} {{ trans('site.Category') }}</button>
                                </div>
                            </div>
    
                          
    
                        </form><!-- end of form -->
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
    <!-- Default box -->

    <!-- /.card -->
@stop
