@extends('layouts.admin.cuba')

@section('title', 'Orders | ' . $order -> name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Orders</li>
    <li class="breadcrumb-item">Edit</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                @include('admin.adminlte.partials._errors')
                <form class="col-12">
                    <a href="{{ route('admin.products.edit', $order->id) }}" class="btn btn-success mb-4">
                        <i class="fa fa-edit fa-lg"></i> Edit This Product
                    </a>

                    <div class="row">
                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label for="{{ $order -> name }}">Order # </label>
                                <input class="form-control input-thick" type="text" name="{{ $order -> slug }}"
                                       value="{{ $order -> slug }}"x>
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
