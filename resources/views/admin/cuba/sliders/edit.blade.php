@extends('admin.cuba.layouts.cuba')

@section('title', $slider->title)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.sliders') }}</li>
    <li class="breadcrumb-item">{{ trans('site.edit') }}</li>
@stop

@section('content')

@endsection
