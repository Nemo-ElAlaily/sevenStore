@extends('layouts.admin.cuba')

@section('title', 'Categories')

@section('breadcrumb-title')
    <h5>Categories <span class="small text-muted">{{ $main_categories ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Categories</li>
@stop

@section('content')

@stop
