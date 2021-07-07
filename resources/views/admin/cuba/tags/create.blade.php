@extends('layouts.admin.cuba')

@section('title', 'Create Tag')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Tags</li>
    <li class="breadcrumb-item">Create</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12  create-tag-page-form" action="{{ route('admin.tags.store') }}" method="POST">

                    @csrf
                    @method('POST')
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-xl-5">
                            <div class="ribbon-wrapper card tag-create">
                                <div class="card-body">
                                    <div class="ribbon ribbon-primary ribbon-right">
                                <label>Tag Name in @lang('site.' . $locale . '.name')</label>
                            </div>
                                @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" placeholder="Type Name : @lang($locale)" type="text" name="{{ $locale }}[name]"
                                    value="{{ old($locale . '.name') }}" required>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-md-5">
                            <div class="ribbon-wrapper card tag-create">
                                <div class="card-body">
                                    <div class="ribbon ribbon-secondary ribbon-right">
                                        <label for="{{ $locale }}[slug]">Slug in @lang('site.' . $locale .
                                        '.slug')</label></div>
                                        @error($locale . '.slug')
                                            <br />
                                            <span class="text-danger mx-5">{{ $message }}</span>
                                        @enderror
                                        <input class="form-control input-thick" placeholder="Type Slug  : @lang($locale)" type="text"
                                            value="{{ old($locale . '.slug') }}">
        
                                  
                                </div>
                            </div>
                        </div>

    

                        @endforeach
                        
                        <div class="form-group col-sm-12 col-md-6 d-flex justify-content-around m-auto">

                            <div class="checkbox checkbox-primary">
                                <input class=""  type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                <label class="custom-control-label" for="is_active">Is Active</label>
                            </div>
                            @error('is_active')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror

                            <div class="checkbox checkbox-secondary">
                                <input class=""  type="checkbox" class="custom-control-input" id="is_popular_tag" name="is_popular_tag" checked >
                                <label class="custom-control-label" for="is_popular_tag">Is Popular</label>
                            </div>
                            @error('is_popular_tag')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>
             
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                            Add Tag</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
