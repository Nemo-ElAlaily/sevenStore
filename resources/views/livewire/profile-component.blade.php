
<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb">
            <a href="{{ route('front.index') }}">Home</a>
            <span class="delimiter"><i class="fa fa-angle-right"></i></span>My Accout
        </nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="row">
                    <div class="col-md-12 py-2">
                        <h3>لوحه التحكم</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('front.partials._session')
                                        @include('front.partials._errors')
                                    </div>
                                    <div class="col-md-5">

                                        <div class="dokan-w6 dokan-dash-right">
                                            <div class="dashboard-widget sells-graph">
                                                <div class="widget-title"><i class="fa fa-credit-card"></i> Sales this Month</div>
                                                <div class="chart-container">
                                                    <div class="chart-placeholder main" style="width: 100%; height: 350px; padding: 0px; position: relative;">
                                                        <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                                            <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"></div>
                                                            <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"></div>
                                                        </div>
                                                        <div class="legend">
                                                            <div style="position: absolute; width: 251.844px; height: 84px; top: 17px; left: 25px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                                                            <table style="position:absolute;top:17px;left:25px;;font-size:smaller;color:#aaa">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid rgb(52,152,219);overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Sales total</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #ccc;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid rgb(26,188,156);overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Number of orders</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-7">
                                        <ul class="list-inline">
                                            <li>
                                                <div class="title">Sales</div>
                                                <div class="count"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">EGP</span>&nbsp;1,710.00</span></div>
                                            </li>
                                            <li>
                                                <div class="title">Earning</div>
                                                <div class="count"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">EGP</span>&nbsp;1,545.00</span></div>
                                            </li>
                                            <li>
                                                <div class="title">Pageview</div>
                                                <div class="count">6977</div>
                                            </li>
                                            <li>
                                                <div class="title">Order</div>
                                                <div class="count"> 1 </div>
                                            </li>
                                        </ul>
                                        <div class="dashboard-widget orders">
                                            <div class="widget-title"><i class="fa fa-shopping-cart"></i> Orders</div>
                                            <div class="content-half-part">
                                                <ul class="list-unstyled list-count">
                                                    <li>
                                                        <a href="#">
                                                            <span class="title">Total</span> <span class="count">1</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #73a724">
                                                            <span class="title">Completed</span> <span class="count">1</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #999">
                                                            <span class="title">Pending</span> <span class="count">0</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #21759b">
                                                            <span class="title">Processing</span> <span class="count">0</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #d54e21">
                                                            <span class="title">Cancelled</span> <span class="count">0</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #e6db55">
                                                            <span class="title">Refunded</span> <span class="count">0</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="color: #f0ad4e">
                                                            <span class="title">On hold</span> <span class="count">0</span>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="content-half-part">
                                                <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dashboard-widget products">
                                            <div class="widget-title">
                                                <i class="fa fa-briefcase" aria-hidden="true"></i> Products
                                                <span class="pull-right">
                                                    <a href="#">+ Add new product</a>
                                                </span>
                                            </div>
                                            <ul class="list-unstyled list-count">
                                                <li>
                                                    <a href="#">
                                                        <span class="title">Total</span> <span class="count">10</span>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="title">Live</span> <span class="count">7</span>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="title">Offline</span> <span class="count">3</span>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="title">Pending Review</span> <span class="count">0</span>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="dokan-dash-sidebar">
                                    <div id="dokan-navigation" aria-label="Menu">

                                        <ul class="dokan-dashboard-menu">
                                            <li class="active dashboard active">
                                                <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                                            </li>
                                            <li class="products">
                                                <a href="#"><i class="fa fa-briefcase"></i> Products</a>
                                            </li>
                                            <li class="orders">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> Orders</a>
                                            </li>
                                            <li class="withdraw">
                                                <a href="#"><i class="fa fa-upload"></i> Withdraw</a>
                                            </li>
                                            <li class="settings">
                                                <a href=""><i class="fa fa-cog"></i> Settings
                                                    <i class="fa fa-angle-right pull-right"></i></a>
                                            </li>
                                        </ul>
                                        <ul class="linksUsers">
                                            <li class="dokan-common-links dokan-clearfix">
                                                <a title="" class="tips" data-placement="top" href="#" target="_blank" data-original-title="Visit Store"><i class="fa fa-external-link-square-alt"></i></a>
                                            </li>
                                            <li>
                                                <a title="" class="tips" data-placement="top" href="#" data-original-title="Edit Account"><i class="fa fa-user"></i></a>
                                            </li>
                                            <li>

                                                <a title="" class="tips" data-placement="top" href="#" data-original-title="Log out"><i class="fa fa-power-off"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>

    </div>
</div>
