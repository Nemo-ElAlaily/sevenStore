<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laratrust\Traits\LaratrustUserTrait;

class Vendor extends Model
{
    use LaratrustUserTrait;
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public $timestamps = true;

    /* ***********************************
   Start of Relationships
   *********************************** */

    public function user()
    {
        return $this -> belongsTo(User::class);
    } // end of user

    public function products()
    {
        return $this -> hasMany(Product::class);
    } // end of user

    /* ***********************************
    End of Relationships
    *********************************** */

    public function getFullNameAttribute()
    {
        return ucfirst($this -> billing_first_name) . ' ' . ucfirst($this -> billing_last_name);

    } // end of full name

} // end of model
