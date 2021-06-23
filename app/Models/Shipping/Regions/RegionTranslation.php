<?php

namespace App\Models\Shipping\Regions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['name'];
}
