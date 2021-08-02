 @extends('admin.cuba.layouts.cuba')

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
                        <button type="submit" class="btn btn-pill btn-outline-primary btn-sm"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.main_categories.create') }}" class="btn btn-pill btn-outline-secondary btn-sm"><i class="fa fa-plus"></i>
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

                <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($main_categories->count() > 0)
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('site.name') }}</th>
                        <th>{{ trans('site.slug') }}</th>
                        <th>{{ trans('site.Action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($main_categories as $index=>$main_catogory)
                    <tr>
                        <td><img class="avatar-user-all" src="{{ $main_catogory -> image_path }}" alt="{{ $main_catogory -> name }}"></td>
                        <td>{{ $main_catogory->name }}</td>
                        <td>{{ $main_catogory->slug }}</td>
                        <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('admin.main_categories.show', $main_catogory->id) }}" class="btn btn-pill btn-outline-light-2x txt-dark"><i class="fa fa-eye "></i></a>
                                            <a href="{{ route('admin.main_categories.edit', $main_catogory->id) }}" class="btn btn-pill btn-outline-light-2x txt-dark"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('admin.main_categories.destroy', $main_catogory->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="button" class="btn btn-pill btn-outline-light-2x txt-dark show_confirm btn-sm"><i class="fa fa-trash"></i></button>
                                            </form><!-- end of form -->
                                        </div>    
                    </td>
                </tr>
                    @endforeach
                </tbody>
                @else
                    <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
                @endif
            </table>
            </div>
        </div>

        </div><!-- end of box body -->

        {{-- <div class="container"> --}}
            {{ $main_categories->appends(request()->query())->links() }}
        {{-- </div> --}}
    </div><!-- end of box -->
@stop
