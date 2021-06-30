<?php

namespace App\Models\MainCategories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainCategoryTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['name', 'slug'];
}
