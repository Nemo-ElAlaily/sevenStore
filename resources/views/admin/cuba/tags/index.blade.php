@extends('layouts.admin.cuba')

@section('title', 'Tags')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Tags</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.tags.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.tags.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add Tag</a>

                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')

        <div class="box-body bg-white mx-5 mt-3">

            <table data-vertable="ver3" class="table100 ver4 m-b-110">
                @if ($tags->count() > 0)
                <thead>
                <tr class="row100 head">
                    <th class="column100 column1">#</th>
                    <th class="column100 column2">Name</th>
                    <th class="column100 column3">Slug</th>
                    <th class="column100 column4">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($tags as $index=>$tag)
                    <tr class="row100">
                        <td class="column100 column1" data-column="column1">{{ $index + 1 }}</td>
                        <td class="column100 column2" data-column="column2">{{ $tag-> name }}</td>
                        <td class="column100 column3" data-column="column3">{{ $tag -> slug}}</td>
                        <td class="column100 column4" data-column="column4">
                            @if (auth()->user()->hasPermission('tags_update'))
                                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btnEdit btn-sm"><i class="fa fa-edit fa-lg text-lg"></i></a>
                            @endif
                            @if (auth()->user()->hasPermission('tags_delete'))
                                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btnDelete show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
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

            {{ $tags->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->

@endsection
