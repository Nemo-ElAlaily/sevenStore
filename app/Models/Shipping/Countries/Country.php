<?php

namespace App\Models\Shipping\Countries;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    protected $appends = [
        'flag_path',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get name attribute

    public function getFlagPathAttribute()
    {
        return asset('uploads/flags/' . $this->flag);
    } // end of image path

}
