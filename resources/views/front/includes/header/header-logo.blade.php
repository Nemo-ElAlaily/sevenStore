<!-- ============================================================= Header Logo ============================================================= -->
<div class="header-logo">
    <a href="{{ route('front.index') }}" class="header-logo-link">
        <img style="height: 60px;" src="{{ $site_settings -> logo_path }}" alt="{{ $site_settings -> title }}"/>
    </a>

    <div class="toggleSide" id="">
        <i class="fa fa-align-justify" id="btnToggle"></i>
    </div>
    
</div>
<!-- ============================================================= Header Logo : End============================================================= -->


@include('front/includes/header/header-left-sidebar')