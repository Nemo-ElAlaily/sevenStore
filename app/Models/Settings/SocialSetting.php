<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public $timestamps = true;

} // end of model
