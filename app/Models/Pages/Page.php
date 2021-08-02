<?php

namespace App\Models\Pages;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'content', 'slug', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];
    protected $guarded = [];


    protected $appends = [
        'image_path', 'banner_path',
    ];


    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    } // end of title attr

    public function scopeActive($query)
    {
        return $query -> where('is_active' , 1);
    } // end of active

    public function getActive()
    {
        return $this -> is_active == 1 ? 'Active' : 'Not Active';
    } // end fo get Active

    public function getImagePathAttribute()
    {
        return asset('uploads/pages/images/' . $this -> image );
    } // end of image path

    public function getBannerPathAttribute()
    {
        return asset('uploads/pages/banners/' . $this -> banner );
    } // end of image path
} // end of model
