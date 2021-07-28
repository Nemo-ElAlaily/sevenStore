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

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control"
                            placeholder="{{ trans('site.Search Here') }}..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i>
                            {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i>
                            {{ trans('site.create') }} {{ trans('site.Blog') }}</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <!-- Start Blog -->

            @if ($blogs->count() > 0)
                <section class="blog section" id="blog">
                    <div class="container">
                        <div class="row">
                            @foreach ($blogs as $index => $blog)
                                <div class="col-xs-12 col-md-6 col-lg-4">
                                    <div class="blog-item padd-15">
                                        <div class="blog-item-inner shadow-dark">
                                            <div class="blog-img">
                                                <img src="{{ $blog->image_path }}" alt="Blog">
                                                <div class="blog-date">
                                                    {{ $index + 1 }}
                                                </div>
                                            </div>
                                            <div class="blog-info">
                                                <h4 class="blog-title">{{ $blog->user->full_name }}</h4>
                                                <p class="blog-description">{{ $blog->title }}</p>
                                                <p class="blog-tags">{{ trans('site.Blog Status') }} : <a href="#">
                                                        {{ trans('site.' . $blog->getActive()) }}</a></p>

                                                <div class="blog-btns-actions">
                                                    <a href="{{ route('admin.blogs.show', $blog->id) }}"
                                                        class="btn btnShow  btn-sm"><i
                                                            class="fa fa-eye fa-lg text-lg"></i></a>
                                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                        class="btn btnEdit btn-sm"><i
                                                            class="fa fa-edit fa-lg text-lg"></i></a>
                                                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                        method="post" style="display: inline-block">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="button" class="btn btnDelete show_confirm btn-sm"><i
                                                                class="fa fa-trash fa-lg text-lg"></i></button>
                                                    </form><!-- end of form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
            @endif

        </div><!-- end of box body -->

        <div class="container">
            {{ $blogs->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
