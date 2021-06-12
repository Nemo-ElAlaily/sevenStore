@extends('layouts.admin.app')

@section('title', 'Dashboard' )

@section('content-header')
  <div class="col-sm-6">
    <h1>@lang('admin.dashboard')</h1>
  </div>
{{--  <div class="col-sm-6">--}}
{{--    <ol class="breadcrumb float-sm-right">--}}
{{--      <li class="breadcrumb-item"><a href="#">@lang('admin.dashboard')</a></li>--}}
{{--    </ol>--}}
{{--  </div>--}}
@endsection


@section('content')

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection
