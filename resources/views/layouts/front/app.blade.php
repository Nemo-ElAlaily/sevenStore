<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>

    {!! $site_settings -> google_analytics !!}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $site_settings->title }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-electro.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl-carousel.css') }}" media="all" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('front/css/style-' . LaravelLocalization::getCurrentLocaleDirection() . '.css') }}"
        media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/colors/yellow.css') }}" media="all" />
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic'
        rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{{ $site_settings->favicon_path }}">

    @livewireStyles

    <script type="text/javascript" src="{{ asset('front/js/jquery.min.js') }}"></script>

</head>

@if (Route::is('front.shop') || Route::is('front.product.details') || Route::is('front.product.category'))

    <body class="left-sidebar single-product">
    @elseif(Route::is('front.blog'))

        <body class="blog blog-list right-sidebar">
        @elseif(Route::is('front.blog.details'))

            <body class="single-post right-sidebar">
            @else

                <body class="page home page-template-default">
@endif
<div id="page" class="hfeed site">

    @include('front.includes.header.top_bar')


    @include('front.includes.header.header')

    @if (Route::is('front.*'))
        {{ $slot }}
    @else
        @yield('content')
    @endif



    {{-- @include('front.includes.footer.brands-carousel') --}}

    @include('front.includes.footer.footer')

</div><!-- #page -->

<script type="text/javascript" src="{{ asset('front/js/tether.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/echo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/electro.js') }}"></script>
<script type="text/javascript"
src="{{ asset('front/js/custom-' . LaravelLocalization::getCurrentLocaleDirection() . '.js') }}"></script>
@livewireScripts
</body>

</html>
