@extends('layouts.admin.cuba')

@section('title', trans('site.Currencies') . ' | ' . trans('site.Create'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Currencies') }}</li>
    <li class="breadcrumb-item">{{ trans('site.create') }}</li>
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
                                <label class="currencyLabel">{{ trans('site.name') }} @lang('site.' . $locale . '.in
                                    name')</label>
                                @error($locale . '.in name')
                                    <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <input class="form-control input-thick" type="text" name="{{ $locale }}[name]"
                                    value="{{ old($locale . '.name') }}">
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label class="currencyLabel">{{ trans('site.currency Symbol') }}</label>
                            @error('symbol')
                                <span class="text-danger mx-5">{{ $message }}</span>
                            @enderror
                            <input class="form-control input-thick" type="text" name="symbol"
                                value="{{ old('symbol') }}">

                        </div>
                        <span class="currencySpan">{{ trans('site.Starts with') }} <mark>"&"</mark>,
                            {{ trans('site.check') }} <a target="_blank"
                                href="https://www.toptal.com/designers/htmlarrows/currency/">{{ trans('site.This link for more information') }}</a>
                        </span>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                            {{ trans('site.add') }} {{ trans('site.Currency') }}</button>
                    </div>
                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
