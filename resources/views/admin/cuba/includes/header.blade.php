<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="mb-3 w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">{{ trans('site.Loading') }}...</span></div>
                        <i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="#"><img class="img-fluid" src="{{ $site_settings->logo_path }}"
                        alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
                <!-- -->
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="language-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang">
                                @if (LaravelLocalization::getCurrentLocale() == 'en')
                                    <i class="flag-icon flag-icon-us"></i>
                                @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                                    <i class="flag-icon flag-icon-ae"></i>
                                @else
                                    <i class="flag-icon flag-icon-{{ LaravelLocalization::getCurrentLocale() }}"></i>
                                @endif
                                <span class="lang-txt">{{ LaravelLocalization::getCurrentLocale() }} </span>
                            </div>
                        </div>
                        <div class="more_lang">

                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="{{ App::getLocale() == 'en' ? 'active' : '' }}">
                                    <div class="lang {{ LaravelLocalization::getCurrentLocale() == 'en' ? 'selected' : '' }}"
                                        data-value="{{ $localeCode }}">
                                        @if ($localeCode == 'en')
                                            <i class="flag-icon flag-icon-us"></i>
                                        @elseif($localeCode == 'ar')
                                            <i class="flag-icon flag-icon-ae"></i>
                                        @else
                                            <i class="flag-icon flag-icon-{{ $localeCode }}"></i>
                                        @endif
                                        <span class="lang-txt">{{ $properties['native'] }}</span>
                                    </div>
                                </a>

                            @endforeach

                        </div>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                        <img class="b-r-10" src="{{ Auth::user()->avatar }}" alt="">
                        <div class="media-body">
                            <span>{{ Auth::user()->full_name }}</span>
                            <p class="mb-0 font-roboto">{{ Auth::user()->roles->first()->display_name }} <i
                                    class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                <i data-feather="log-in"> </i>
                                {{ trans('auth.Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
