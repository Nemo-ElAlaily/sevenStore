<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSettingTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'site_setting_translations';

    protected $fillable = ['title', 'welcome_phrase','address','city','country','meta_description', 'meta_title', 'meta_keyword'];
}
