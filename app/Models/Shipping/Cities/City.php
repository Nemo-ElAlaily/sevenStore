<?php

namespace App\Models\Shipping\Cities;

use App\Models\Shipping\Countries\Country;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];


    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get name attribute

    public function country()
    {
        return $this -> belongsTo(Country::class);
    } // end of country
}
