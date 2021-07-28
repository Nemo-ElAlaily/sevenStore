@extends('admin.cuba.layouts.app')

@section('title', trans('site.Orders') . ' | ' . $order->slug)

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('site.Orders') }}</li>
    <li class="breadcrumb-item">{{ trans('site.show') }}</li>
@stop


@section('content')
    <!-- Default box -->
    <div class="container">
        <div class="row">
            <form class="col-12">
                <a href="{{ route('admin.orders.completedOrder', $order->id) }}" class="btn btn-completed mb-4">
                    <i class="fa fa-check fa-lg"></i> {{ trans('site.Mark as Completed') }}
                </a>

                <a href="{{ route('admin.orders.shippingOrder', $order->id) }}"
                    class="btn btn-sending mb-4 sending_confirm">
                    <i class="fa fa-truck fa-lg"></i> {{ trans('site.ship to customer') }}
                </a>

                <a href="{{ route('admin.orders.deliveredOrder', $order->id) }}" class="btn btn-received mb-4">
                    <i class="fa fa-truck fa-lg"></i> {{ trans('site.Delivered') }}
                </a>

                <div class="row">

                    @include('admin.cuba.partials._session')
                    @include('admin.cuba.partials._errors')

                    <div class="col-sm-14 col-xl-6">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-bookmark ribbon-secondary" for="Order_slug">{{ trans('site.Order') }} #</div>

                                <input class="form-control  text-center " type="text" name="Order_slug"
                                    value="{{ $order->slug }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-14 col-xl-6">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-bookmark ribbon-primary" for="Order_status">{{ trans('site.Order Status') }}</div>

                                <input class="form-control  text-center " type="text" name="Order_status"
                                    value="{{ $order->status }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- start shipping data section --}}
                    <div class="col-md-12 text-center mt-3">
                        <h3 class="m-3">{{ trans('site.Shipping Information') }}</h3>
                    </div>

                    <div class="col-sm-14 col-xl-6">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-bookmark ribbon-primary" for="address">{{ trans('site.Shipping Address') }}</div>

                                <input class="form-control text-center " type="text" name="address" disabled
                                    value="{{ $order->address_1 . $order->address_2 }}, {{ $order->city }},  {{ $order->country }}" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-bookmark ribbon-secondary" for="phone">{{ trans('site.Customer Phone') }}</div>
                                <input class="form-control text-center " type="text" name="phone"
                                    value="{{ $order->phone }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper card">
                            <div class="card-body">
                                <div class="ribbon ribbon-bookmark ribbon-success" for="email">{{ trans('site.Customer E-Mail') }}</div>
                                <input class="form-control text-center " type="text" name="email"
                                    value="{{ $order->email }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- start shipping data section --}}
                    <div class="col-md-12 text-center mt-3">
                        <h3 class="m-3">{{ trans('site.Pricing Information') }}</h3>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-secondary"
                                    for="{{ $order->subtotal }}">{{ trans('site.Subtotal') }}</div>

                                <input class="form-control text-center " type="text" name="{{ $order->subtotal }}"
                                    disabled value="{{ $order->subtotal }}" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-primary"
                                    for="{{ $order->discount }}">{{ trans('site.Discount') }}</div>
                                <input class="form-control text-center " type="text" name="phone"
                                    value="{{ $order->discount }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-success"
                                    for="{{ $order->tax }}">{{ trans('site.Tax') }}</div>
                                <input class="form-control text-center " type="text" name="{{ $order->tax }}"
                                    value="{{ $order->tax }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-warning"
                                    for="{{ $order->shipping_cost }}">{{ trans('site.Shipping Cost') }}</div>

                                <input class="form-control text-center " type="text" name="{{ $order->shipping_cost }}"
                                    disabled value="{{ $order->shipping_cost }}" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-info"
                                    for="{{ $order->getPaymentMethod() }}">{{ trans('site.Payment Method') }}</div>

                                <input class="form-control text-center " type="text"
                                    name="{{ $order->getPaymentMethod() }}" disabled
                                    value="{{ $order->getPaymentMethod() }}" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-danger"
                                    for="{{ $order->currency }}">{{ trans('site.Payment Currency') }}</div>
                                <input class="form-control text-center " type="text" name="{{ $order->currency }}"
                                    value="{{ $order->currency }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-14 col-xl-3">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-primary"
                                    for="{{ $order->transaction_id }}">{{ trans('site.Transaction ID') }}</div>

                                <input class="form-control text-center " type="text"
                                    name="{{ $order->transaction_id }}" disabled
                                    value="{{ $order->transaction_id }}" />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-14 col-xl-6">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-info"
                                    for="{{ $order->total }}">{{ trans('site.Order total') }}</div>
                                <input class="form-control text-center " type="text" name="{{ $order->total }}"
                                    value="{{ $order->total }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-14 col-xl-6">
                        <div class="ribbon-wrapper-right card">
                            <div class="card-body">
                                <div class="ribbon ribbon-clip-right ribbon-right ribbon-secondary"
                                    for="{{ $order->getShippingStatus() }}">{{ trans('site.Shipping Status') }}</div>

                                <input class="form-control text-center " type="text"
                                    name="{{ $order->getShippingStatus() }}"
                                    value="{{ $order->getShippingStatus() }}" disabled />
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
        {{-- end pricing section --}}

    </div>

@stop
