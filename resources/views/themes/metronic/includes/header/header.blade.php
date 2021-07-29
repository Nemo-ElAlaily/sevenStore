<!-- BEGIN HEADER -->
<div role="navigation" class="navbar header no-margin">
    <div class="container">
        <div class="navbar-header">
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- END RESPONSIVE MENU TOGGLER -->

            @include('themes.metronic.includes.header.header-logo')

        </div>

        <!-- BEGIN CART -->
        @livewire('cart-count-component')
        <!-- END CART -->

        @include('themes.metronic.includes.header.header-left-sidebar')

    </div>
</div>
<!-- END HEADER -->
