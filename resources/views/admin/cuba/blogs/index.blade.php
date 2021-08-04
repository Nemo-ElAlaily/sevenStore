@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.Blogs'))

@section('breadcrumb-title')
    <h5>Blogs <span class="small text-muted">{{ $blogs->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Blogs') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.blogs.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control"
                            placeholder="{{ trans('site.Search Here') }}..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-6 p-0">
                        <button type="submit" class="btn btn-square btn-outline-primary btn-sm"><i class="fa fa-search"></i>
                            {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-square btn-outline-secondary btn-sm"><i class="fa fa-plus"></i>
                            {{ trans('site.create') }} {{ trans('site.Blog') }}</a>
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
                    <th>{{ trans('site.FullName') }}</th>
                    <th>{{ trans('site.description') }}</th>
                    <th>{{ trans('site.Blog Status') }}</th>
                    <th>{{ trans('site.Action') }}</th>
                </tr>
            </thead>

            <tbody>
                            @foreach ($blogs as $index => $blog)
                            <tr>
                                
                                <td><img class="avatar-user-all" src="{{ $blog->image_path }}" alt="Blog"></td>
                                <td class="user-td-name"> {{ $blog->user->full_name }}</td>
                            <td class="user-td-title">{{ $blog->title }}</td>
                                <td class="user-td-links" ><a href="#">{{ trans('site.' . $blog->getActive()) }}</a>
                                </td>

                                <td class="user-td-btns">
                                    <a href="{{ route('admin.blogs.show', $blog->id) }}"
                                        class="btn btn-pill btn-outline-light-2x txt-dark  btn-sm"><i
                                            class="fa fa-eye fa-lg text-lg"></i></a>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                        class="btn btn-pill btn-outline-light-2x txt-dark btn-sm"><i
                                            class="fa fa-edit fa-lg text-lg"></i></a>
                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                        method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="button" class="btn btn-pill btn-outline-light-2x txt-dark show_confirm btn-sm"><i
                                                class="fa fa-trash fa-lg text-lg"></i></button>
                                    </form><!-- end of form -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
            @else
                <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
            @endif
        </table>
        </div><!-- end of box body -->

        <div class="container">
            {{ $blogs->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
