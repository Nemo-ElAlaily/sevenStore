<?php

namespace App\Models\Settings;

use App\Models\Themes\Theme;
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
        'favicon_path',

    ];

    protected $fillable = [ 'theme_id', 'logo', 'favicon','google_analytics','google_client_id',
                            'google_secret_key',
                            'google_redirect',
                            'facebook_client_id',
                            'facebook_secret_key',
                            'facebook_redirect',
];

    public function getLogoPathAttribute()
    {
        return asset('uploads/site/' . $this -> logo );
    }

    public function getFaviconPathAttribute()
    {
        return asset('uploads/site/' . $this -> favicon );
    }

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function theme()
    {
        return $this -> belongsTo(Theme::class, 'theme_id', 'id');
    } // end of theme

    /* ***********************************
    End of Relationships
    *********************************** */

} // end of model
