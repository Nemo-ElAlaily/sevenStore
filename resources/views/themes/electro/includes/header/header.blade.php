<header id="masthead" class="site-header header-v3">
    <div class="container">
        <div class="row">

            @include('themes.electro.includes.header.header-logo')

            @include('themes.electro.includes.header.navbar-search')

            @include('themes.electro.includes.header.navbar-right')

        </div><!-- /.row -->
    </div>
</header><!-- #masthead -->
<nav class="navbar navbar-primary navbar-full" @if(LaravelLocalization::getCurrentLocale() == 'ar') style="height: 65px; margin: auto" @endif>
    <div class="container">

        @include('themes.electro.includes.navigation.primary-nav')

    </div>
</nav>
