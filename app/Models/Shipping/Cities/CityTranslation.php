<?php

namespace App\Models\Shipping\Cities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['name'];
}
