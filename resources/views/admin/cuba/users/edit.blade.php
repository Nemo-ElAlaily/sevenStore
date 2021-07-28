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
            <div class="col-md-10 m-auto">
                <div class="card-body">
                    <div class="row add-create-blog">

                        <form class="col-12 form-user-create" action="{{ route('admin.users.update', $user->id) }}"
                            method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="labelProd">{{ trans('site.First Name') }}</label>
                                    @error('first_name')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="first_name"
                                        class="form-control input-blog-create form-control-sm input-sm"
                                        value="{{ $user->first_name }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="labelProd">{{ trans('site.Last Name') }}</label>
                                    @error('last_name')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="text" name="last_name"
                                        class="form-control input-blog-create form-control-sm input-sm"
                                        value="{{ $user->last_name }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6">
                                    <label class="labelProd">{{ trans('site.E-Mail') }}</label>
                                    @error('email')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="email" name="email" class="input-blog-create form-control form-control-sm input-sm"
                                        value="{{ $user->email }}">
                                </div>

                                <div class="form-group col-sm-12 col-md-6  text-center m-auto">
                                    <label class="labelProd">{{ trans('site.Avatar') }}</label>
                                    @error('avatar')
                                        <span class="text-danger mx-1">{{ $message }}</span>
                                    @enderror
                                    <input type="file" name="avatar" class="form-control input-sm avatar">
                                    <img src="{{ $user->avatar_path }}" width="100px" class="img-thumbnail avatar-preview mt-1"
                                        alt="">
                                </div>

                                <div class="form-group col-sm-12 col-lg-12 mb-5">

                                    <div class="text-center m-b">
                                        <h3 class="m-b-0">{{ trans('site.User Role') }}</h3>
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

                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary toastrDefaultSuccess"><i class="fa fa-edit"></i>
                                    {{ trans('site.update') }}</button>
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
