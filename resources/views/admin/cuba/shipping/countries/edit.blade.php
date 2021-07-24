@extends('layouts.admin.cuba')

@section('title', trans('site.Country') . ' | ' . $country->name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Countries') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12" action="{{ route('admin.countries.update', $country->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="countriesLable" for="{{ $locale }}[name]">{{ trans('site.Country name') }}                                         @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.in name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                        value="{{ $country->translate($locale)->name }}">
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="form-group col-sm-12 col-lg-12 mb-5 ">
                        <label class="countriesLable" for="flag">{{ trans('site.Flag') }}</label>
                        @error('flag')
                            <span class="text-danger mx-1">{{ $message }}</span>
                        @enderror
                        <input type="file" name="flag" class="form-control input-sm image">

                        <img src="{{ $country->flag_path }}" width="100px" class="img-thumbnail image-preview mt-1"
                            alt="">
                    </div> {{-- end of form group image --}}


                    <div class="form-group">
                        <button type="submit" class="btn btnEdit"><i class="fa fa-plus"></i>
                            {{ trans('site.update') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
