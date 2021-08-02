<?php

namespace App\Models\Blogs;

use App\Models\MainCategories\MainCategory;
use App\Models\Tags\Tag;
use App\Models\User;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $guarded = [];

    protected $appends = [
        'image_path',
    ];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getImagePathAttribute()
    {
        if(substr( $this -> image, 0, 4 ) === "http"){
            return $this -> image;
        } else {
            return asset('uploads/blogs/' . $this -> image );
        } // end of if
    }

    public function scopeActive($query)
    {
        return $query -> where('is_active' , 1);
    } // end of active

    public function getActive()
    {
        return $this -> is_active == 1 ? 'Active' : 'Not Active';
    } // end fo get Active

    /* ***********************************
    Start of Relationships
    *********************************** */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }

    public function user()
    {
        return $this -> belongsTo(User::class);
    } // end of creator

    public function category(){
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    /* ***********************************
    End of Relationships
    *********************************** */

}// end of model
