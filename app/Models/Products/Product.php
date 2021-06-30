<?php

namespace App\Models\Products;

use App\Models\MainCategories\MainCategory;
use App\Models\User;
use App\Models\Wishlist;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'slug', 'description', 'features'];
    protected $guarded = [];

    protected $appends = [
        'image_path'
    ];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function vendor()
    {
        return $this -> belongsTo(User::class, 'vendor_id', 'id');
    } // end of vendors

    public function mainCategory()
    {
        return $this -> belongsTo(MainCategory::class , 'main_category_id', 'id');
    } // end of main categories

    public function products()
    {
        return $this -> hasMany(Wishlist::class);
    } // end of products

    /* ***********************************
    End of Relationships
    *********************************** */

    public function getImagePathAttribute()
    {
        if(substr( $this -> image, 0, 4 ) === "http"){
            return $this -> image;
        } else {
            return asset('uploads/products/' . $this -> image );
        } // end of if

    } // end of image path

    public function getOnSale()
    {
        if($this -> sale_price < $this -> regular_price)
        {
            return true;
        } else {
            return false;
        }

    } // end fo get onsale
}
