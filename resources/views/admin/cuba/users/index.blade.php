@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Users'))

@section('breadcrumb-title')
    <h5>{{ trans('site.Users') }} <span class="small text-muted">{{ $users->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Users') }}</li>
@stop

@section('content')
    <div class="box box-primary  bg-white box-shadow border-radius mb-5 py-5">

        <div class="box-header with-border">

            <form action="{{ route('admin.users.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-2">
                        <label class="w-100">
                            <select class="form-select form-control-secondary" name="role" class="form-control">
                                <option value="">{{ trans('site.All Roles') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ request()->role == $role->name ? 'selected' : '' }}>
                                        {{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        @if (auth()->user()->hasPermission('users_create'))
                            <a href="{{ route('admin.users.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.User') }}</a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.User') }}</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">

            @if ($users->count() > 0)

                @if (auth()->user()->hasPermission('users_update', 'users_delete'))

                @endif
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('site.FullName') }}</th>
                        <th>{{ trans('site.E-Mail') }}</th>
                        <th>{{ trans('site.Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                        @foreach ($users as $index => $user)
         
                        <tr>
                            <td><img class="avatar-user-all" src="{{ $user->avatar }}" alt=""></td>
                            <td> {{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @if (auth()->user()->hasPermission('users_update'))
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="btn btnEdit btn-sm"><i class="fa fa-edit"></i> {{ trans('site.edit') }}</a>
                        {{-- @else
                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                        @endif
                        @if (auth()->user()->hasPermission('users_delete'))
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post"
                        style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="button" class="btn btnDelete show_confirm btn-sm"><i
                                class="fa fa-trash"></i> {{ trans('site.delete') }}</button>
                        </form><!-- end of form -->
                        {{-- @else
                        <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button> --}}
                        @endif
                        </td>
                </tr>


                        @endforeach
                    </tbody>
            @else
                <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
            @endif

        </table><!-- end of table -->

    </div>
            {{ $users->appends(request()->query())->links() }}




    </div><!-- end of box -->

@endsection
