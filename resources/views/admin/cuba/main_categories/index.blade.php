 @extends('admin.cuba.layouts.app')

@section('title', trans('site.Categories') )

@section('breadcrumb-title')
    <h5>{{ trans('site.Categories') }} <span class="small text-muted">{{ $main_categories ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Categories') }}</li>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">

            <form action="{{ route('admin.main_categories.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4 p-0">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.main_categories.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i>
                            {{ trans('site.add') }} {{ trans('site.Category') }}</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

           <div class="container">
               <div class="row">


                @if ($main_categories->count() > 0)

                    @foreach ($main_categories as $index=>$main_catogory)
                        <div class="col-md-4">

                            <div class=" card-shadow">
                                <div class="card-group card-category">
                                    <div class="card">
                                      <img class="card-img-top img-category" src="{{ $main_catogory -> image_path }}" alt="{{ $main_catogory -> name }}">
                                      <div class="card-body p-2">
                                        <span class="badge name-category">{{ trans('site.name') }}:</span>
                                        <h5 class="card-title text-center">{{ $main_catogory -> name }}</h5>
                                        <p class="card-text"><span class="badge products-category">{{ trans('site.products') }}</span> <span class="badge badge-secondary"># {{ $index + 1 }}</span></p>
                                      </div>

                                      <div class="card-footer  p-2">

                                        <span class="actions badge">{{ trans('site.Action') }}</span>
                                        <div class="all-buttons-functions">
                                            <a href="{{ route('admin.main_categories.show', $main_catogory->id) }}" class="btn btnShow"><i class="fa fa-eye "></i></a>
                                            <a href="{{ route('admin.main_categories.edit', $main_catogory->id) }}" class="btn btnEdit"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.main_categories.destroy', $main_catogory->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="button" class="btn btnDelete show_confirm btn-sm"><i class="fa fa-trash"></i></button>
                                            </form><!-- end of form -->
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @else
                    <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
                @endif

            </div>
        </div>

        </div><!-- end of box body -->

        <div class="container">
            {{ $main_categories->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
