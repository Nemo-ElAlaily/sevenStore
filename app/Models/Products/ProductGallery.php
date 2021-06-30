<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'product_gallery';

    protected $appends = [
        'image'
    ];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function product()
    {
        return $this -> belongsTo(Product::class, 'product_id', 'id');
    } // end of products

    /* ***********************************
    End of Relationships
    *********************************** */

    public function getImageAttribute()
    {
        if(substr( $this -> image_path, 0, 4 ) === "http"){
            return $this -> image_path;
        } else {
            return asset('uploads/products/product-gallery/' . $this -> image_path );
        } // end of if

    } // end of image path

} // end of model