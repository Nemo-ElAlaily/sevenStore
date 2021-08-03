@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Tags') )

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Tags') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.tags.index') }}" method="get">

                <div class="row">

                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-square btn-outline-primary btn-sm"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-square btn-outline-secondary btn-sm"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.Tag') }}</a>

                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')

        <div class="box-body bg-white mx-5 my-4">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($tags->count() > 0)
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('site.name') }}</th>
                            <th>{{ trans('site.slug') }}</th>
                            <th>{{ trans('site.Action') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tags as $index => $tag)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('tags_update'))
                                        <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-square btn-outline-light btn-sm txt-dark"><i
                                                class="fa fa-edit fa-lg text-lg"></i></a>
                                    @endif
                                    @if (auth()->user()->hasPermission('tags_delete'))
                                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post"
                                            style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="button" class="btn btn-square btn-outline-light btn-sm txt-dark"><i
                                                    class="fa fa-trash fa-lg text-lg"></i></button>
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

            {{ $tags->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection
