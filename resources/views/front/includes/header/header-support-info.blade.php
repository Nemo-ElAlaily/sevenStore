<div class="header-support-info">
    <div class="media">
        <span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span>
        <div class="media-body">
            <span class="support-number"><strong>Support: </strong> {{ $site_settings -> where('key', 'phone') -> first() -> value_ . LaravelLocalization::getCurrentLocale() }}</span><br>
            <span class="support-email">Email: {{ $site_settings -> where('key', 'email') -> first() -> value_ . LaravelLocalization::getCurrentLocale() }}</span>
        </div>
    </div>
</div>
