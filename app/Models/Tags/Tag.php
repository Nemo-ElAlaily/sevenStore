<?php

namespace App\Models\Tags;

use App\Models\Blogs\Blog;
use App\Models\Products\Product;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'slug'];

    protected $fillable = ['is_active', 'is_popular_tag'];

    /* ***********************************
   Start of Relationships
   *********************************** */

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'taggable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable');
    }
    /* ***********************************
   End of Relationships
   *********************************** */

} // end of model
