<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Settings\SiteSetting;

function uploadImage($folder, $image)
{
    $file_name = $image -> hashName();
    $image->move(public_path($folder) , $file_name );
    return $file_name;
}

function siteSettings(){
    $site_settings = SiteSetting::find(1);
    Config::set('services.facebook.client_id', $site_settings->facebook_client_id);
    Config::set('services.facebook.client_secret', $site_settings->facebook_secret_key);
    Config::set('services.facebook.redirect', $site_settings->facebook_redirect);

    Config::set('services.google.client_id', $site_settings->google_client_id);
    Config::set('services.google.client_secret', $site_settings->google_secret_key);
    Config::set('services.google.redirect', $site_settings->google_redirect);

    
}
//function downloadImage($link, $name)
//{
//    $title = str_replace(characters(), '' , $name);
//    $filename = time() . $name;
//
//    //get file content from url
////    $file = file_get_contents($link);
//    file_put_contents(public_path('uploads/products/'). $filename, $title);
//    return $filename;
//}

function characters(){
    return array(' ', '/', '!', '\\');
}
