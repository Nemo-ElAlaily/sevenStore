@extends('layouts.admin.cuba')

@section('title', 'Edit Vendor')

@section('breadcrumb-items')
    <li class="breadcrumb-item">Vendors</li>
    <li class="breadcrumb-item">Edit</li>
@stop

@section('content')

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            @include('admin.cuba.partials._session')
            @include('admin.cuba.partials._errors')
            <div class="row">

                <form class="col-12" action="{{ route('admin.vendors.update', $vendor -> id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="row">

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing First Name</label>
                            @error('billing_first_name')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_first_name" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_first_name }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing Last Name</label>
                            @error('billing_last_name')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_last_name" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_last_name }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing Company</label>
                            @error('billing_last_name')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_last_name" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_last_name }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing Address - 1</label>
                            @error('billing_address_1')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_address_1" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_address_1 }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing Address - 2</label>
                            @error('billing_address_2')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_address_2" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_address_2 }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing City</label>
                            @error('billing_city')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_city" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_city }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing Country</label>
                            @error('billing_country')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_country" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_country }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing Country</label>
                            @error('billing_phone')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_phone" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_phone }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Billing E-mail</label>
                            @error('billing_email')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="billing_email" class="form-control form-control-sm input-sm" value="{{ $vendor -> billing_email }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label>Admin Percentage</label>
                            @error('admin_percentage')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                            <input type="text" name="admin_percentage" class="form-control form-control-sm input-sm" value="{{ $vendor -> admin_percentage }}">
                        </div>

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="can_sell_products" name="can_sell_products" @if($vendor -> can_sell_products == 1 )checked @endif >
                                <label class="custom-control-label" for="can_sell_products">Can Sell Products</label>
                            </div>
                            @error('can_sell_products')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-lg-6 my-5 text-md">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="can_add_products" name="can_add_products" @if($vendor -> can_add_products == 1 )checked @endif>
                                <label class="custom-control-label" for="can_add_products">Can Add Products</label>
                            </div>
                            @error('can_add_products')
                            <span class="text-danger mx-1">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary toastrDefaultSuccess"><i class="fa fa-plus"></i>
                            Update Vendor</button>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->



@endsection
