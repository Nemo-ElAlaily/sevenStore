@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Countries') . ' | ' . trans('site.create') )

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Countries') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop


@section('content')

    <!-- Default box -->
    <div class="card card-solid w-50 mb-5">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12" action="{{ route('admin.countries.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="label-page after" for="{{ $locale }}[name]">{{ trans('site.Country name') }}                                         @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.in name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control form-control-solid" type="text" name="{{ $locale }}[name]"
                                        value="{{ old($locale . '.name') }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row mb-5">

                        <div class="form-group col-sm-12 col-lg-12">
                            <label class="label-page after" for="flag">{{ trans('site.Flag') }}</label>
                            @error('flag')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="flag" class="form-control input-sm image">

                            <img src="{{ asset('uploads/countries/default.png') }}" width="100px"
                                class="img-thumbnail image-preview mt-1" alt="Image Preview">
                        </div> {{-- end of form group image --}}

                    </div>

                    <div class="form-group col-md-12 m-auto text-center">
                        <button type="submit" class="btn btn-square btn-secondary"><i class="fa fa-plus"></i>
                            {{ trans('site.add') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
