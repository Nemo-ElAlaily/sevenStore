@extends('layouts.admin.cuba')

@section('title', 'Orders')

@section('breadcrumb-title')
    <h5>Orders <span class="small text-muted">{{ $orders ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Orders</li>
@stop

@section('content')
    <div class="box box-primary">
        <div class="col-md-12">
            <img class="user-avatar" src="{{asset('admins/cuba/assets/images/orders.png')}}" alt="">
        </div>
        <div class="box-header with-border">

            <form action="{{ route('admin.orders.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control " placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-2">
                        <label class="w-100">
                            <select class="select-css" name="status" class="form-control">
                                <option value="">All Statuses</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status -> status }}" {{ request() -> status == $status-> status ? 'selected' : '' }}>{{ $status -> status }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-2 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($orders->count() > 0)
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($orders as $index=>$order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order -> user -> full_name }}</td>
                            <td>{{ $order -> status }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btnShow btn-sm"><i class="fa fa-eye fa-lg text-lg"></i></a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btnDelete  show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
                                </form><!-- end of form -->
                            </td>
                        </tr>

                    @endforeach
                    </tbody>

                @else
                    <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                @endif

            </table><!-- end of table -->

            {{ $orders->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->
@stop
