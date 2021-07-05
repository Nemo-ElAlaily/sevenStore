<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'blog_translations';

    public $timestamps = true;

    protected $fillable = ['title', 'description', 'slug'];

} // end of model
