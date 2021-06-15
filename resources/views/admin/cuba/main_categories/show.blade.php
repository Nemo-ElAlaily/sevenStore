@extends('layouts.admin.cuba')

@section('title', 'Product | ' . $main_category -> name)

@section('content-header')
    <div class="col-sm-6">
        <h1>{{ $main_category -> name }} <span class="small text-muted"></span></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">@lang('admin.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">@lang('admin.products')</a></li>
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
                    <a href="{{ route('admin.main_categories.edit', $main_category->id) }}" class="btn btn-received  mb-4">
                        <i class="fa fa-edit fa-lg"></i> Edit This Categories
                    </a>

                    <div class="row">
                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label class="bg-warning my-2 p-2" for="{{ $main_category -> name }}">Categories Name</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $main_category -> name }}"
                                       value="{{ $main_category -> name }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label class="bg-warning my-2 p-2" for="{{ $main_category -> slug  }}">Slug</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $main_category -> slug  }}"
                                       value="{{ $main_category -> slug }}">
                            </div>



                            <div class="form-group col-sm-12 col-lg-12">
                                <label class="bg-warning my-2 p-2">Categories Image</label>
                                <img src="{{ $main_category -> image_path }}" width="300"
                                     class="img-thumbnail image-preview m-1 img-fluid d-block m-auto" alt="{{ $main_category -> name }}">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
