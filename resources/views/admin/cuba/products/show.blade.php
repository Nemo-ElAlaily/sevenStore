@extends('layouts.admin.cuba')

@section('title', 'Product | ' . $product -> name)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Show</li>
@stop

@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <img class="user-avatar" src="{{asset('admins/cuba/assets/images/prodedit.png')}}" alt="">
                </div>
                @include('admin.cuba.partials._errors')
                <form class="col-12">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btnEdit mb-4">
                        <i class="fa fa-edit fa-lg"></i> Edit This Product
                    </a>

                    <div class="row">

                        <div class="col-sm-12 row">
                            <div class="form-group col-lg-6">
                                <label for="{{ $product -> name }}">Product Name</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $product -> name }}"
                                       value="{{ $product -> name }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="product_stock">Stock
                                    @if ($product -> stock == 0)
                                        <span class="right badge badge-danger">Out Of Stock</span>
                                    @elseif ($product -> stock > 0 && $product -> stock < 5)
                                        <span class="right badge badge-primary">Low Stock</span>
                                    @else
                                        <span class="right badge badge-success">Available</span>
                                    @endif
                                </label>
                                <input disabled class="form-control input-thick" type="text" name="product_stock"
                                       value="{{ $product -> stock }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="{{ $product -> slug  }}">Slug</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $product -> slug  }}"
                                       value="{{ $product -> slug }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="{{ $product -> regular_price  }}">Regular Price</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $product -> regular_price  }}"
                                       value="{{ $product -> regular_price }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="{{ $product -> sku  }}">Sku</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $product -> sku  }}"
                                       value="{{ $product -> sku }}">
                            </div>


                            <div class="form-group col-lg-6">
                                <label for="{{ $product -> sale_price  }}">Sale Price</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $product -> sale_price  }}"
                                       value="{{ $product -> sale_price }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="{{ $product -> mainCategory -> name  }}">Category Name</label>
                                <input disabled class="form-control input-thick" type="text" name="{{ $product -> mainCategory -> name  }}"
                                       value="{{ $product -> mainCategory -> name }}">
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="{{ $product -> description  }}">Product Description</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick ckeditor textareaBlog" type="text" name="description">
                                        {{ $product -> description  }}
                                </textarea>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="{{ $product -> features  }}">Product Features</label>
                                @error('description')
                                <span class="text-danger mx-5">{{ $message }}</span>
                                @enderror
                                <textarea class="form-control input-thick ckeditor textareaBlog" type="text" name="features">
                                        {{ $product -> features  }}
                                </textarea>
                            </div>

                            <div class="form-group col-sm-12 col-lg-12">
                                <label>Product Image</label>
                                <img src="{{ $product -> image_path }}" width="300"
                                     class="img-thumbnail image-preview m-1" alt="{{ $product -> name }}">
                            </div> {{-- end of form group image --}}

                        </div>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
