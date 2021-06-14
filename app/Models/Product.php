<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $guarded = [];

    public $timestamps = true;

    protected $appends = [
        'image_path'
    ];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function vendor()
    {
        return $this -> belongsTo(Vendor::class);
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


} // end of model
