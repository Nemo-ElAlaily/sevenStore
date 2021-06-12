<?php

namespace App\Models\Orders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public $timestamps = true;

    public function orderItems()
    {
        return $this -> hasMany(OrderItem::class);
    } // end of order Items

    public function user()
    {
        return $this -> belongsTo(User::class);
    }// end of users
}
