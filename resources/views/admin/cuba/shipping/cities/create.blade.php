@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Cities') . ' | ' . trans('site.add'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Cities') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop


@section('content')

    <!-- Default box -->
    <div class="card card-solid w-50 mb-5">
        <div class="card-body">
            <div class="row">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.cities.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="label-page after" for="{{ $locale }}[name]">{{ trans('site.name') }} @lang('site.' .
                                        $locale . '.in name')</label>
                                    @error($locale . '.name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control form-control-solid" type="text" name="{{ $locale }}[name]"
                                        value="{{ old($locale . '.name') }}">
                                </div>
                            </div>
                        @endforeach

                        <div class="col-sm-12 col-lg-12 mb-3">
                            <div class="form-group">
                                <label class="label-page after" for="country">{{ trans('site.Country name') }}</label>
                                @error('country_id')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <select name="country_id" class="form-control">
                                    <option value="">{{ trans('site.All Countries') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12 m-auto text-center">
                        <button type="submit" class="btn btn-square btn-outline-secondary"><i class="fa fa-plus"></i>
                            {{ trans('site.add') . ' ' . trans('site.City') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
