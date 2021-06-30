@extends('layouts.admin.cuba')

@section('title', 'Orders | ' . $order -> slug)

@section('breadcrumb-items')
    <li class="breadcrumb-item">Orders</li>
    <li class="breadcrumb-item">Show</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="container">
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
                    
                            @include('admin.cuba.partials._session')
                            @include('admin.cuba.partials._errors')

                        <div class="col-sm-14 col-xl-6">
                            <div class="ribbon-wrapper card">
                                <div class="card-body">
                            <div class="ribbon ribbon-bookmark ribbon-secondary" for="Order_slug">Order #</div>

                                <input class="form-control  text-center " type="text" name="Order_slug"
                                       value="{{ $order -> slug }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-14 col-xl-6">
                            <div class="ribbon-wrapper card">
                                <div class="card-body">
                            <div class="ribbon ribbon-bookmark ribbon-primary" for="Order_status">Order Status</div>

                                <input class="form-control  text-center " type="text" name="Order_status"
                                       value="{{ $order -> status }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">        
                            {{-- start shipping data section --}}
                            <div class="col-md-12 text-center mt-3">
                                <h3 class="m-3">Shipping Information</h3>
                            </div>

                        <div class="col-sm-14 col-xl-6">
                            <div class="ribbon-wrapper card">
                                <div class="card-body">
                            <div class="ribbon ribbon-bookmark ribbon-primary" for="address">Shipping Address</div>

                                 <input class="form-control text-center " type="text" name="address" disabled value="{{ $order -> address_1 .  $order -> address_2 }}, {{ $order -> city }},  {{ $order -> country }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper card">
                                <div class="card-body">
                            <div class="ribbon ribbon-bookmark ribbon-secondary" for="phone">Customer Phone</div>
                                <input class="form-control text-center " type="text" name="phone"
                                               value="{{ $order -> phone }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper card">
                                <div class="card-body">
                            <div class="ribbon ribbon-bookmark ribbon-success" for="email">Customer E-Mail</div>
                            <input class="form-control text-center " type="text" name="email"
                                               value="{{ $order -> email }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">        
                            {{-- start shipping data section --}}
                            <div class="col-md-12 text-center mt-3">
                                <h3 class="m-3">Pricing Information</h3>
                            </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-secondary" for="{{ $order -> subtotal }}">Subtotal</div>

                                 <input class="form-control text-center " type="text" name="{{ $order -> subtotal }}" disabled value="{{ $order -> subtotal }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-primary" for="{{ $order -> discount }}">Order Discount</div>
                                <input class="form-control text-center " type="text" name="phone"
                                               value="{{ $order -> discount }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-success" for="{{ $order -> tax }}">Order Tax</div>
                            <input class="form-control text-center " type="text" name="{{ $order -> tax }}"
                                               value="{{ $order -> tax }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-warning" for="{{ $order -> shipping_cost }}">Order Shipping Cost</div>

                                 <input class="form-control text-center " type="text" name="{{ $order -> shipping_cost }}" disabled value="{{ $order -> shipping_cost }}" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">        
                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-info" for="{{ $order -> getPaymentMethod() }}">Order Payment Method</div>

                                 <input class="form-control text-center " type="text" name="{{ $order -> getPaymentMethod() }}" disabled value="{{ $order -> getPaymentMethod() }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-danger" for="{{ $order -> currency }}">Payment Currency</div>
                                <input class="form-control text-center " type="text" name="{{ $order -> currency }}"
                                               value="{{ $order -> currency }}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-warning" for="{{ $order -> paid_at }}">Order Tax</div>
                            <input class="form-control text-center " type="text" name="{{ $order -> paid_at }}"
                                               value="{{ $order -> paid_at != null ? $order -> paid_at : 'Not Paid Yet' }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-14 col-xl-3">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-primary" for="{{ $order -> transaction_id }}">Transaction ID</div>

                                 <input class="form-control text-center " type="text" name="{{ $order -> transaction_id }}" disabled value="{{ $order -> transaction_id }}" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                          <div class="col-sm-14 col-xl-6">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-info" for="{{ $order -> total }}">Order total</div>
                            <input class="form-control text-center " type="text" name="{{ $order -> total }}"
                                               value="{{ $order -> total }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-14 col-xl-6">
                            <div class="ribbon-wrapper-right card">
                                <div class="card-body">
                            <div class="ribbon ribbon-clip-right ribbon-right ribbon-secondary" for="{{ $order -> getShippingStatus() }}">Shipping Status</div>

                                 <input class="form-control text-center " type="text" name="{{ $order -> getShippingStatus() }}" value="{{ $order -> getShippingStatus() }}"disabled />
                                </div>
                            </div>
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
