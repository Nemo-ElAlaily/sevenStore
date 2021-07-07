@extends('layouts.admin.cuba')

@section('title', 'Pages')

@section('breadcrumb-title')
<h5>Products <span class="small text-muted">{{ $pages ->total() }}</span></h5>
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

                <div class="col-md-4 p-0">
                    <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                    <a href="{{ route('admin.pages.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add Page</a>
                </div>

            </div>
        </form><!-- end of form -->

    </div><!-- end of box header -->

    @include('admin.cuba.partials._session')
    @include('admin.cuba.partials._errors')

    <div class="box-body bg-white mx-5 mt-3">

        <div class="container">
            <div class="row mt-5">
        @if ($pages->count() > 0)
          
        
            @foreach ($pages as $index=>$page)
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="page-home">
                    <span class="page-index">#{{ $index + 1 }}</span>
                    <span class="page-status"> {{ $page-> getActive() }}</span>
                    <span class="page-home-title my-3"> {{ $page -> title }}</span>

                    <div class="page-home-input">

                    @if($page -> is_active == 1)
                        <a class="view" href="{{ route('front.page.details' , $page -> slug) }}" target="_blank">View in Browser</a>
                    @endif
          
                    <a href="{{ route('admin.pages.show', $page->id) }}" class="btn btnShow  btn-sm"><i class="fa fa-eye fa-lg text-lg"></i></a>
                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btnEdit btn-sm"><i class="fa fa-edit fa-lg text-lg"></i></a>
                    <form action="{{ route('admin.pages.destroy', $page->id) }}" method="post" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="button" class="btn btnDelete show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
                    </form><!-- end of form -->
                </div>
                </div>
                </div>
      
         
            @endforeach
        </div>
    </div>
            @else
            <h2 class="mt-5 text-center pt-2">No Data Found</h2>
            @endif


    </div><!-- end of box body -->

    <div class="container">
        {{ $pages->appends(request()->query())->links() }}
    </div>
</div><!-- end of box -->
@stop
