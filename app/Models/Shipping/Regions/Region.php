<?php

namespace App\Models\Shipping\Regions;

use App\Models\Shipping\Cities\City;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];


    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get name attribute

    public function city()
    {
        return $this -> belongsTo(City::class);
    } // end of country
}
