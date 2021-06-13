@extends('layouts.admin.cuba')

@section('title', 'Create user')

@section('content-header')
    <div class="col-sm-6">
        <h1>Create user</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">users</a></li>
        </ol>
    </div>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

{{--                        @include('partials._errors')--}}
                <form class="col-12" action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                        <div class="row">
                            <div class="form-group col-sm-12 col-lg-6">
                                <label>First Name</label>
                                @error('first_name')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="text" name="first_name" class="form-control form-control-sm input-sm" value="{{ old('first_name') }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Last Name</label>
                                @error('last_name')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="text" name="last_name" class="form-control form-control-sm input-sm" value="{{ old('last_name') }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-12">
                                <label>E-Mail</label>
                                @error('email')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="email" name="email" class="form-control form-control-sm input-sm" value="{{ old('email') }}">
                            </div>

                            <div class="form-group col-sm-12 col-lg-6">
                                <label>Password</label>
                                @error('password')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="password" name="password" class="form-control form-control-sm input-sm">
                            </div>

                            <div class="form-group forms col-sm-12 col-lg-6">
                                <label>Password Confirmation</label>
                                @error('password.confirmed')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="password" name="password_confirmation" class="form-control form-control-sm input-sm">
                            </div>

                            <div class="form-group col-sm-12 col-lg-12">
                                <label>Avatar</label>
                                @error('avatar')
                                <span class="text-danger mx-1">{{ $message }}</span>
                                @enderror
                                <input type="file" name="avatar" class="form-control input-sm avatar">

                                <img src="{{ asset('public/uploads/users/default.png') }}" width="100px"
                                     class="img-thumbnail avatar-preview mt-1" alt="">
                            </div> {{-- end of form group avatar --}}

                            <div class="form-group col-sm-12 col-lg-12">

                                <div class="text-center m-b">
                                    <h3 class="m-b-0">User Role</h3>
                                </div>

                                @php
                                    $roles = ['admin','shop_manager','vendor','moderator'];
                                @endphp
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                    <tr style="text-transform: capitalize">
                                        @foreach( $roles as $role )
                                            <th class="text-center">{{ $role }}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr style="text-transform: capitalize">

                                            @foreach($roles as $role)
                                                <td>
                                                    <label for="role"></label>
                                                    <input class="" type="radio" name="role" value="{{ $role }}">
                                                </td>
                                            @endforeach

                                        </tr>


                                    </tbody>
                                </table> {{-- end of table --}}


                            </div> {{-- end of form group for roles --}}

                        </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    Add user</button>
                            </div>

                        </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
