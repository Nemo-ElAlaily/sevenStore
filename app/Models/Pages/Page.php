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
        return $this -> is_active == 1 ? 'Active' : '';
    } // end fo get Active

} // end of model
