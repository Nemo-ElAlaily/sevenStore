@extends('layouts.admin.cuba')

@section('title', 'Currency | ' . $currency -> name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Currencies</li>
    <li class="breadcrumb-item">Edit</li>
@stop


@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                @include('admin.cuba.partials._errors')

                <form class="col-12" action="{{ route('admin.currencies.update', $currency -> id) }}" method="post">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    @foreach (config('translatable.locales') as $locale)
                        <div class="row">
                            <div class="form-group col-sm-12 col-lg-6">
                                <label  class="currencyLabel">currency Name in @lang('site.' . $locale . '.name')</label>
                                @error($locale . '.name')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                       value="{{ $currency->translate($locale)-> name }}">
                            </div>

                        </div>

                    @endforeach

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label class="currencyLabel">currency Symbol</label>
                            @error('symbol')
                            <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="symbol"
                                   value="{{ $currency -> symbol }}">
                        </div>
                            <span class="currencySpan">Starts with <mark>"#"</mark>, check <a target="_blank" href="https://www.toptal.com/designers/htmlarrows/currency/">This link for more information</a> </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btnEdit"><i class="fa fa-plus"></i>
                            Edit currency</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
