@extends('layouts.admin.cuba')

@section('title', 'Regions | Create')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Regions</li>
    <li class="breadcrumb-item">Create</li>
@stop


@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

{{--                        @include('partials._errors')--}}
                <form class="col-12" action="{{ route('admin.regions.store') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Region Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ old($locale.'.name') }}">
                                </div>
                        </div>
                        @endforeach

                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                            <label for="country">Country</label>
                            @error('country_id')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <select name="country_id" class="form-control">
                                <option value="">All Cities</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city -> id }}">{{ $city -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Add Region</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
