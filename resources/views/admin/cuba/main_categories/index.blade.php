@extends('layouts.admin.cuba')

@section('title', 'Categories')

@section('breadcrumb-title')
    <h5>Categories <span class="small text-muted">{{ $main_categories ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Categories</li>
@stop

@section('content')
    <div class="box box-primary">
        <div class="col-md-12">
            <img class="user-avatar" src="{{asset('admins/cuba/assets/images/category.png')}}" alt="">
        </div>
        <div class="box-header with-border">

            <form action="{{ route('admin.main_categories.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.main_categories.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add Category</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($main_categories->count() > 0)
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Products</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($main_categories as $index=>$main_catogory)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="nameCat">{{ $main_catogory -> name }}</td>
                            <td><a href="{{ route('admin.products.index', ['category' => $main_catogory -> id ]) }}" class=" btn btn-dark">View Products</a></td>
                            <td>
                                <a href="{{ route('admin.main_categories.show', $main_catogory->id) }}" class="btn btnShow"><i class="fa fa-eye fa-lg text-lg"></i></a>
                                <a href="{{ route('admin.main_categories.edit', $main_catogory->id) }}" class="btn btnEdit"><i class="fa fa-edit fa-lg text-lg"></i></a>
                                <form action="{{ route('admin.main_categories.destroy', $main_catogory->id) }}" method="post" style="display: inline-block">
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
            {{ $main_categories->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
