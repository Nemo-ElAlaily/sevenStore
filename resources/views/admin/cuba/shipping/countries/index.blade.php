@extends('layouts.admin.cuba')

@section('title', 'Countries')

@section('breadcrumb-title')
    <h5>Countries <span class="small text-muted">{{ $countries ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Countries</li>
@stop


@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.countries.index') }}" method="get">

                <div class="row">
        <div class="col-md-12">
            <img class="user-avatar" src="{{asset('admins/cuba/assets/images/country.png')}}" alt="">
        </div>
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('countries_create'))
                            <a href="{{ route('admin.countries.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add Country</a>
                             @else
                                <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> Add Country</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')
        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($countries->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Flag</th>
                    @if (auth()->user()->hasPermission('countries_update','countries_delete'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($countries as $index=>$country)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $country -> name }}</td>
                        <td><img src="{{ $country -> flag_path }}" alt="{{ $country -> name }}" width="50"/></td>
                        <td>
                            @if (auth()->user()->hasPermission('countries_update'))
                                <a href="{{ route('admin.countries.edit', $country->id) }}" class="btn btnEdit btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('countries_delete'))
                                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btnDelete show_confirm btn-sm"><i class="fa fa-trash"></i> Delete</button>
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

            {{ $countries->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

    <div id="dialog-confirm"></div>

@endsection
