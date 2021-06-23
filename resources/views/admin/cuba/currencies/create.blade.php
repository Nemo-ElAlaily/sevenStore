@extends('layouts.admin.cuba')

@section('title', 'Currencies | Create')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Currencies</li>
    <li class="breadcrumb-item">Create</li>
@stop


@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                <form class="col-12" action="{{ route('admin.currencies.store') }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    @foreach (config('translatable.locales') as $locale)
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>currency Name in @lang('site.' . $locale . '.name')</label>
                            @error($locale . '.name')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                   value="{{ old($locale.'.name') }}">
                        </div>
                    </div>
                    @endforeach

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>currency Symbol</label>
                            @error('symbol')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="symbol"
                                   value="{{ old('symbol') }}">
                            <small>Starts with "#", check <a target="_blank" href="https://www.toptal.com/designers/htmlarrows/currency/">This link for more information</a> </small>
                        </div>
                    </div>


                    <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Add currency</button>
                        </div>
                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
