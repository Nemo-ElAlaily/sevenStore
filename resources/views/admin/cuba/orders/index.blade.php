@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Orders') )

@section('breadcrumb-title')
    <h5>{{ trans('site.Orders') }} <span class="small text-muted">{{ $orders->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Orders') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.orders.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-6 mb-2">
                        <input type="text" name="search" class="form-control " placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-3 mb-2">
                        <label class="w-100">
                            <select class="form-select form-control-inverse" name="status" class="form-control">
                                <option value="">{{ trans('site.all') }} {{ trans('site.Orders') }}</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->status }}"
                                        {{ request()->status == $status->status ? 'selected' : '' }}>
                                        {{ $status->status }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-square btn-outline-primary btn-sm"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 mb-5 card-body table table-hover table-bordered">
                @if ($orders->count() > 0)
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('site.name') }}</th>
                        <th>{{ trans('site.status') }}</th>
                        <th>{{ trans('site.Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($orders as $index => $order)
                <tr>
                    <td class="text-dark">{{ $index + 1 }}</td>
                                        <td><a class="text-dark"
                                                href="#">{{ $order->user->full_name }}</a>
                                        </td>
                                   
                                    {{-- <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div> --}}

                                    
                                  <td>
                                    <a class="btn btn-square btn-outline-light btn-xs"
                                        href="#">{{ trans('site.' . $order->status ) }}</a>
                                  </td>
                                  <td>
                                    <div class="d-flex justify-content-around">
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="btn btn-square btn-light btn-sm"><i
                                        class="fa fa-eye"></i></a>
                                <form
                                    action="{{ route('admin.orders.destroy', $order->id) }}"
                                    method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button"
                                        class="btn btn-square btn-light btn-sm"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                @endforeach
            </tbody>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
                @endif

            </table>
                {{ $orders->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->
@stop
