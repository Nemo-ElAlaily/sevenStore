@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.dashboard'))

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{ $orders_count }}</span>
        <span class="count-name">{{ trans('site.Order') }}</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="count-numbers">{{ $products_count }}</span>
        <span class="count-name">{{ trans('site.product') }}</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
        <span class="count-numbers">{{ $blog_count }}</span>
        <span class="count-name">{{ trans('site.Blog') }}</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{ $users_count }}</span>
        <span class="count-name">{{ trans('site.User') }}</span>
      </div>
    </div>
  </div>
</div>
@endsection


