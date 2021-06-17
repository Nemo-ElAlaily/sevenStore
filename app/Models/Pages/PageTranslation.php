<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['title', 'content', 'slug', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];

}
