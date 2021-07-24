@extends('layouts.admin.cuba')

@section('title', trans('site.Vendors') . ' | ' . trans('site.add'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Vendors') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

                {{-- @include('partials._errors') --}}
                <form class="col-12" action="{{ route('admin.users.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label>{{ trans('site.First Name') }}</label>
                            @error('first_name')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="first_name" class="form-control form-control-sm input-sm"
                                value="{{ old('first_name') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>{{ trans('site.Last Name') }}</label>
                            @error('last_name')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="last_name" class="form-control form-control-sm input-sm"
                                value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>{{ trans('site.E-Mail') }}</label>
                            @error('email')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="email" name="email" class="form-control form-control-sm input-sm"
                                value="{{ old('email') }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>{{ trans('site.Password') }}</label>
                            @error('password')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="password" name="password" class="form-control form-control-sm input-sm">
                        </div>

                        <div class="form-group forms col-sm-12 col-lg-6">
                            <label>{{ trans('site.Password Confirmation') }}</label>
                            @error('password.confirmed')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="password" name="password_confirmation"
                                class="form-control form-control-sm input-sm">
                        </div>

                        <div class="form-group col-sm-12 col-lg-12">
                            <label>{{ trans('site.Avatar') }}</label>
                            @error('avatar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="avatar" class="form-control input-sm avatar">

                            <img src="{{ asset('public/uploads/users/default.png') }}" width="100px"
                                class="img-thumbnail avatar-preview mt-1" alt="">
                        </div> {{-- end of form group avatar --}}

                        <div class="form-group col-sm-12 col-lg-12">

                            <div class="text-center m-b">
                                <h3 class="m-b-0">{{ trans('site.User Role') }}</h3>
                            </div>

                        </div> {{-- end of form group for roles --}}

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            {{ trans('site.add') . ' ' . trans('site.Vendor') }}</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
