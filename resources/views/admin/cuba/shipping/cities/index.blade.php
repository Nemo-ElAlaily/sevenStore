@extends('layouts.admin.cuba')

@section('title', 'Cities')

@section('breadcrumb-title')
    <h5>Cities <span class="small text-muted">{{ $cities ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Cities</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.cities.index') }}" method="get">

                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('cities_create'))
                            <a href="{{ route('admin.cities.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add city</a>
                             @else
                                <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> Add city</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($cities->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Country</th>
                    @if (auth()->user()->hasPermission('cities_update','cities_delete'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($cities as $index=>$city)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $city -> name }}</td>
                        <td>{{ $city -> country -> name }}</td>
                        <td>
                            @if (auth()->user()->hasPermission('cities_update'))
                                <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btnEdit "><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('cities_delete'))
                                <form action="{{ route('admin.cities.destroy', $city->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btnDelete show_confirm "><i class="fa fa-trash"></i> Delete</button>
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

            {{ $cities->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

    <div id="dialog-confirm"></div>

@endsection
