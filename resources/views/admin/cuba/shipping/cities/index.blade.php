@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Cities') )

@section('breadcrumb-title')
    <h5>{{ trans('site.Cities') }} <span class="small text-muted">{{ $cities->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Cities') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.cities.index') }}" method="get">

                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-5 d-flex justify-content-around">
                        <button type="submit" class="btn btn-square btn-outline-primary"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        @if (auth()->user()->hasPermission('cities_create'))
                            <a href="{{ route('admin.cities.create') }}" class="btn btn-square btn-outline-secondary"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.City') }}</a>
                        @else
                            <a href="#" class="btn btn-p`rimary disabled"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.City') }}</a>
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
                            <th>{{ trans('site.name') }}</th>
                            <th>{{ trans('site.Country') }}</th>
                            @if (auth()->user()->hasPermission('cities_update', 'cities_delete'))
                                <th>{{ trans('site.Action') }}</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cities as $index => $city)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->country->name }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('cities_update'))
                                        <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-pill btn-outline-light-2x txt-dark "><i
                                                class="fa fa-edit"></i> {{ trans('site.edit') }}</a>
                                        {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                                    @endif
                                    @if (auth()->user()->hasPermission('cities_delete'))
                                        <form action="{{ route('admin.cities.destroy', $city->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="button" class="btn btn-pill btn-outline-light-2x txt-dark show_confirm "><i
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

            {{ $cities->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

    <div id="dialog-confirm"></div>

@endsection
