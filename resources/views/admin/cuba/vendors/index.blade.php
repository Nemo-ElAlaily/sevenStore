@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Vendors'))

@section('breadcrumb-title')
    <h5>{{ trans('site.Vendors') }} <span class="small text-muted">{{ $vendors->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Vendors') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.vendors.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        @if (auth()->user()->hasPermission('vendors_create'))
                            <a href="{{ route('admin.users.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.Vendor') }}</a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.Vendor') }}</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($vendors->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('site.name') }}</th>
                            <th>{{ trans('site.products') }}</th>
                            @if (auth()->user()->hasPermission('users_update', 'users_delete'))
                                <th>{{ trans('site.Action') }}</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($vendors as $index => $vendor)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $vendor->full_name }}</td>
                                <td>
                                    <a href="{{ route('admin.products.index', ['vendor_id' => $vendor->id]) }}"
                                        class="btn view-proud">
                                        <i class="fa fa-eye"></i>
                                        <span>{{ trans('site.View Products') }}</span>
                                        </a>
                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('users_update'))
                                        <a href="{{ route('admin.vendors.edit', $vendor->id) }}"
                                            class="btn btnEdit btn-sm"><i class="fa fa-edit"></i> {{ trans('site.edit') }}</a>
                                        {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                                    @endif
                                    @if (auth()->user()->hasPermission('users_delete'))
                                        <form action="{{ route('admin.vendors.destroy', $vendor->id) }}" method="post"
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

            {{ $vendors->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection
