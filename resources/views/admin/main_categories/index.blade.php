@extends('layouts.admin.app')

@section('title', 'Main Categories')

@section('content-header')
    <div class="col-sm-6">
        <h1>@lang('admin.products') <span class="small text-muted">{{ $main_categories->total() }}</span></h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        </ol>
    </div>

@endsection

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.main_categories.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Main Category</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.partials._session')
        @include('admin.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($main_categories->count() > 0)
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Product Image</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($main_categories as $index=>$main_catogory)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $main_catogory -> name }}</td>
                            <td><img src="{{ $main_catogory -> image_path }}" height="50"></td>
                            <td><a href="{{ route('admin.products.index', ['category' => $main_catogory -> id ]) }}">View Products</a></td>
                            <td>
                                <a href="{{ route('admin.main_categories.show', $main_catogory->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye fa-lg text-lg"></i></a>
                                <a href="{{ route('admin.main_categories.edit', $main_catogory->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit fa-lg text-lg"></i></a>
                                <form action="{{ route('admin.main_categories.destroy', $main_catogory->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btn-danger show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
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
            {{ $main_categories->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
