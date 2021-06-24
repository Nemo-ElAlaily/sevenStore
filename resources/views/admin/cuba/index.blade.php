@extends('layouts.admin.cuba')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                    <div  class="widget">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="details">
                                    <span class="number">170</span>
                                    <span class="title">New Order</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="icons">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-3">
                    <div  class="widgetTwo">widgettwo</div>
            </div>
            <div class="col-md-3">
                    <div  class="widgeThree">widgethree</div>
            </div>
            <div class="col-md-3">
                    <div  class="widgeFour">widgefour</div>
            </div>

        </div>
    </div>
@endsection


