@extends('layouts.admin.cuba')

@section('title', 'Products')

@section('breadcrumb-title')
    <h5>Products <span class="small text-muted">{{ $products ->total() }}</span></h5>
@stop

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
@stop

@section('content')
    <div class="box box-primary">
        <div class="col-md-12">
            <img class="user-avatar" src="{{asset('admins/cuba/assets/images/productsAll.png')}}" alt="">
        </div>
        <div class="box-header with-border">

            <form action="{{ route('admin.products.index') }}" method="get">

                <div class="row mx-5">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search Here..." value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <label class="w-100">
                            <select name="category" class="form-control selectCat">
                                <option class="bg-ligh" value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option class="optionCat" value="{{ $category -> id }}" {{ request() -> category == $category -> id ? 'selected' : '' }}>{{ $category -> name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-md-4 p-0 buttonsProd">
                        <button type="submit" class="btn btnSearch"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.products.create') }}" class="btn btnAdd"><i class="fa fa-plus"></i> Add Product</a>
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        @include('admin.cuba.partials._session')
        @include('admin.cuba.partials._errors')

        <div class="box-body bg-white mx-5 mt-3">

            <table class="text-center pt-2 card-body table table-hover table-bordered">
                @if ($products->count() > 0)

              <div class="product-wrapper-grid">
                    <div class="row"> 
                    @foreach ($products as $index=>$product)
                    <div class="col-xl-3 col-sm-6 xl-3">
                        <div class="card">
                  <div class="product-box">
                     <div class="product-img">
                        <img class="img-fluid img-all-products" src="{{ $product -> image_path }}" alt="">
                        <div class="product-hover">
                           <ul>
  
                       
                              <li>
                              <a href="{{ route('admin.products.edit', $product->id) }}">
                                 <button class="btn" type="button"><i class="icon-pencil"></i></button>
                                 </a>
                              </li>

                              <li>
                              <a href="{{ route('admin.products.show', $product->id) }}">
                                 <button class="btn" type="button" data-bs-toggle="" data-bs-target="#exampleModalCenter">
                                 <i class="icon-eye"></i></button>
                                 </a>
                              </li>

                              <li>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="button" class="btn show_confirm btn-sm"><i class="fa fa-trash fa-lg text-lg"></i></button>
                        </form>  
                              </li>

                           </ul>
                        </div>
                     </div>
                     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <div class="product-box row">
                                    <div class="product-img col-lg-6"><img class="img-fluid img-all-products" src="{{ $product -> image_path }}" alt=""></div>
                                    <div class="product-details col-lg-6 text-start">
                                       <h4>Woman T-shirt</h4>
                                       <div class="product-price">$26.00
                                          <del>$350.00    </del>
                                       </div>
                                       <div class="product-view">
                                          <h6 class="f-w-600">Product Details</h6>
                                          <p class="mb-0">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo.</p>
                                       </div>
                                       <div class="product-size">
                                          <ul>
                                             <li> 
                                                <button class="btn btn-outline-light" type="button">M</button>
                                             </li>
                                             <li> 
                                                <button class="btn btn-outline-light" type="button">L</button>
                                             </li>
                                             <li> 
                                                <button class="btn btn-outline-light" type="button">Xl</button>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="product-qnty">
                                          <h6 class="f-w-600">Quantity</h6>
                                          <fieldset>
                                             <div class="input-group">
                                                <input class="touchspin text-center" type="text" value="5">
                                             </div>
                                          </fieldset>
                                          <div class="addcart-btn">
                                             <button class="btn btn-primary" type="button">Add to Cart</button>
                                             <button class="btn btn-primary" type="button">View Details</button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="product-details">
                        <span class="btn btn-warning"># {{ $index + 1 }}</span>
                        <p>Product Name </p><span class="bg-danger">{{ $product -> name }}</span>
                        <p>Product Vendor </p><span class="badge badge-primary">{{ $product -> vendor -> billing_full_name }}</span>
                    </div>
                  </div>
               </div>
            </div>
            @endforeach
               </div>
            </div>
                @else
                    <h2 class="mt-5 text-center pt-2">No Data Found</h2>
                @endif

            </table><!-- end of table -->

        </div><!-- end of box body -->

        <div class="container">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div><!-- end of box -->
@stop
