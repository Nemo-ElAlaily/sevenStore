@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.User') . ' | ' . $user->full_name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Users') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 w-80 bg-white p-4 m-auto box-shadow border-radius mb-5">
                <div class="card-body">
                    <div class="row bg-user-child ">

                        <form class="col-12 form-user-create" action="{{ route('admin.users.update', $user->id) }}"
                            method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-center setting-general-title">
                                      User Data
                                    </h2>
                                </div>


<div class="row mt-5">
    <div class="col-md-6">
        <div class="form-group col-sm-12 col-md-12 mb-2">
            <label class="label-page after">{{ trans('site.First Name') }}</label>
            @error('first_name')
                <span class="text-danger mx-1">{{ $message }}</span>
            @enderror
            <input type="text" placeholder="First Name" name="first_name"
                class="form-control  form-control-solid"
                value="{{ $user->first_name }}">
        </div>

        <div class="form-group col-sm-12 col-md-12 mb-2">
            <label class="label-page after">{{ trans('site.Last Name') }}</label>
            @error('last_name')
                <span class="text-danger mx-1">{{ $message }}</span>
            @enderror
            <input type="text" placeholder="Last Name" name="last_name"
                class="form-control  form-control-solid"
                value="{{ $user->last_name }}">
        </div>

        <div class="form-group col-sm-12 col-md-12  mb-2">
            <label class="label-page after">{{ trans('site.E-Mail') }}</label>
            @error('email')
                <span class="text-danger mx-1">{{ $message }}</span>
            @enderror
            <input type="email" placeholder="E-Mail" name="email" class=" form-control form-control-solid"
                value="{{ $user->email }}">
        </div>

        <div class="col-md-12 text-center mt-5">
            <div class="form-group">
                <button type="submit" class="btn btn-square btn-outline-secondary btn-sm toastrDefaultSuccess"><i class="fa fa-edit"></i>
                    {{ trans('site.update') }}</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 m">
        <div class="form-group col-sm-12 col-md-12 mb-2">
            <label class="text-center setting-general-title">{{ trans('site.Avatar') }}</label>
            @error('avatar')
                <span class="text-danger mx-1">{{ $message }}</span>
            @enderror
            <input type="file" name="avatar" class="form-control input-sm avatar">
            <img src="{{ $user->avatar_path }}" width="100px" class="img-thumbnail avatar-preview mt-1"
                alt="">
        </div>

        <div class="form-group col-sm-12 col-md-12 mt-4">

            <div class="text-left">
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

                                <label class="labelProd" for="role"></label>
                                <input class="radio_animated" {{ $user->hasRole($role) ? 'checked' : '' }} class=""
                                    type="radio" name="role" value="{{ $role }}">
                            </td>
                        @endforeach

                    </tr>


                </tbody>
            </table> {{-- end of table --}}


        </div> {{-- end of form group for roles --}}

    </div>
</div>
                            </div>

                        </form><!-- end of form -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
