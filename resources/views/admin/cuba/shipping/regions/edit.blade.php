@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Region') . ' | ' . $region->name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Region') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12" action="{{ route('admin.regions.update', $region->id) }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="regionLabel" for="{{ $locale }}[name]">{{ trans('site.Region Name') }} @lang('site.'
                                        . $locale . '.in name')</label>
                                    @error($locale . '.name')
                                        <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                        value="{{ $region->translate($locale)->name }}">
                                </div>

                            </div>
                        @endforeach

                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label class="regionLabel" for="city_id">{{ trans('site.Cities') }}</label>
                                @error('city_id')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <select name="city_id" class="form-control">
                                    <option value="">{{ trans('site.All Cities') }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $region->city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-6 mb-3">
                            <div class="form-group">
                                <label class="regionLabel" for="shipping_cost">{{ trans('site.Shipping Cost') }}</label>
                                @error('shipping_cost')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="number" name="shipping_cost"
                                    value="{{ $region->shipping_cost }}">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btnEdit"><i class="fa fa-edit"></i>
                            {{ trans('site.update') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
