<?php

namespace App\Models\Sliders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['title', 'sub_title'];

} // end of model
