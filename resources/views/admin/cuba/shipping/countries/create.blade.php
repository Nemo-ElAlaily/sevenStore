@extends('layouts.admin.cuba')

@section('title', 'Countries | Create')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Countries</li>
    <li class="breadcrumb-item">Create</li>
@stop


@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.cuba.partials._errors')
                <form class="col-12" action="{{ route('admin.countries.store') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label for="{{ $locale }}[name]">Country Name in @lang('site.' . $locale . '.name')</label>
                                    @error($locale . '.name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                           value="{{ old($locale.'.name') }}">
                                </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">

                            <div class="form-group col-sm-12 col-lg-12">
                                <label for="flag">Flag</label>
                                @error('flag')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="flag" class="form-control input-sm image">

                                <img src="{{ asset('uploads/countries/default.png') }}" width="100px"
                                     class="img-thumbnail image-preview mt-1" alt="Image Preview">
                            </div> {{-- end of form group image --}}

                        </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Add country</button>
                            </div>

                        </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection