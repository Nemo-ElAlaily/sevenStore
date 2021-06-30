<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

function uploadImage($folder, $image)
{
    $file_name = $image -> hashName();
    $image->move(public_path($folder) , $file_name );
    return $file_name;
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
