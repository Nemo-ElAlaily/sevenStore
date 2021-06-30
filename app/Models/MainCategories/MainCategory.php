<?php

namespace App\Models\MainCategories;

use App\Models\Product;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainCategory extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'slug'];
    protected $guarded = [];

    protected $appends = [
        'image_path',
    ];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function sub_categories()
    {
        return $this->hasMany(self::class, 'parent_id');
    } // end of categories

    public function products()
    {
        return $this -> hasMany(Product::class , 'main_category_id', 'id');
    } // end of products

    /* ***********************************
    End of Relationships
    *********************************** */

    public function getImagePathAttribute()
    {
        if(substr( $this -> image, 0, 4 ) === "http"){
            return $this -> image;
        } else {
            return asset('uploads/main_categories/' . $this -> image );
        } // end of if

    } // end of image path

} // end of model
