<?php

namespace App\Models\Settings;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model implements TranslatableContract
{
    use Translatable, SoftDeletes;

    protected $table = 'site_settings';
    public $translatedAttributes = ['title','welcome_phrase', 'address', 'city', 'country', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $appends = [
        'logo_path',
    ];

    protected $fillable = ['logo'];

    public function getLogoPathAttribute()
    {
        return asset('uploads/site/' . $this -> logo);
    }

} // end of model