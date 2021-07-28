@extends('admin.cuba.layouts.cuba')

@section('title', trans('site.products') )

@section('breadcrumb-title')
    <h5>{{ trans('site.products') }} <span class="small text-muted">{{ $products->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.products') }}</li>
@stop

@section('content')
    <div class="box box-primary">

        <div class="box-header with-border">

            <form action="{{ route('admin.products.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="{{ trans('site.Search Here') }}..."
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <label class="w-100">
                            <select name="category" class="form-control selectCat">
                                <option class="bg-ligh" value="">{{ trans('site.all') . ' ' . trans('site.Categories') }}</option>
                                @foreach ($categories as $category)
                                    <option class="optionCat" value="{{ $category->id }}"
                                        {{ request()->category == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-4 p-0 buttonsProd">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> {{ trans('site.Search') }}</button>
                        <a href="{{ route('admin.products.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> {{ trans('site.add') . ' ' . trans('site.product') }}</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            @if ($products->count() > 0)
                <div class="col-md-6 products-total">
                    <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="#"
                            data-original-title="" title="" data-bs-original-title=""><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg></a></div>
                    <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="#"
                            data-original-title="" title="" data-bs-original-title=""><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-list">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3" y2="6"></line>
                                <line x1="3" y1="12" x2="3" y2="12"></line>
                                <line x1="3" y1="18" x2="3" y2="18"></line>
                            </svg></a></div>
                    <span class="d-none-productlist filter-toggle">
                        Filters<span class="ms-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-chevron-down toggle-data">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg></span></span>
                    <div class="grid-options d-inline-block">
                        <ul>
                            <li><a class="product-2-layout-view" href="#" data-original-title="" title=""
                                    data-bs-original-title=""><span class="line-grid line-grid-1 bg-primary"></span><span
                                        class="line-grid line-grid-2 bg-primary"></span></a></li>
                            <li><a class="product-3-layout-view" href="#" data-original-title="" title=""
                                    data-bs-original-title=""><span class="line-grid line-grid-3 bg-primary"></span><span
                                        class="line-grid line-grid-4 bg-primary"></span><span
                                        class="line-grid line-grid-5 bg-primary"></span></a></li>
                            <li><a class="product-4-layout-view" href="#" data-original-title="" title=""
                                    data-bs-original-title=""><span class="line-grid line-grid-6 bg-primary"></span><span
                                        class="line-grid line-grid-7 bg-primary"></span><span
                                        class="line-grid line-grid-8 bg-primary"></span><span
                                        class="line-grid line-grid-9 bg-primary"></span></a></li>
                            <li><a class="product-6-layout-view" href="#" data-original-title="" title=""
                                    data-bs-original-title=""><span class="line-grid line-grid-10 bg-primary"></span><span
                                        class="line-grid line-grid-11 bg-primary"></span><span
                                        class="line-grid line-grid-12 bg-primary"></span><span
                                        class="line-grid line-grid-13 bg-primary"></span><span
                                        class="line-grid line-grid-14 bg-primary"></span><span
                                        class="line-grid line-grid-15 bg-primary"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="product-wrapper-grid">
                    <div class="row">
                        @foreach ($products as $index => $product)
                            <div class="col-xl-3 col-sm-6 xl-3">
                                <div class="card">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <img class="img-fluid img-all-products" src="{{ $product->image_path }}"
                                                alt="">
                                            <div class="product-hover">
                                                <ul>

                                                    <li>
                                                        <a href="{{ route('admin.products.edit', $product->id) }}">
                                                            <button class="btn" type="button"><i
                                                                    class="icon-pencil"></i></button>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="{{ route('admin.products.show', $product->id) }}">
                                                            <button class="btn" type="button" data-bs-toggle=""
                                                                data-bs-target="#exampleModalCenter">
                                                                <i class="icon-eye"></i></button>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('admin.products.destroy', $product->id) }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button type="button" class="btn show_confirm btn-sm"><i
                                                                    class="fa fa-trash fa-lg text-lg"></i></button>
                                                        </form>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <span class="btn btn-warning"># {{ $index + 1 }}</span>
                                            <p>{{ trans('site.product name') }} </p><span class="bg-danger">{{ $product->name }}</span>
                                            <p>{{ trans('site.Product Vendor') }} </p><span
                                                class="badge badge-primary">{{ $product->vendor->full_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <h2 class="mt-5 text-center pt-2">{{ trans('site.No Data Found') }}</h2>
            @endif

        <div class="container">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
@section('script')
    <script src="{{ asset('admins/cuba/assets/js/range-slider/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/range-slider/rangeslider-script.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/touchspin/input-groups.min.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('admins/cuba/assets/js/product-tab.js') }}"></script>
@endsection
