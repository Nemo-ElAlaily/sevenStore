<?php

namespace App\Models\Sliders;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'sub_title'];
    protected $guarded = [];


    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return asset('uploads/sliders/' . $this -> image );
    } // end of image path

    public function scopeActive($query)
    {
        return $query -> where('is_active' , 1);
    } // end of active

    public function getActive()
    {
        return $this -> is_active == 1 ? 'Active' : 'Not Active';
    } // end fo get Active

} // end of model
