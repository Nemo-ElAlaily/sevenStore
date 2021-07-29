<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><span>{{ $site_settings -> welcome_phrase }}</span></li>
                    <!-- BEGIN Shopnow -->
                    <li><i class="fa fa-phone"></i><span>{{ $site_settings -> phone }}</span></li>
                    <!-- END Shopnow -->
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->

            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><i class="fa fa-truck"></i><a href="{{ route('front.orders') }}">{{ trans('front.Track Your Order') }}</a></li>
                    <!-- BEGIN LANGS -->
                    <li class="langs-block">
                        <a href="javascript:void(0);" class="current">@lang('front.' . LaravelLocalization::getCurrentLocale() . '.name')<i class="fa fa-angle-down"></i></a>
                        <div class="langs-block-others-wrapper">
                            <div class="langs-block-others">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a title="{{ $properties['native'] }}"
                                       hreflang="{{ $localeCode }}"
                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <!-- END LANGS -->
                    <li><i class="fa fa-shopping-cart"></i><a href="{{ route('front.shop') }}">{{ trans('front.Shop') }}</a></li>
                    @guest
                        <li><i class="fa fa-user"></i><a href="{{ route('login') }}">{{ trans('front.Register') }} <span class="text-gray-50">{{ trans('front.or') }}</span> {{ trans('front.Sign in') }}</a></li>
                    @endguest

                    @auth
                        <li class="langs-block">
                            <i class="fa fa-user"></i>
                            <a href="javascript:void(0);" class="current">{{ Auth::user()->full_name }}<i class="fa fa-angle-down"></i></a>

                            <div class="langs-block-others-wrapper">
                                <div class="langs-block-others" style="width: 150px;">
                                    <a class="" href="{{ route('front.profile') }}">{{ trans('front.My Profile') }}</a>
                                    @if (Auth::user()->hasRole('super_admin|admin|shop_manager|vendor|moderator'))
                                        <a href="{{ route('admin.index') }}">{{ trans('front.Dashboard') }}</a>
                                    @endif

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('front.Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endauth

                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
