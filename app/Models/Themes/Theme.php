<?php

namespace App\Models\Themes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use softDeletes;

    protected $guarded = [];

    public $timestamps = true;

    protected $appends = [
        'image_path'
    ];

    /* ***********************************
    Start of Relationships
    *********************************** */


    /* ***********************************
    End of Relationships
    *********************************** */

    public function getImagePathAttribute()
    {
        return asset('uploads/themes/' . $this -> image);
    } // end of image path

}
