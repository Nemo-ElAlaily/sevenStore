<?php

namespace App\Models\Blogs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;


class Tag extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'slug'];

    protected $fillable = ['is_active', 'is_popular_tag'];
    /**
     * Get all of the blogs that are assigned this tag.
     */
    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'taggable');
    }
} // end of model
