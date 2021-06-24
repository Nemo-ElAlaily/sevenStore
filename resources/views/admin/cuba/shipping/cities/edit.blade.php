@extends('layouts.admin.cuba')

@section('title', 'City | ' . $city -> name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Cities</li>
    <li class="breadcrumb-item">Edit</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12" action="{{ route('admin.cities.update', $city -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">city Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ $city->translate($locale)-> name }}">
                                </div>

                            </div>
                        @endforeach

                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    @error('country_id')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <select name="country_id" class="form-control">
                                        <option value="">All Countries</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country -> id }}" {{ $city->country_id == $country->id ? 'selected' : '' }}>{{ $country -> name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Update city</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection