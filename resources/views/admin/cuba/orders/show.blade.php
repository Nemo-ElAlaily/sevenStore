@extends('layouts.admin.cuba')

@section('title', 'Orders | ' . $order -> slug)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Orders</li>
    <li class="breadcrumb-item">Show</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">

               <form class="col-12">
                    <a href="{{ route('admin.orders.completedOrder' , $order -> id) }}" class="btn btn-completed mb-4">
                        <i class="fa fa-check fa-lg"></i> Mark as Completed
                    </a>

                    <a href="{{ route('admin.orders.shippingOrder' , $order -> id) }}" class="btn btn-sending mb-4 sending_confirm">
                        <i class="fa fa-truck fa-lg"></i>  Shipping
                    </a>

                    <a href="{{ route('admin.orders.deliveredOrder' , $order -> id) }}" class="btn btn-received mb-4">
                        <i class="fa fa-truck fa-lg"></i>  Delivered
                    </a>

                    <div class="row">
                        <div class="col-sm-12 row">

                            @include('admin.adminlte.partials._session')
                            @include('admin.adminlte.partials._errors')

                            <div class="form-group col-lg-6">
                                <label for="Order_slug">Order # </label>
                                <input class="form-control input-thick" type="text" name="Order_slug"
                                       value="{{ $order -> slug }}" disabled>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="Order_status">Order Status </label>
                                <input class="form-control input-thick" type="text" name="Order_status"
                                       value="{{ $order -> status }}" disabled>
                            </div>

                            {{-- start shipping data section --}}
                            <div class="row text-center col-sm-12 col-md-12 border-right mt-3">
                                <h3 class="m-3">Shipping Information</h3>
                                <hr>

                                <div class="row m-2 mb-3 p-0">
                                    <div class="form-group col-lg-12">
                                        <label for="address">Shipping Address </label>
                                        <textarea class="form-control input-thick" type="text" name="address" disabled>
                                            {{ $order -> address_1 .  $order -> address_2 }}, {{ $order -> city }},  {{ $order -> country }}
                                        </textarea>
                                    </div>

                                </div>

                                <div class="row m-2 mb-3 p-0">

                                    <div class="form-group col-lg-6">
                                        <label for="phone">Customer Phone</label>
                                        <input class="form-control input-thick" type="text" name="phone"
                                               value="{{ $order -> phone }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="email">Customer E-Mail</label>
                                        <input class="form-control input-thick" type="text" name="email"
                                               value="{{ $order -> email }}" disabled>
                                    </div>

                                </div>


                            </div>
                            {{-- end shipping data section--}}

                            {{-- start Order Items section --}}
                            <div class="row text-center col-sm-12 col-md-12 border-right mt-3">
                                <h3 class="m-3">Shipping Information</h3>
                                <hr>

                                <div class="row m-2 mb-3 p-0">
                                    <div class="form-group col-lg-12">
                                        <label for="address">Shipping Address </label>
                                        <textarea class="form-control input-thick" type="text" name="address" disabled>
                                            {{ $order -> address_1 .  $order -> address_2 }}, {{ $order -> city }},  {{ $order -> country }}
                                        </textarea>
                                    </div>

                                </div>

                                <div class="row m-2 mb-3 p-0">

                                    <div class="form-group col-lg-6">
                                        <label for="phone">Customer Phone</label>
                                        <input class="form-control input-thick" type="text" name="phone"
                                               value="{{ $order -> phone }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="email">Customer E-Mail</label>
                                        <input class="form-control input-thick" type="text" name="email"
                                               value="{{ $order -> email }}" disabled>
                                    </div>

                                </div>


                            </div>
                            {{-- end Order Items section--}}


                            {{-- start pricing section --}}
                            <div class="row text-center col-sm-12 col-md-12 border-right mt-3">
                                <h3 class="m-3">Pricing Information</h3>
                                <hr>

                                <div class="row m-2 mb-3 p-0">
                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> subtotal }}">Subtotal </label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> subtotal }}"
                                               value="{{ $order -> subtotal }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> discount }}">Order Discount </label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> discount }}"
                                               value="{{ $order -> discount }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> tax }}">Order Tax </label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> tax }}"
                                               value="{{ $order -> tax }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> shipping_cost }}">Order Shipping Cost </label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> shipping_cost }}"
                                               value="{{ $order -> shipping_cost }}" disabled>
                                    </div>

                                </div>

                                <div class="row m-2 mb-3 p-0">

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> getPaymentMethod() }}">Order Payment Method</label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> getPaymentMethod() }}"
                                               value="{{ $order -> getPaymentMethod() }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> currency }}">Payment Currency</label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> currency }}"
                                               value="{{ $order -> currency }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> paid_at }}">Paid at</label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> paid_at }}"
                                               value="{{ $order -> paid_at != null ? $order -> paid_at : 'Not Paid Yet' }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="{{ $order -> transaction_id }}">Transaction ID</label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> transaction_id }}"
                                               value="{{ $order -> transaction_id }}" disabled>
                                    </div>

                                </div>


                                <div class="row m-2 p-0">

                                    <div class="form-group col-lg-6">
                                        <label for="{{ $order -> total }}">Order total </label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> total }}"
                                               value="{{ $order -> total }}" disabled>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="{{ $order -> getShippingStatus() }}">Shipping Status</label>
                                        <input class="form-control input-thick" type="text" name="{{ $order -> getShippingStatus() }}"
                                               value="{{ $order -> getShippingStatus() }}" disabled>
                                    </div>

                                </div>

                            </div>
                            {{-- end pricing section--}}

                        </div>
                    </div>

                </form><!-- end of form -->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop
