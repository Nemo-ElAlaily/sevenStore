@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Countries'))

@section('breadcrumb-title')
    <h5>{{ trans('site.Countries') }} <span class="small text-muted">{{ $countries->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Countries') }}</li>
@stop


@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.countries.index') }}" method="get">

                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-5 d-flex justify-content-around">
                        <button type="submit" class="btn btn-pill btn-outline-primary btn-sm"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        @if (auth()->user()->hasPermission('countries_create'))
                            <a href="{{ route('admin.countries.create') }}" class="btn btn-pill btn-outline-secondary btn-sm"><i class="fa fa-plus"></i>
                                {{ trans('site.add') . ' ' . trans('site.Country') }}</a>
                        @else
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i>
                                 {{ trans('site.add') . ' ' . trans('site.Country') }}
                                </a>
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
                            <th>{{ trans('site.name') }}</th>
                            <th>{{ trans('site.Flag') }}</th>
                            @if (auth()->user()->hasPermission('countries_update', 'countries_delete'))
                                <th>{{ trans('site.Action') }}</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($countries as $index => $country)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $country->name }}</td>
                                <td><img src="{{ $country->flag_path }}" alt="{{ $country->name }}" width="50" />
                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('countries_update'))
                                        <a href="{{ route('admin.countries.edit', $country->id) }}"
                                            class="btn btn-pill btn-outline-light btn-xs txt-dark">
                                            <i class="fa fa-edit"></i> 
                                            {{-- {{ trans('site.edit') }} --}}
                                        </a>
                                        {{-- @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a> --}}
                                    @endif
                                    @if (auth()->user()->hasPermission('countries_delete'))
                                        <form action="{{ route('admin.countries.destroy', $country->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="button" class="btn btn-pill btn-outline-light btn-xs txt-dark"><i
                                                    class="fa fa-trash"></i>
                                                     {{-- {{ trans('site.delete') }} --}}
                                                </button>
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

            {{ $countries->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

    <div id="dialog-confirm"></div>

@endsection
