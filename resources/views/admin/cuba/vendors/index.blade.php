@extends('layouts.admin.cuba')

@section('title', 'Vendor')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Vendors</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.vendors.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('vendors_create'))
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add user</a>
                             @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add user</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.adminlte.partials._session')
        @include('admin.adminlte.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($vendors->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Products</th>
                    @if (auth()->user()->hasPermission('users_update','users_delete'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($vendors as $index=>$vendor)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $vendor -> full_name }}</td>
                        <td>
                            <a href="{{ route('admin.products.index', ['vendor_id' => $vendor->id ]) }}" class="btn btn-primary btn-sm text-white"><i class="fa fa-eye"></i> View Products</a>
                        </td>
                        <td>
                            @if (auth()->user()->hasPermission('users_update'))
                                <a href="{{ route('admin.vendors.edit', $vendor->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('users_delete'))
                                <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btn-danger show_confirm btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                </form><!-- end of form -->
                                {{-- @else
                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button> --}}
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>

            @else
                <h2 class="mt-5 text-center pt-2">No Data Found</h2>
            @endif

            </table><!-- end of table -->

            {{ $vendors->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection
