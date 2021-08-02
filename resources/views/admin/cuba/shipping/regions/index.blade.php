@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Regions'))

@section('breadcrumb-title')
    <h5>{{ trans('site.Regions') }} <span class="small text-muted">{{ $regions->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Regions') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.regions.index') }}" method="get">

                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-5 d-flex justify-content-around">
                        <button type="submit" class="btn btn-square btn-outline-primary">
                            <i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        @if (auth()->user()->hasPermission('regions_create'))
                            <a href="{{ route('admin.regions.create') }}" class="btn btn-square btn-outline-secondary"><i class="fa fa-plus"></i>
                                {{ trans('site.add') . ' ' . trans('site.Region') }}</a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.Region') }}</a>
                        @endif
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($regions->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('site.name') }}</th>
                            <th>{{ trans('site.City') }}</th>
                            @if (auth()->user()->hasPermission('regions_update', 'regions_delete'))
                                <th>{{ trans('site.Action') }}</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($regions as $index => $region)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $region->name }}</td>
                                <td>{{ $region->city->name }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('regions_update'))
                                        <a href="{{ route('admin.regions.edit', $region->id) }}" class="btn btn-square btn-outline-light txt-dark"><i
                                                class="fa fa-edit"></i> {{ trans('site.edit') }}</a>
                                        {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                                    @endif
                                    @if (auth()->user()->hasPermission('regions_delete'))
                                        <form action="{{ route('admin.regions.destroy', $region->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="button" class="btn btn-square btn-outline-light txt-dark show_confirm btn-sm"><i
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

            {{ $regions->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

    <div id="dialog-confirm"></div>

@endsection
