@extends('layouts.admin.cuba')

@section('title', trans('site.Pages') )

@section('breadcrumb-title')
    <h5>{{ trans('site.Pages') }} <span class="small text-muted">{{ $pages->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Pages') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.products.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.pages.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> {{ trans('site.add') }}
                            {{ trans('site.Page') }}</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($pages->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('site.Page Title') }}</th>
                            <th>{{ trans('site.status') }}</th>
                            <th>{{ trans('site.Page URL') }}</th>
                            <th>{{ trans('site.Action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pages as $index => $page)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->getActive() }}</td>
                                <td>
                                    @if ($page->is_active == 1)
                                        <a href="{{ route('front.page.details', $page->slug) }}" target="_blank">{{ trans('site.Go To Page') }}</a>
                                    @endif
                                </td>
                                <td>
{{--                                    <a href="{{ route('admin.pages.show', $page->id) }}" class="btn btnShow  btn-sm"><i--}}
{{--                                            class="fa fa-eye fa-lg text-lg"></i></a>--}}
                                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btnEdit btn-sm"><i
                                            class="fa fa-edit fa-lg text-lg"></i></a>
                                    <form action="{{ route('admin.pages.destroy', $page->id) }}" method="post"
                                        style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="button" class="btn btnDelete show_confirm btn-sm"><i
                                                class="fa fa-trash fa-lg text-lg"></i></button>
                                    </form><!-- end of form -->
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                @else
                    <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
                @endif

            </table><!-- end of table -->

        </div><!-- end of box body -->

        <div class="container">
            {{ $pages->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
