<?php

namespace App\Models\Products;

use App\Models\Tags\Tag;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table = 'product_tag';

    protected $fillable = ['product_id', 'tag_id'];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function Product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function Tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    /* ***********************************
    End of Relationships
    *********************************** */

} // end of model
