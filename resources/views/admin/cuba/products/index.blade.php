@extends('layouts.admin.cuba')

@section('title', 'Products')

@section('breadcrumb-title')
    <h5>Products <span class="small text-muted">{{ $products ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.products.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-2">
                        <label class="w-100">
                            <select name="category" class="form-control">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category -> id }}" {{ request() -> category == $category -> id ? 'selected' : '' }}>{{ $category -> name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.adminlte.partials._session')
        @include('admin.adminlte.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($products->count() > 0)
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Vendor</th>
                        <th>Product Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($products as $index=>$product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product -> name }}</td>
                            <td>{{ $product -> vendor -> billing_full_name }}</td>
                            <td><img src="{{ $product -> image_path }}" height="50"></td>
                            <td>
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye fa-lg text-lg"></i></a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit fa-lg text-lg"></i></a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" style="display: inline-block">
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
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
