<?php

namespace App\Models\Blogs;

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
        return $this -> is_active == 1 ? 'Active' : '';
    } // end fo get Active

    /* ***********************************
    Start of Relationships
    *********************************** */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_blogs');
    } // end of tags

    public function user()
    {
        return $this -> belongsTo(User::class);
    } // end of creator

    /* ***********************************
    End of Relationships
    *********************************** */

}// end of model
