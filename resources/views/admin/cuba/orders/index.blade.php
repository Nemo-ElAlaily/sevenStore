@extends('layouts.admin.cuba')

@section('title', 'Orders')

@section('breadcrumb-title')
    <h5>Orders <span class="small text-muted">{{ $orders ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Orders</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.orders.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control " placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-2">
                        <label class="w-100">
                            <select class="select-css" name="status" class="form-control">
                                <option value="">All Statuses</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status -> status }}" {{ request() -> status == $status-> status ? 'selected' : '' }}>{{ $status -> status }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-2 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($orders->count() > 0)
        <div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                    @foreach ($orders as $index=>$order)
                <div class="col-xxl-4 col-md-6">
                     <div class="prooduct-details-box">
                        <div class="media">
                           <div class="media-body ms-3">
                              <div class="product-name">
                                 <h6>Name: <a href="#">{{ $order -> user -> full_name }}</a></h6>
                              </div>
                              {{-- <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div> --}}
                             
                              <div class="avaiabilty">
                                 <div class="text-success">#{{ $index + 1 }}</div>
                              </div>
                            <a class="btn btn-primary btn-xs" href="#">{{ $order -> status }}</a>
                           </div>
                        </div>
                         <div class="order-list-buttons">
                             <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btnShow btn-sm"><i class="fa fa-eye fa-lg text-lg"></i></a>    
                                                                      <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" class="btn btnDelete  show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
                                </form><!-- end of form -->
                        </div>
                    </div>
                        
                  </div>          

                    @endforeach
</div>
</div>
                           </div>
                        </div>
                     </div>
                  </div>       
                @else
                    <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                @endif


            {{ $orders->appends(request()->query())->links() }}

        </div><!-- end of box body -->


    </div><!-- end of box -->
@stop
