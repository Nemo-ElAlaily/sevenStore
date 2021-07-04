@extends('layouts.admin.cuba')

@section('title', 'Blogs')

@section('breadcrumb-title')
    <h5>Blogs <span class="small text-muted">{{ $blogs ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Blogs</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.blogs.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Create Blog</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($blogs->count() > 0)
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Blog Title</th>
                        <th>Blog Author</th>
                        <th>Blog Image</th>
                        <th>Blog Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($blogs as $index => $blog)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $blog -> title }}</td>
                            <td>{{ $blog -> user -> full_name }}</td>
                            <td><img src="{{ $blog -> image_path }}" class="img-prod"></td>

                            <td>{{ $blog -> getActive() }}</td>

                            <td>
                                <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btnShow  btn-sm"><i class="fa fa-eye fa-lg text-lg"></i></a>
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btnEdit btn-sm"><i class="fa fa-edit fa-lg text-lg"></i></a>
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btnDelete show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
                                </form><!-- end of form -->
                            </td>
                        </tr>

                    @endforeach
                    </tbody>

                @else
                    <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                @endif

            </table><!-- end of table -->

        </div><!-- end of box body -->

        <div class="container">
            {{ $blogs->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
