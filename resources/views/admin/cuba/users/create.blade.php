@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Users') . ' | ' . trans('site.add'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Users') }}</li>
    <li class="breadcrumb-item">{{ trans('site.add') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card-solid ">
        <div class="card-body">
            <div class="row bg-user p-4">

                {{-- @include('partials._errors') --}}
                <form class="col-10 box-shadow m-auto bg-user-child py-4" action="{{ route('admin.users.store') }}" method="post"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('post') }}

                    <div class="row">

                        <div class="form-group col-sm-12 col-md-3 mb-3">
                            {{-- <label class="user-label">{{ trans('site.First Name') }}</label> --}}
                            @error('first_name')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" placeholder="First Name" name="first_name" class="form-control form-control-sm input-sm"
                                value="{{ old('first_name') }}">
                        </div>

                        <div class="form-group col-sm-12 col-md-3 mb-3">
                            {{-- <label class="user-label">{{ trans('site.Last Name') }}</label> --}}
                            @error('last_name')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" placeholder="Last Name" name="last_name" class="form-control form-control-sm input-sm"
                                value="{{ old('last_name') }}">
                        </div>

                        <div class="form-group col-sm-12 col-md-3 mb-3">
                            {{-- <label class="user-label">{{ trans('site.E-Mail') }}</label> --}}
                            @error('email')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="email" name="email" placeholder="E-Mail" class="form-control form-control-sm input-sm"
                                value="{{ old('email') }}">
                        </div>

                        <div class="form-group col-sm-12 col-md-3 mb-3">
                            {{-- <label class="user-label">{{ trans('site.Password') }}</label> --}}
                            @error('password')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Password" name="password" class="form-control form-control-sm input-sm">
                        </div>

                        <div class="form-group forms col-sm-12 my-2 col-md-6 mb-3">
                            {{-- <label class="user-label">{{ trans('site.Password Confirmation') }}</label> --}}
                            @error('password.confirmed')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                class="form-control form-control-sm input-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12  my-2 col-md-6">
                            <label class="text-center setting-general-title">{{ trans('site.Avatar') }}</label>
                            @error('avatar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="file" name="avatar" class="form-control input-sm avatar">

                            <img src="" width="100px"
                                class="img-thumbnail avatar-preview mt-1" alt="">
                        </div> {{-- end of form group avatar --}}

                        <div class="form-group col-sm-12 col-lg-6">

                            <div class="text-center m-b">
                                <h3 class="text-center setting-general-title">{{ trans('site.User Role') }}</h3>
                            </div>

                            @php
                                $roles = ['admin', 'shop_manager', 'vendor', 'moderator'];
                            @endphp
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                    <tr style="text-transform: capitalize">
                                        @foreach ($roles as $role)
                                            <th class="text-center">{{ $role }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="text-transform: capitalize">

                                        @foreach ($roles as $role)
                                            <td>
                                                <label for="role"></label>
                                                <input class="radio_animated" type="radio" name="role" value="{{ $role }}">
                                            </td>
                                        @endforeach

                                    </tr>


                                </tbody>
                            </table> {{-- end of table --}}


                        </div> {{-- end of form group for roles --}}

                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2 text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btnAdd"><i class="fa fa-plus"></i>
                                    {{ trans('site.add') . ' ' . trans('site.User') }}</button>
                            </div>
                        </div>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
