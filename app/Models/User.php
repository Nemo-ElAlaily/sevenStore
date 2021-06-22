<?php

namespace App\Models;

use App\Models\Blogs\Blog;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'avatar_path',
    ];

    /* ***********************************
    Start of Relationships
    *********************************** */

    public function vendor()
    {
        return $this -> hasOne(Vendor::class);
    } // end of vendors

    public function wishlist()
    {
        return $this -> hasMany(Wishlist::class);
    } // end of vendors

    public function blogs()
    {
        return $this -> hasMany(Blog::class);
    } // end of blogs

    /* ***********************************
    End of Relationships
    *********************************** */

    public function getFullNameAttribute()
    {
        return ucfirst($this -> first_name) . ' ' . ucfirst($this -> last_name);

    } // end of full name

    public function getAvatarPathAttribute()
    {
        if(substr( $this -> avatar, 0, 2 ) === "//"){
            return $this -> avatar;
        } else {
            return asset('uploads/users/' . $this -> avatar );
        } // end of if

    } // end of image path
// jwt
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    // end jwt

} // end of model
