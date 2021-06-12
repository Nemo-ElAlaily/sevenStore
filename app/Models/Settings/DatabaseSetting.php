<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatabaseSetting extends Model
{
    use SoftDeletes, HasFactory;

    public $timestamps = false;

    protected $guarded = [];
}
