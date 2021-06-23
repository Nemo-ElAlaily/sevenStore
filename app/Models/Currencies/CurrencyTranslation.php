<?php

namespace App\Models\Currencies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = false;
    protected $fillable = ['name'];

}
