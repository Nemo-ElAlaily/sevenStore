@extends('layouts.admin.cuba')

@section('title', 'Currencies')

@section('breadcrumb-title')
    <h5>Currencies <span class="small text-muted">{{ $currencies ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Blogs</li>
@stop

@section('content')
    <div class="box box-primary">
        <div class="col-md-12">
            <img class="user-avatar" src="{{asset('admins/cuba/assets/images/exchange.png')}}" alt="">
        </div>
        <div class="box-header with-border">

            <form action="{{ route('admin.currencies.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        @if (auth()->user()->hasPermission('currencies_create'))
                            <a href="{{ route('admin.currencies.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add currency</a>
                             @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> Add currency</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($currencies->count() > 0)
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Symbol</th>
                    @if (auth()->user()->hasPermission('currencies_update','currencies_delete'))
                        <th>Action</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($currencies as $index=>$currency)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $currency -> name }}</td>
                        <td>{{ $currency -> symbol }}</td>
                        <td>
                            @if (auth()->user()->hasPermission('currencies_update'))
                                <a href="{{ route('admin.currencies.edit', $currency->id) }}" class="btn btnEdit btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                            @endif
                            @if (auth()->user()->hasPermission('currencies_delete'))
                                <form action="{{ route('admin.currencies.destroy', $currency->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btnDelete show_confirm btn-sm"><i class="fa fa-trash"></i> Delete</button>
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

            {{ $currencies->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection

@section('script')

@endsection
