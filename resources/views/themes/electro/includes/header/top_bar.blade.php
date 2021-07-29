<div class="top-bar">
    <div class="container">
        <nav>
            <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
                <li class="menu-item animate-dropdown"><a title="Welcome to Worldwide Electronics Store"
                        href="#">{{ trans('front.Welcome to') }} {{ $site_settings->welcome_phrase }}</a></li>
            </ul>
        </nav>

        <nav>
            <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
                <li class="menu-item animate-dropdown">
                    <a title="Track Your Order" href="{{ route('front.orders') }}">
                        <i class="ec ec-transport"></i> {{ trans('front.Track Your Order') }}
                    </a>
                </li>

                <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                    <a title="Language" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">
                        @lang('front.' . LaravelLocalization::getCurrentLocale() . '.name')
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="dropdown-item">
                                <a class="dropdown-item" title="{{ $properties['native'] }}"
                                    hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="menu-item animate-dropdown"><a title="Shop" href="{{ route('front.shop') }}"><i
                            class="ec ec-shopping-bag"></i>{{ trans('front.Shop') }}</a></li>

                @guest
                    <li class="menu-item animate-dropdown"><a title="Login" href="{{ route('login') }}"><i
                                class="ec ec-user mr-1"></i> {{ trans('front.Register') }} <span class="text-gray-50">{{ trans('front.or') }}</span> {{ trans('front.Sign in') }}</a></li>
                @endguest
                @auth
                    <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                        <a title="My Account" href="{{ route('front.profile') }}"
                            data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true"><i
                                class="ec ec-user"></i>{{ Auth::user()->full_name }}</a>
                        <ul role="menu" class="dropdown-menu">
                            <li class="dropdown-item"><a class="dropdown-item" title="My Profile" href="{{ route('front.profile') }}">{{ trans('front.My Profile') }}</a>
                            </li>
                            @if (Auth::user()->hasRole('super_admin|admin|shop_manager|vendor|moderator'))
                                <li class="dropdown-item"><a class="dropdown-item" title="My Profile"
                                        href="{{ route('admin.index') }}">{{ trans('front.Dashboard') }}</a></li>
                            @endif
                            <li class="dropdown-item ">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('front.Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
</div><!-- /.top-bar -->
