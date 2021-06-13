@extends('layouts.admin.app')

@section('title', 'Orders | ' . $order -> slug)

@section('content-header')
    <div class="col-sm-6">
        <h1>{{ $order -> slug }} <span class="small text-muted"></span></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">@lang('admin.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">@lang('admin.orders')</a></li>
        </ol>
    </div>

@endsection

@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.adminlte.partials._errors')
                <form class="col-12">
                    <a href="#" class="btn btn-success mb-4">
                        <i class="fa fa-check fa-lg"></i> Mark as Completed
                    </a>

                    <div class="row">
                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label for="{{ $order -> name }}">Order # </label>
                                <input class="form-control input-thick" type="text" name="{{ $order -> slug }}"
                                       value="{{ $order -> slug }}" disabled>
                            </div>

                        </div>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
