<!-- ============================================================= Header Logo ============================================================= -->
<div class="header-logo">
    <a href="{{ route('front.index') }}" class="header-logo-link">
        <img class="logo-header" style="height: 80px;" src="{{ $site_settings->logo_path }}" alt="{{ $site_settings->title }}" />
    </a>

    <div class="toggleSide" id="">
        <i class="fa fa-align-justify" id="btnToggle"></i>
    </div>

</div>
<!-- ============================================================= Header Logo : End============================================================= -->
<div class="btnUp">
    <i class="fa fa-arrow-up"></i>
</div>

@include('front/includes/header/header-left-sidebar')
