<?php

namespace App\Models\Blogs;

use App\Models\Tags\Tag;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $table = 'blog_tag';

    protected $fillable = ['blog_id', 'tag_id'];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function Blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function Tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    /* ***********************************
    End of Relationships
    *********************************** */

} // end of model
